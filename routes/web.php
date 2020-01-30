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

Route::group(
    ['prefix' => 'admin', 'middleware' => ['auth']], 
    function () {
        Route::get('/', function () {
            return view('home');
        });

        // MOTOR
        Route::get('/motor', 'MotorController@index');
        Route::post('/motor-store', 'MotorController@store');
        Route::get('/motor-isi/{id}', 'MotorController@isi');
        Route::get('/motor/{id}/edit', 'MotorController@edit');
        Route::delete('/motor-destroy/{id}', 'MotorController@destroy');
        Route::get('/warnanya', 'MotorController@warna');

        // PEMBELI
        Route::get('/pembeli', 'PembeliController@index');
        Route::post('/pembeli-store', 'PembeliController@store');
        Route::get('/pembeli-isi/{id}', 'PembeliController@isi');
        Route::get('/pembeli/{id}/edit', 'PembeliController@edit');
        Route::delete('/pembeli-destroy/{id}', 'PembeliController@destroy'); 

        // Kridit Paket
        Route::get('/table/kriditpaket', 'KriditPaketController@table');
        Route::post('/kriditpaket-store', 'KriditPaketController@store');
        Route::get('/kriditpaket-isi/{id}', 'KriditPaketController@isi');
        Route::get('/kriditpaket/{id}/edit', 'KriditPaketController@edit');
        Route::get('/kriditpaket/{id?}', 'KriditPaketController@index');
        Route::delete('/kriditpaket-destroy/{id}', 'KriditPaketController@destroy');

        // Beli Cash
        Route::get('/belicash', 'BeliCashController@index');
        Route::post('/belicash-store', 'BeliCashController@store');
        Route::get('/belicash-isi/{id}', 'BeliCashController@isi');
        Route::get('/belicash/{id}/edit', 'BeliCashController@edit');
        Route::delete('/belicash-destroy/{id}', 'BeliCashController@destroy');

        // Beli Kridit
        Route::get('/belikridit', 'BeliKreditController@index');
        Route::post('/belikridit-store', 'BeliKreditController@store');
        Route::get('/belikridit-isi/{id}', 'BeliKreditController@isi');
        Route::get('/belikridit/{id}/edit', 'BeliKreditController@edit');
        Route::delete('/belikridit-destroy/{id}', 'BeliKreditController@destroy');

        // Beli Cicilan
        Route::get('/belicicilan', 'BeliCicilanController@index');
        Route::post('/belicicilan-store', 'BeliCicilanController@store');
        Route::get('/belicicilan-isi/{id}', 'BeliCicilanController@isi');
        Route::get('/belicicilan/{id}/edit', 'BeliCicilanController@edit');
        Route::delete('/belicicilan-destroy/{id}', 'BeliCicilanController@destroy');

        

});

Route::group(
    ['prefix' => '/'], 
    function () {
        Route::get('/', 'FrontendController@index');
        Route::get('/shop', 'FrontendController@shop');
        Route::get('/about', 'FrontendController@about');
        Route::get('/blog', 'FrontendController@blog');
        Route::get('/contact', 'FrontendController@contact');
        Route::get('/beli', function () {
            return view('Frontend.beli');
        });

        // Pembelian Single Produk
        Route::get('/single', 'SingleController@index');
        
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
