<?php
namespace App\Http\Controllers;
use Exception;
use Illuminate\Database\QueryException;
// namespace App\Http\Controllers\StripeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use ProtoneMedia\Splade\Facades\Toast;
use App\Mail\OrderConfirmation;
use App\Mail\WelcomeEmail;
use App\Mail\shipmentStatus;
use App\Mail\credentialMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use App\Mail\ContactMail;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
// use Barryvdh\DomPDF\Facade as PDF;
use PDF;
use Illuminate\Http\Response;
use App\Models\Order;
// use App\Http\Requests\StoreOrderRequest;
// use App\Http\Requests\UpdateOrderRequest;
use App\Models\Order_item;
use App\Models\Cart;
use App\Models\Shipping_address;



class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index',[
    'orders'=>SpladeTable::for(Order::class)

    ->column('user_id',sortable:true)

    ->withGlobalSearch(columns: ['first_name', 'user_id'])
    ->column('first_name',sortable:false)
    ->column('total_price',sortable:false)
    ->column('shipping_status')
    // ->column('created_at', sortable: true, hidden: true)
    ->column('action')
    ->withGlobalSearch(columns: ['user_id'])
     ->paginate(15)]);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function placeorder(CheckoutRequest $request )  //StoreOrderRequest $request
    {

 

        // $id=auth()->user()->id;


        // $cartItems = auth()->user()->cartItem;
   
        $shippingAddress=[
            // 'user_id'=>$id,
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'state'=>$request->state,
            'city'=>$request->city,
            'street'=>$request->street,
        ];
        // $checkoutDetails = session('checkoutDeatils',[]);
        $checkoutDetails = session('checkoutDetails',[]);
        $checkoutDetails['shippingAddress'] =$shippingAddress;
        session()->put(['checkoutDetails'=>$checkoutDetails]);
      
            $loggedInUser=auth()->user();
            
            return redirect()->route('paymentpage');

            //  return view('order.payment');
            // new StripeController()->session();
            // (new StripeController())->session();
            // (new \App\Http\Controllers\StripeController())->session($request);

            // return redirect('/session');

            // payment
           $productItems = [];
           $subtotal=0;
           \Stripe\Stripe::setApiKey(config('stripe.sk'));
           foreach(auth()->user()->cartItem as $cartItem) {
               $subtotal= $subtotal+ ($cartItem->quantity*$cartItem->product->price );
               $productname = $cartItem->product->name;
               $totalprice = $request->get('total');
               $quantity = $cartItem->quantity;
               $two0 = "00";
               // $total = "$totalprice$two0";
               $total = $cartItem->product->price * 100;

               $productItems[]  = [
                   // [
                       'price_data' => [
                           'currency'     => 'USD',
                           'product_data' => [
                               "name" => $productname,
                               // "image" => $cartItem->product->media->file_path,
                           ],
                           'unit_amount'  => $total,
                       ],
                       'quantity'   => $quantity,
                   // ],

               ];
           }
           $checkoutSession = \Stripe\Checkout\Session::create([
               'line_items'  => [$productItems],
               'mode'        => 'payment',
               'allow_promotion_codes' => true,
               'metadata'  =>[
                   'user_id' =>auth()->user()->id
               ],
               'customer_email' => auth()->user()->email,
               'success_url' => route('success'),
               // 'success_url' => route('user.payment'),
               'cancel_url'  => route('checkout'),
           ]);
           return redirect()->away($checkoutSession->url);
    }


    

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $details = [
            'url' => route('admin.orders.update',$order),
            'method' => 'PUT',
            'title' => 'Update Order Status',
            'type' => 'update'
        ];
        $defaults = [
            'status' => $order->status,
 
        ];
        // dd($defaults);
    return view('admin.order.edit')->with('defaults', $defaults)->with('details', $details);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        if($order->status == 'shipped'){
            $invoice_date = date('jS_F_Y', strtotime(now()));
     
        $pdf = PDF::loadView('emails.order-confirmation', ['order' => $order]);
      
        $attachmentFilename = 'Invoice_'.config('app.name').'_Order_No_'.$order->id.'_Date_'.$invoice_date.'.pdf';
       
        // Get the PDF content as a string
        $pdfData = $pdf->output();
        Mail::to($order->user->email)->send(new shipmentStatus($order,$pdfData, $attachmentFilename));
        }
        Toast::success('Status Sucessfully Updated!')->autoDismiss(2);
        return redirect()->back();
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function orderItem(Order $order){

        // dd($order->id);

        return view('order.orderItem')->with('orders',$order);
    }

    public function myOrder(){
        // dd(auth()->user()->order);
        $order=auth()->user()->order;
        return view('order.myorder')->with('orders',$order);
    }
    public function viewInvoice(Order $order){
        $invoice_date = date('jS F Y', strtotime($order->invoice_date)); 
        $pdf = PDF::loadView('order.invoice', ['order' => $order]);
        return view('order.invoice')->with('invoice_date',$invoice_date)->with('order',$order);
    }

    public function generateInvoice(Order $order){
 
        $invoice_date = date('jS F Y', strtotime($order->invoice_date)); 
        $pdf = PDF::loadView('order.printinvoice', ['order' => $order]);

        // return new Response($pdf->output(), 200, [
        //     'Content-Type' => 'application/pdf',
        //     'Content-Disposition' => 'attachment; filename="invoice.pdf"',
        // ]);
        // return view('order.invoice1')->with('invoice_date',$invoice_date)->with('order',$order);
        // $pdf = PDF::loadView('order.printinvoice',array('order'=>$order));
        // return $pdf;

   return $pdf->download('Invoice_'.config('app.name').'_Order_No # '.$order->id.' Date_'.$invoice_date.'.pdf');
    }

    public function contactForm(Request $req)
    {
            // dd($req->name);  //----Network ma dekhauxa
            mail::to('info@savzaika.com')->send(new ContactMail($req));
    }



    public function paymentSucces(){


try {
    

        $sessionDetails = session()->get('checkoutDetails');
  
// save shipping address
 
if (!auth()->check()){
    $defaultPassword = 'pass@123';
    $user = User::create([
        'username' => $sessionDetails['shippingAddress']['email'],
        'first_name' => $sessionDetails['shippingAddress']['name'],
        'last_name' =>$sessionDetails['shippingAddress']['name'],
        'email' => $sessionDetails['shippingAddress']['email'],
        'password' => Hash::make($defaultPassword),
    ]);
}

// $validator = Validator::make($sessionDetails, [
//     'name' => ['required', 'string', 'max:255'],
//     'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
// ]);

$shippingAddress=Shipping_address::create([
        'user_id'=>auth()->check() ? auth()->user()->id :$user->id,
       'name'=>$sessionDetails['shippingAddress']['name'],
       'email'=>$sessionDetails['shippingAddress']['email'],
       'phone'=>$sessionDetails['shippingAddress']['phone'],
       'state'=>$sessionDetails['shippingAddress']['state'],
       'city'=>$sessionDetails['shippingAddress']['city'],
       'street'=>$sessionDetails['shippingAddress']['street'],
    //    'postal_code'=>$request->postal_code,
    ]);
     if ($shippingAddress){
        // dd($shippingAddress->id);ss
        $order = Order::create([
            'user_id' =>auth()->check() ? auth()->user()->id : $user->id,
            'shipping_address_id' => $shippingAddress->id,
            'coupon_id' => 1,
            'total_amount'=>$sessionDetails['checkoutPrice']['subtotal'],
            'discount_amount'=>$sessionDetails['checkoutPrice']['discount']
        ]);
     }
     if($order){
        //  dd($order);
        if(auth()->check()){
            $cartItems = auth()->user()->cartItem;
            foreach($cartItems as $cart){
            
                    Order_item::create([
                        'order_id'=>$order->id,
                        'product_id'=>$cart->product_id,
                        'quantity'=>$cart->quantity,
                        // 'price'=>$cart->price,
                    ]);
                    // $cart->product->stock --;
                    $cart->delete();
                }
        }
        else{
            $cart = session('cart',[]);      
            foreach ($cart as &$item) {
                Order_item::create([
                    'order_id'=>$order->id,
                    'product_id'=>$item['product_id'],
                    'quantity'=>$item['quantity'],
                
                ]);
       
            }

        }
  
        $invoice_date = date('jS_F_Y', strtotime($order->created_at));
     
        $pdf = PDF::loadView('order.printinvoice', ['order' => $order]);
      
        $attachmentFilename = 'Invoice_'.config('app.name').'_Order_No_'.$order->id.'_Date_'.$invoice_date.'.pdf';
       
        // Get the PDF content as a string
        $pdfData = $pdf->output();
     
// return [$pdfData];
// return Response::make($pdfData, 200, [
//     'Content-Type' => 'application/pdf',

// ]);

   $mailContents =Order::find($order->id);
            // dd($mailContents);
            auth()->check() ? '' : Mail::to($user->email)->send(new WelcomeEmail());
            // auth()->check() ? '' : Mail::to($user->email)->send(new credentialMail($user,$defaultPassword,));

            auth()->check()?Mail::to('surajkohar826@gmail.com')->send(new OrderConfirmation($mailContents,$pdfData, $attachmentFilename)) : Mail::to($user->email)->send(new OrderConfirmation($mailContents,$pdfData,$attachmentFilename));
            // auth()->check()?Mail::to(auth()->user()->email)->send(new OrderConfirmation($mailContents,$pdfData, $attachmentFilename)) : Mail::to($user->email)->send(new OrderConfirmation($mailContents,$pdfData,$attachmentFilename));
     }



   
  //order_Item is relation function in order model



        return view('order.thankyou');
    }
    catch (QueryException  $e) {
        $errorCode = $e->errorInfo[1];
        if ($errorCode == 1062) { // MySQL error code for duplicate entry
            // Display a user-friendly error message for duplicate entry
            session()->flash('error', 'This email address is already in use. Please Login');
            return to_route('checkout');
            // return response()->json(['error' => 'This email address is already in use.'], 422);
        } else {
            // Handle other database errors
            return response()->json(['error' => 'Database error. Please try again.'], 500);
        }
    }

    }

    public function paymentpage(){
        // return redirect()->route('user.payment');
        return view('order.payment');
        
    }
    // public function paymentSucces(){

    //     return view('order.thankyou');
        
    // }
}
