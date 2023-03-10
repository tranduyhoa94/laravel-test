<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NormalPostController;
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

Route::controller(NormalPostController::class)->group(function () {
    Route::get('/home', 'index');
    Route::post('/create', 'save');
    Route::put('/update/{id}', 'update');
});