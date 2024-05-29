<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Slider;
use App\Models\Visitor;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\OrderController;
use ProtoneMedia\Splade\Facades\Toast;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('splade')->group(function () {
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    Route::get('/', function () {
        $sliders = Slider::all();
        $products = App\Models\Product::paginate(8);
        $visitorCount = Visitor::count();
        // dd($visitorCount);
        // return $products;
        // return $sliders;
        return view('homepage')->with('sliders',$sliders)->with('products',$products)->with('visitorCounter',$visitorCount);
    })->name('home')->middleware('visitor');
    // Route::get('/product', function () {
    //     return view('product');
    // })->name('product');
    Route::get('/work_for_us', function () {
        return view('work_for_us');
    })->name('work_for_us');

    Route::get('/artisancall', function () {
        // \Artisan::call('db:seed', ['--class' => 'YourSeeder']);
        try {
        Artisan::call('db:seed');
        $output = Artisan::output();
        return "Artisan command executed. Output: $output";
        }
        catch(\Exception $e) {
            return "Error executing Artisan command: " . $e->getMessage();
        }
    })->name('artisanCall');
    Route::get('/contact', function () {
        return view('contact');
    })->name('contact');
    Route::get('/ourcompany', function () {
        return view('ourcompany');
    })->name('ourcompany');
    Route::get('/product',[StoreController::class,'index'])->name('product');
    Route::get('/productdetails/{product}',[StoreController::class,'productDetails'])->name('productDetails');

    Route::middleware('auth')->group(function () {
        // Route::get('/dashboard', function () {
        //     return view('dashboard');
        // })->middleware(['verified'])->name('dashboard');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/myorder', [OrderController::class,'myOrder'])->name('myorder');
        Route::get('/viewInvoice/{order}', [OrderController::class,'viewInvoice'])->name('viewInvoice');

    });

    Route::middleware(['auth', 'role:admin'])->prefix('/admin')->name('admin.')->group(function () {
    // Route::middleware(['auth'])->prefix('/admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::resource('/users', UserController::class);
        Route::get('/setting', [SettingController::class, 'addSMTPAddress'])->name('setting');
        Route::post('/setting/configuresmtp', [SettingController::class, 'configureSMTP'])->name('configureSMTP');
        Route::resource('/roles', RoleController::class);
        Route::resource('/permissions', PermissionController::class);
        Route::resource('/products', ProductController::class);
        Route::resource('/slider', SliderController::class);
        Route::resource('/coupons', CouponController::class);
        Route::resource('/orders', OrderController::class);
        Route::get('/orderItem/{order}', [OrderController::class,'orderItem'])->name('user.orderItem');




        // Route::resource('/products', ProductController::class);
    });
    Route::resource('/carts', CartController::class);
    Route::post('/cart/addtocart/{product}', [CartController::class,'addToCart'])->name('addToCart');
    // Route::put('/cart/updatecart', [CartController::class,'update'])->name('updateCart');
    Route::put('/cart/updatecart/{cart}', [CartController::class,'updateCart'])->name('updateCart');
    Route::get('/flushsessioncart',[CartController::class,'flushSessionCart'])->name('flush');
    Route::put('/cart/updateSessionCart/{cart}', [CartController::class,'updateSessionCart'])->name('updateSessionCart');
    Route::delete('/cart/deleteSessionCart/{cart}', [CartController::class,'deleteSessionCart'])->name('deleteSessionCart');
    Route::delete('/cart/deleteCartItem/{cart}', [CartController::class,'destroy'])->name('deleteCartItem');
    Route::post('/applyCoupon', [CartController::class,'applyCoupon'])->name('applyCoupon');
    Route::post('/placeorder', [OrderController::class,'placeorder'])->name('placeorder');
    Route::post('/user/payment', [OrderController::class,'payment'])->name('user.payment');

    Route::get('/user/paymentpage', [OrderController::class,'paymentpage'])->name('paymentpage');
    Route::post('/user/sucesss/msg', [OrderController::class,'paymentSucces'])->name(' user.payments');

    Route::post('/contact', [OrderController::class,'contactForm'])->name('contact.submit');
  
    Route::get('/generateInvoice/{order}', [OrderController::class,'generateInvoice'])->name('generateInvoice');
    
    // payment
    // Route::get('/checkout', 'App\Http\Controllers\StripeController@checkout')->name('checkout');
    // Route::post('/session', 'App\Http\Controllers\StripeController@session')->name('session');
    // Route::get('/success', 'App\Http\Controllers\StripeController@success')->name('success');


    Route::get('/checkout',[checkoutController::class,'checkout'])->name('checkout');
    Route::middleware(['guest'])->group(function () {
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
        Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.store');
    });

    require __DIR__ . '/auth.php';
});
