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
Route::resource('login', 'LoginController',['only' => ['index', 'store','show','create']])->middleware('CheckUser');

Route::resource('logout', 'LogoutController',['only' => ['index', 'store']]);

// User
Route::group(['namespace'=>'FrontEnd'],function(){

	Route::resource('/', 'HomeController')->names([ 'index' => 'home',  'create' => 'home.create'  ]);
    Route::post('add-cart', 'HomeController@store')->name('home.store');
	Route::resource('category-product', 'CategoryController');
	Route::resource('product-detail', 'DetailController');
	Route::resource('cart', 'CartController');
	Route::resource('cart-address', 'AddressCartController');
	Route::resource('cart-address-vnpay', 'VnpayController');
	Route::resource('wishlist', 'WishlistController');
	Route::resource('history', 'HistoryController');
});

Route::group(['namespace'=>'BackEnd'],function(){


	Route::middleware('CheckLogin')->group(function(){

		Route::resource('dashboard', 'HomeController');
		Route::group(['prefix'=>'dashboard'],function(){
			Route::post('table', 'HomeController@store_table')->name('store.table');
			Route::post('total', 'HomeController@store_total')->name('store.total');
		});
		Route::resource('account', 'AccountController');
		Route::resource('remove', 'RemoveController');

		Route::resource('product', 'ProductController');
		Route::resource('product-gallery','GalleryController');
		Route::resource('slider','SliderController');
		Route::resource('category','CategoryController');
		Route::resource('coupon','CouponController');
		Route::resource('order','OrderController');
		Route::resource('contacts','ContactController');

		Route::resource('sorting', 'SortingController')->only('store');
		Route::resource('list', 'SubCategoryController');

		// Status All
		Route::resource('status','StatusController')->only('store');
	});

});



Route::get('/details-news', function () {
    return view('news');
})->name('details-news');
Route::get('/details-news2', function () {
    return view('news2');
})->name('details-news2');
Route::get('/chinhsach1', function () {
    return view('baohanh');
})->name('chinhsach1');
Route::get('/chinhsach2', function () {
    return view('doitra');
})->name('chinhsach2');
Route::get('/chinhsach3', function () {
    return view('baomat');
})->name('chinhsach3');
Route::get('/chinhsach4', function () {
    return view('giaonhan');
})->name('chinhsach4');
Route::get('/hotro1', function () {
    return view('chamsoc');
})->name('hotro1');
Route::get('/hotro2', function () {
    return view('thanhtoan');
})->name('hotro2');
Route::get('/hotro3', function () {
    return view('muahang');
})->name('hotro3');
Route::get('/gioithieu', function () {
    return view('gioithieu');
})->name('gioithieu');
Route::get('/lienhe', function () {
    return view('lienhe');
})->name('lienhe');