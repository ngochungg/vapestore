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
    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'SettingsController@index'
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'SettingsController@create'
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'SettingsController@store'
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'SettingsController@edit'
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'SettingsController@update'
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'SettingsController@delete'
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
    });
    Route::get('comment', 'Homecontroller@ReComment')->name('ReComment');
    Route::get('comment/reply/{id}', 'Homecontroller@reply')->name('reply');
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
Route::get('/products/add-to-cart/{id}', 'ProductController@addToCart')->name('addToCart');
//update cart
Route::get('/products/update-cart', 'ProductController@updateCart')->name('updateCart');
//remove cart
Route::get('products/delete-cart', 'ProductController@deleteCart')->name('deleteCart');


//contac-us
Route::get('/Contact','ContactController@contact');

//online-help
Route::get('/Online-help', 'OnlineHelpController@online');

//seeDetail
Route::get('products/details/{id}', 'Homecontroller@showDetail')->name('seeDetails');
Route::post('products/details/{id}', 'Homecontroller@comment')->name('Comment');

Route::get('/Register', 'UsersController@Register')->name('Register');
Route::post('/Registration', 'UsersController@Registration')->name('Registration');

Route::get('/profile', 'Homecontroller@profile')->name('profile');
