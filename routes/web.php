<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController as contacto;
use App\Http\Controllers\CustomerController as cliente;
use App\Http\Controllers\MovieController as pelicula;
use App\Http\Controllers\RentController as renta;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
