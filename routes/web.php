<?php

use App\Http\Controllers\IndicesController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndicesController::class, 'indices']);
Route::get('/index/{index}', [IndicesController::class, 'index'])->where('index', '^([0-9A-Za-z\-_]+)');
Route::get('/type/{index}/{index_type}', [IndicesController::class, 'index_type'])
    ->where('index', '^([0-9A-Za-z\-_]+)')
    ->where('index_type', '^([0-9A-Za-z\-_]+)');
Route::get('/item/{index}/{index_type}/{id}', [IndicesController::class, 'item'])
    ->where('index', '^([0-9A-Za-z\-_]+)')
    ->where('index_type', '^([0-9A-Za-z\-_]+)')
    ->where('id', '^([0-9A-Za-z\-_]+)');
