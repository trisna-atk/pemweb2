<?php
namespace App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    echo "Selamat Datang di laravel";
});

Route::get('/greeting', function () {
    return view('greeting');
});

Route::get('/mobil', [MobilController::class, 'index']); 
Route::get('/mobil/create', [MobilController::class, 'create']); 
Route::post('/mobil/simpan-data', [MobilController::class, 'store']); 