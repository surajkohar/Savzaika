<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    //

    public function checkout(){

    }
    public function session(Request $request){
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
            // 'allow_promotion_codes' => true,
            // 'metadata'  =>[
            //     'user_id' =>auth()->user()->id
            // ],
            // 'customer_email' => auth()->user()->email,
            'success_url' => route('success'),
            'cancel_url'  => route('checkout'),
        ]);
        return redirect()->away($checkoutSession->url);

    }
    public function success()
    {

        return view('order.thankyou');
        // return "Thanks for you order You have just completed your payment. The seeler will reach out to you as soon as possible";
    }

    public function postPaymentStripe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_no' => 'required',
            'ccExpiryMonth' => 'required',
            'ccExpiryYear' => 'required',
            'cvvNumber' => 'required',
            //'amount' => 'required',
        ]);
        $input = $request->all();
        if ($validator->passes()) {
            $input = array_except($input, array('_token'));
            $stripe = Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $request->get('card_no'),
                        'exp_month' => $request->get('ccExpiryMonth'),
                        'exp_year' => $request->get('ccExpiryYear'),
                        'cvc' => $request->get('cvvNumber'),
                    ],
                ]);
                if (!isset($token['id'])) {
                    return redirect()->route('addmoney.paymentstripe');
                }
                $charge = $stripe->charges()->create([
                    'card' => $token['id'],
                    'currency' => 'USD',
                    'amount' => 20.49,
                    'description' => 'wallet',
                ]);

                if ($charge['status'] == 'succeeded') {
                    echo "<pre>";
                    print_r($charge);
                    exit();
                    return redirect()->route('addmoney.paymentstripe');
                } else {
                    \Session::put('error', 'Money not add in wallet!!');
                    return redirect()->route('addmoney.paymentstripe');
                }
            } catch (Exception $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('addmoney.paymentstripe');
            } catch (\Cartalyst\Stripe\Exception\CardErrorException $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('addmoney.paywithstripe');
            } catch (\Cartalyst\Stripe\Exception\MissingParameterException $e) {
                \Session::put('error', $e->getMessage());
                return redirect()->route('addmoney.paymentstripe');
            }
        }
    }
}
