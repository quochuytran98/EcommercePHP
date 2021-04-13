<?php
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Product;
use App\Brand;
use App\Http\Middleware;
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
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

// Route::get('login/facebook', 'UserController@redirectToProvider');
// Route::get('login/facebook/callback', 'UserController@handleProviderCallback');

////////////////////////////////////// USER //////////////////////////////////////////
Route::get('/getwishlist','cartController@getwishlist')->name('getwishlist');
Route::post('/wishlist','cartController@wishlist')->name('wishlist');
Route::post('/quickview','productController@quickview')->name('quickview');
Route::get('/category/{id}','productController@GetProductCate')->name('category');
Route::get('/brand/{id}','productController@GetProductBrand')->name('brand');
Route::get('/allproduct','productController@GetAllProduct')->name('allproduct');
Route::get('/search/{key}','productController@Search')->name('search');
Route::get('/details/{id}','productController@details')->name('details');

Route::get('logout', function () {
    Auth::logout();
    Session::flush();
    Cart::destroy();
    return redirect()->route('index');
})->name('logout');

Route::get('/cart','CartController@Cart')->name('cart');
Route::post('/loadCart','CartController@loadCart')->name('loadCart');
Route::post('/deleteItemCart','CartController@deleteItemCart')->name('deleteItemCart');
Route::post('/update_cart','CartController@updateCart')->name('updateCart');
Route::post('/ajax_add_cart','CartController@addCart')->name('add_cart');



 

Route::get('/order_detail','UserController@Details_order')->name('order_detail');

Route::group(['middleware' => 'CheckUser'], function () {
    Route::get('/profile','UserController@profile')->name('profile');
    Route::post('/SessionCart','CartController@SessionCart')->name('SessionCart');
    Route::get('/Orders/{type}','CartController@Order')->name('Orders');
});


Route::get('/login','UserController@getLogin')->name('login-user');
Route::post('/login','UserController@Login')->name('login');
Route::post('/register','UserController@Register')->name('register');






Route::get('/','homeController@index')->name('index');

Route::post('/admin','AdminController@Login')->name('login-admin');
Route::get('/admin','AdminController@getLogin')->name('login-admin');
Route::get('/logout_admin', function () {
    Auth::logout();
    
    return redirect()->route('login-admin');
})->name('logout_admin');


Route::group(['middleware' => 'CheckAdmin'], function () {
    Route::get('/dashboard','AdminController@index')->name('dashboard');
    Route::get('/admin-product','productController@productList')->name('product');
    Route::post('/admin-addProduct','productController@addProduct')->name('addProduct');
    Route::get('/admin-getProduct/{id}','productController@getProduct')->name('getProduct');
    Route::post('/admin-updateProduct/{id}','productController@updateProduct')->name('updateProduct');

    Route::get('/details_bill','CartController@getBillDetails')->name('details_bill');

    Route::get('/updateStatus','CartController@updateStatus')->name('updateStatus');
    Route::get('/admin-listbill','CartController@allBill')->name('allBill');

    Route::get('/admin-brand','brandController@allBrand')->name('allBrand');
    Route::get('/ajax_addBrand','brandController@addBrand')->name('addBrand');
    Route::get('/editbrand','brandController@editBrand')->name('editBrand');

    Route::get('/ajax_deletepro','brandController@deleteBrand')->name('deleteBrand');
    Route::get('/deleteproduct','productController@deleteproduct')->name('deleteproduct');
}); 
    ////////////////////////////////////// ADMIN /////////////////////////////////////////
   
Route::get('/test', function () {
    $test = Session::get('id_user');
    echo $test;
});


