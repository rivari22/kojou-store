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

Route::get('/', 'BerandaController@index')->name('beranda');
Route::get('/product', 'BerandaController@product');
Route::get('/category/{slug}','BerandaController@productbycategory');
Route::get('/penjual/{id}','BerandaController@productbypenjual');
Route::get('/product/detail/{slug}','BerandaController@detail');  
Route::get('/tentangkami','BerandaController@tentangkami')->name('tentangkami');
Route::get('/auth/register','AuthController@register');
Route::post('/auth/register','AuthController@store')->name('home.register');
Route::post('/auth/login','AuthController@login');

//cart
Route::post('/cart','CartController@index');
Route::get('/keranjang','CartController@keranjang');
Route::post('/cart/update','CartController@update');
Route::get('/cart/delete/{rowid}','CartController@delete');

//formulir cp
Route::get('cart/formulir','CartController@formulir'); 
Route::post('cart/transaction','CartController@transaction'); 

//pesanan saya
Route::get('/cart/myorder','CartController@myorder');
Route::get('/cart/detailtransaksi/{code}','CartController@detailtransaksi');

Route::get('/cart/confirmation/{code}','CartController@confirmation');

Route::get('/myproduct','CartController@myproduct')->middleware('oauth:supplier|admin');
Route::get('/addproduct','CartController@addproduct')->middleware('oauth:supplier|admin');; //blade revisi
Route::post('saveproduct','CartController@saveproduct')->middleware('oauth:supplier|admin');; //blade revisi
Route::get('editproduct/{id}','CartController@editproduct')->middleware('oauth:supplier|admin');;
Route::post('editproduct','CartController@updateproduct')->middleware('oauth:supplier|admin');;
Route::get('deleteproduct/{id}','CartController@deleteproduct')->middleware('oauth:supplier|admin');;

// Route::get('/cart/keteranganpembayaran/{id}','CartController@keteranganpembayaran');
// Route::put('/cart/konfirmasi/{id}','CartController@konfirmasi');

Route::get('/logout','BerandaController@logout');

Route::get('myprofil','BerandaController@myprofil');
Route::post('updateprofil','BerandaController@updateprofil');

Auth::routes();
Route::get('citybyid/{id}',function($id){
    return city($id);
});



Route::prefix('admin')->middleware('oauth:admin')->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('dashboard','HomeController@index')->name('dashboard');
    Route::get('media','HomeController@media')->name('media.index');//media
    Route::resource('category','CategoryController');//category
    Route::resource('product','ProductController');//product
    //transaction
    Route::get('transaction','TransactionController@index')->name('transaction.index');
    Route::get('transaction/{code}/{status}','TransactionController@status');
    Route::get('transaction/{code}/detail/data','TransactionController@detail');
    Route::get('transaction/{code}/detail/data/cetak','TransactionController@cetakpdf');
    //users
    Route::get('user','UserController@index')->name('admin.user');
    Route::get('user/status/{id}','UserController@changestatus');
    Route::get('user/edit/{id}','UserController@edit');
    Route::post('user/update/','UserController@update');
    Route::get('user/delete/{id}','UserController@delete');
    Route::get('user/add','UserController@create')->name('admin.user.create');
    Route::post('user/add','UserController@store')->name('admin.user.store');
    Route::get('/user/logout','UserController@logout')->name('admin.logout');
});