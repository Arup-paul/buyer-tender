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


Route::get('/','Frontend\FrontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'],function(){


//users controller
Route::prefix('users')->group(function(){
    Route::get('/view','Backend\UserController@view')->name('users.view');
    Route::get('/add','Backend\UserController@add')->name('users.add');
    Route::post('/store','Backend\UserController@store')->name('users.store');
    Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
    Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
    Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');
});

//profiles controller
Route::prefix('profiles')->group(function(){
    Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
    Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
    Route::post('/update','Backend\ProfileController@update')->name('profiles.update');
    Route::get('/password/view','Backend\ProfileController@passwordView')->name('password.view');
    Route::post('/password/new/update','Backend\ProfileController@passwordStore')->name('password.new.store');
});

//users controller
Route::prefix('suppliers')->group(function(){
    Route::get('/view','Backend\SupplierController@view')->name('suppliers.view');
    Route::get('/add','Backend\SupplierController@add')->name('suppliers.add');
    Route::post('/store','Backend\SupplierController@store')->name('suppliers.store');
    Route::get('/edit/{id}','Backend\SupplierController@edit')->name('suppliers.edit');
    Route::post('/update/{id}','Backend\SupplierController@update')->name('suppliers.update');
    Route::get('/delete/{id}','Backend\SupplierController@delete')->name('suppliers.delete');
});


//product controller
Route::prefix('products')->group(function(){
    Route::get('/add','Backend\ProductController@index')->name('products.add');
    Route::post('/create','Backend\ProductController@create')->name('products.creates');
});

Route::prefix( 'tender' )->group( function () {
    Route::get( '/view', 'Backend\TenderController@index' )->name( 'tender.index' );
    Route::post( '/create', 'Backend\TenderController@create' )->name( 'products.create' );
    Route::post( '/add-cart-pos', 'Backend\CartController@index' )->name('tender.add-cart');
    Route::post( '/create-tender', 'Backend\CartController@CreateTender' )->name('create-tender');
    Route::post( '/final-tender', 'Backend\CartController@FinalTender' )->name('final-tender');


    Route::get( '/tender-details', 'Backend\TenderController@TenderDetails' )->name('tender.details');
    Route::get( '/view_tender_status/{id}', 'Backend\TenderController@viewTender' )->name('tender.status');
    Route::post( '/supplierOrdered', 'Backend\TenderController@supplierOrdered' )->name('supplierOrdered');
    Route::get( '/buyerOrderedList', 'Backend\TenderController@BuyerOrderDetails' )->name('buyer.order');
} );






});
