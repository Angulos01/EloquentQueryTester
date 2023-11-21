<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Report;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataController;
use App\Http\Controllers\Controlador;
use Carbon\Carbon;

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

Route::get('/button', [Controlador::class, 'buttonView']);
Route::post('/button', [Controlador::class, 'buttonSend']);

Route::get('/DSmaker', function () {
    return view('DSmaker');
});

Route::get('/testPico',function(){
    return view('testPico');
});

Route::get('/eloquent-form', function () {
    return view('eloquent');
});

Route::get('/test4', function () {
    return view('test4');
});

Route::match(['get', 'post'], '/eloquent', [Controlador::class, 'testEloquent'])->name('api.eloquent');

//Route::match(['get', 'post'], '/flask', [ReportController::class, 'connection']);
Route::post('/flask',[ReportController::class, 'connection'])->withoutMiddleware(['web', 'csrf']);

Route::get('/test',[ReportController::class, 'index']);
Route::get('/eloquent-form',[ReportController::class, 'replacer']);
Route::get('/test2',[ReportController::class, 'index2']);
Route::get('/test3',[ReportController::class, 'index3']);
Route::get('/test/search',[ReportController::class,'search'])->name('reports.search');


Route::post('/guardar-pdf', 'PDFController@guardarPDF');
Route::resource('users', UserController::class);
Route::resource('companies', CompanyController::class);
Route::resource('reports', ReportController::class);