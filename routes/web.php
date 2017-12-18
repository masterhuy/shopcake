<?php

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


route::get('/','PageController@getIndex')->name('index');

route::get('/error',function(){
	abort(404);
});

Route::get('redirect', 'SocialAuthController@redirect');
Route::get('callback', 'SocialAuthController@callback');

Route::get('redirect/gg', 'SocialAuthController@redirectgg');
Route::get('callback/google', 'SocialAuthController@callbackgg');

Route::get('loai-san-pham/{id}-{alias}','PageController@getLoaiSp')->name('loaisanpham');

Route::get('chi-tiet-san-pham/{id}-{alias}','PageController@getChitiet')->name('chitietsanpham');

Route::get('lien-he','PageController@getLienHe')->name('lienhe');
route::post('lien-he','PageController@postLienHe')->name('lienhe');

Route::get('gioi-thieu','PageController@getGioiThieu')->name('gioithieu');

Route::get('add-to-cart/{id}','PageController@getAddtoCart')->name('themgiohang');
Route::get('addtocart/{id}/{qty}','PageController@addtocartmore');
Route::get('del-cart/{id}','PageController@getDelItemCart')->name('xoagiohang');
Route::get('update-cart/{id}/{qty}','PageController@updatecart');

route::get('update-cart/{mgg}','PageController@updatecart_mgg');

// cart - oder
Route::get('gio-hang','PageController@getGioHang')->name('giohang');
// them vao gio hang
Route::get('gio-hang/order-now/{id}', ['as'  => 'getcartadd', 'uses' =>'PageController@ordernow']);
Route::get('gio-hang/addcart/{id}', ['as'  => 'getcartadd', 'uses' =>'PageController@addcart']);
Route::get('gio-hang/update/{id}/{qty}-{dk}', ['as'  => 'getupdatecart', 'uses' =>'PageController@getupdatecart']);
Route::get('gio-hang/delete/{id}', ['as'  => 'getdeletecart', 'uses' =>'PageController@getdeletecart']);
Route::get('gio-hang/xoa', ['as'  => 'getempty', 'uses' =>'PageController@xoa']);

Route::get('dat-hang','PageController@getCheckout')->name('dathang');
Route::post('dat-hang','PageController@postCheckout')->name('dathang');

Route::get('dang-nhap','PageController@getLogin')->name('dangnhap');
Route::post('dang-nhap','PageController@postLogin')->name('dangnhap');

Route::get('dang-ki','PageController@getSignin')->name('dangki');
route::post('dang-ki','PageController@postSignin')->name('dangki');

route::get('dang-xuat','PageController@postLogout')->name('dangxuat');

route::get('search','PageController@getSearch')->name('search');

Route::get('language/{locale}', function ($locale) {
	Session::put('locale', $locale);
	return redirect()->back();
});


Auth::routes();

Route::get('admin', 'HomeController@index')->name('admin');

Route::get('logout', array('uses' => 'Auth\LoginController@logout'));

route::group(['middleware'=>'auth'],function(){
	route::resource('user','UserController');
	route::resource('type_product','TypeProductController');
	route::resource('product','ProductController');
	route::resource('customer','CustomerController');
	route::resource('bill','BillController');
	route::resource('bill_detail','BillDetailController');
});	

