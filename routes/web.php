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

Route::get('/', 'homecontroller@Product')->name('home');
Route::post('AddProduct', 'homecontroller@AddProduct');
Route::get('/danhsach-sp', 'homecontroller@DanhSachSP');
Route::get('/scan-product', 'homecontroller@QuetSP');
Route::post('scan-qr', 'homecontroller@ScanQR');
