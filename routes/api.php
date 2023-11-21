<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controlador;
use App\Http\Controllers\DataController;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::match(['get','post'], '/eloquent', [Controlador::class, 'testEloquent'])->name('api.eloquent');
Route::match(['get','post'], '/eloquent-form', [Controlador::class, ''])->name('api.eloquent');
Route::match(['get','post'], '/button', [Controlador::class, 'ola'])->name('api.eloquent');