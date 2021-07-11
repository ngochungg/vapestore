<?php

use Illuminate\Support\Facades\Route;

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
//Back-end
Route::get('/admin', 'AdminController@loginAdmin');
Route::post('/admin', 'AdminController@postLoginAdmin');
Route::get('/logout', 'AdminController@logout')->name('logout');
//Route::get('/login', function () {
//    return view('login');
//})->name('loginShow');
Route::get('/home','AdminController@showHome');

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/',[
            'as' => 'categories.index',
            'uses' => 'CategoryController@index'
        ]);
        Route::get('/create',[
            'as' => 'categories.create',
            'uses' => 'CategoryController@create'
        ]);
        Route::post('/store',[
            'as' => 'categories.store',
            'uses' => 'CategoryController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete'
        ]);
    });
    Route::prefix('menus')->group(function () {
        Route::get('/',[
            'as' => 'menus.index',
            'uses' => 'MenuController@index'
        ]);
        Route::get('/create',[
            'as' => 'menus.create',
            'uses' => 'MenuController@create'
        ]);
        Route::post('/store',[
            'as' => 'menus.store',
            'uses' => 'MenuController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete'
        ]);
    });
    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'AdminProductController@index'
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'AdminProductController@create'
        ]);
        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'AdminProductController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'AdminProductController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'AdminProductController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'AdminProductController@delete'
        ]);
        Route::get('/details/{id}', [
            'as' => 'product.details',
            'uses' => 'AdminProductController@details'
        ]);
    });
    Route::prefix('order')->group(function () {
        Route::get('/', [
            'as' => 'order.index',
            'uses' => 'CheckoutController@index'
        ]);
        Route::get('/order_processing', [
            'as' => 'order.processing',
            'uses' => 'CheckoutController@processing_order'
        ]);
        Route::get('/order_complete', [
            'as' => 'order.complete',
            'uses' => 'CheckoutController@complete_order'
        ]);
        Route::get('/order_cancel', [
            'as' => 'order.cancel',
            'uses' => 'CheckoutController@cancel_order'
        ]);
        Route::post('/update/{id}', [
            'as' => 'order.update',
            'uses' => 'CheckoutController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'order.delete',
            'uses' => 'CheckoutController@delete'
        ]);
        Route::get('/details/{id}', [
            'as' => 'order.details/{orderId}',
            'uses' => 'CheckoutController@details'
        ]);
    });
    Route::post('/status-update1/{order_id}', 'CheckoutController@processing')->name('update');
    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'SliderController@index'
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'SliderController@create'
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'SliderController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'SliderController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'SliderController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'SliderController@delete'
        ]);
    });
    Route::prefix('new')->group(function () {
        Route::get('/', [
            'as' => 'new.index',
            'uses' => 'NewsController@index'
        ]);
        Route::get('/create', [
            'as' => 'new.create',
            'uses' => 'NewsController@create'
        ]);
        Route::post('/store', [
            'as' => 'new.store',
            'uses' => 'NewsController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'new.edit',
            'uses' => 'NewsController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'new.update',
            'uses' => 'NewsController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'new.delete',
            'uses' => 'NewsController@delete'
        ]);
        Route::get('/details/{id}', [
            'as' => 'new.details',
            'uses' => 'NewsController@details'
        ]);
    });
    Route::prefix('information')->group(function () {
        Route::get('/',[
            'as' => 'information.index',
            'uses' => 'InformationController@index'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'information.edit',
            'uses' => 'InformationController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'information.update',
            'uses' => 'InformationController@update'
        ]);
    });
    Route::prefix('contact')->group(function () {
        Route::get('/',[
            'as' => 'contact.index',
            'uses' => 'ContactController@index'
        ]);
        Route::post('/store', [
            'as' => 'contact.add',
            'uses' => 'ContactController@store'
        ]);
        Route::get('/check/{id}', [
            'as' => 'contact.delete',
            'uses' => 'ContactController@delete'
        ]);
        Route::get('/reply/{id}', [
            'as' => 'contact.edit',
            'uses' => 'ContactController@edit'
        ]);
        Route::post('/send/{id}', [
            'as' => 'contact.send',
            'uses' => 'ContactController@send'
        ]);
    });
    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'UsersController@index'
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'UsersController@create'
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'UsersController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'UsersController@editInformation'
        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'UsersController@updateInformation'
        ]);
        Route::get('/editPass/{id}', [
            'as' => 'users.editPass',
            'uses' => 'UsersController@editPass'
        ]);
        Route::post('/updatePass/{id}', [
            'as' => 'users.updatePass',
            'uses' => 'UsersController@updatePass'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'UsersController@delete'
        ]);
        Route::get('/details/{id}', [
            'as' => 'users.details',
            'uses' => 'UsersController@details'
        ]);
        Route::get('/detailsUser/{id}', [
            'as' => 'users.detailsUser',
            'uses' => 'UsersController@detailsUser'
        ]);
        Route::get('/customer', [
            'as' => 'users.customer',
            'uses' => 'UsersController@customer'
        ]);
        Route::get('/administrator', [
            'as' => 'users.administrator',
            'uses' => 'UsersController@administrator'
        ]);
        Route::get('/role', [
            'as' => 'users.role',
            'uses' => 'UsersController@role'
        ]);
        Route::post('/roleUpdate/{id}', [
            'as' => 'users.roleUpdate',
            'uses' => 'UsersController@roleUpdate'
        ]);
        Route::post('/updateCustomer/{id}', [
            'as' => 'users.updateCustomer',
            'uses' => 'UsersController@updateCustomer'
        ]);
        Route::post('/updatePassCustomers/{id}', [
            'as' => 'users.updatePassCustomers',
            'uses' => 'UsersController@updatePassCustomers'
        ]);
    });
    Route::get('comment', 'Homecontroller@ReComment')->name('ReComment');
    Route::get('comment/reply/{id}', 'Homecontroller@reply')->name('reply');
    Route::get('comment/{id}', 'Homecontroller@commentDelete')->name('commentDelete');
    Route::post('comment/reply/{id}', 'Homecontroller@replyComment')->name('replyComment');
});


//Front-end
Route::get('/', 'Homecontroller@index')->name('homef');

Route::get('/category/slug/{id}', [
    'as' =>'category.product',
    'uses' => 'ViewCategoryController@index'
]);


//cart
//show cart
Route::get('product/show-cart', 'ProductController@showCart')->name('showCart');
//add to cart
Route::get('/products/add-to-cart', 'ProductController@addToCart')->name('addToCart');
//update cart
Route::get('/products/update-cart', 'ProductController@updateCart')->name('updateCart');
//remove cart
Route::get('products/delete-cart', 'ProductController@deleteCart')->name('deleteCart');

//checkout
Route::get('/login-checkout', 'CheckoutController@loginAdmin');
Route::post('/login-checkout', 'CheckoutController@postLoginAdmin');
Route::get('/logout', 'CheckoutController@logout')->name('logout');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/order-place', 'CheckoutController@order_place');


//contac-us
Route::get('/Contact','ContactController@contact');

//online-help
Route::get('/Online-help', 'OnlineHelpController@online');

//seeDetail
Route::get('products/details/{id}', 'Homecontroller@showDetail')->name('seeDetails');
Route::post('products/details/{id}', 'Homecontroller@comment')->name('Comment');
//Register
Route::get('/Register', 'UsersController@Register')->name('Register');
Route::post('/Registration', 'UsersController@Registration')->name('Registration');

//profile
Route::get('/profile/{id}', 'Homecontroller@profile')->name('profile');
Route::get('/profile/order_detail/{id}', 'Homecontroller@order_detail')->name('order_detail');
Route::get('/profile/Cancel/{id}', 'Homecontroller@order_Cancel')->name('order_Cancel');

//forgot_password
//Route::get('/forgot_password', 'UsersController@forgot_password')->name('forgot_password');
//Route::post('/forgot_password', 'UsersController@Rpassword')->name('Rpassword');
Route::get('forget-password','ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post');
Route::get('reset-password/{token}','ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');

//login google
Route::get('/google', 'UsersController@redirectToGoogle');
Route::get('callback/google', 'UsersController@handleCallback');

//login facebook
Route::get('/facebook', 'UsersController@redirectToFacebook');
Route::get('callback/facebook', 'UsersController@handleCallbackFace');

//paypal
Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));

//search
Route::get('/search-name/', 'SearchController@search_name')->name('searchName');
Route::get('/search-price/', 'SearchController@search_price')->name('searchPrice');

//profile
Route::get('/new', 'NewsController@frontNew')->name('frontNew');
Route::get('/new/{id}', 'NewsController@front2New')->name('front2New');

//coupon
Route::post('/check-coupon','CheckoutController@check_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');
Route::get('/insert-coupon', 'CouponController@insert_coupon');
Route::get('/list-coupon', 'CouponController@list_coupon');
Route::get('/delete-coupon/{coupon_id}', 'CouponController@delete_coupon');
Route::get('/drop-coupon', 'CouponController@drop_coupon');


