<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\kadai01Controller;
use App\Http\Controllers\kadai01_1Controller;
use App\Http\Controllers\kadai02_1Controller;
use App\Http\Controllers\kadai02_2Controller;
use App\Http\Controllers\kadai02_3Controller;
use App\Http\Controllers\kadai03_1Controller;
use App\Http\Controllers\kadai04_1Controller;
use App\Http\Controllers\kadai05_1Controller;
use App\Http\Controllers\kadai06_1Controller;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('kadai01',[kadai01Controller::class,'index']);
Route::get('kadai01_1', [kadai01_1Controller::class,'index']);

Route::get('kadai02_1', [kadai02_1Controller::class,'index']);
Route::get('kadai02_2', [kadai02_2Controller::class,'index']);
Route::get('kadai02_3', [kadai02_3Controller::class,'index']);

Route::get('kadai03_1', [kadai03_1Controller::class,'index']);

Route::get('kadai04_1', [kadai04_1Controller::class,'index']);
Route::post('kadai04_1', [kadai04_1Controller::class,'post']); //讀取4_1の傳送資料

Route::get('kadai05_1', [kadai05_1Controller::class,'index']);    //controller's function index
Route::post('kadai05_1', [kadai05_1Controller::class,'post']);

Route::resource('kadai06_1', kadai06_1Controller::class);


