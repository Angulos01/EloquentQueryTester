<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Report;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\Controller;

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

Route::get('/testPico',function(){
    return view('testPico');
});

Route::get('/tester',function(){
    return view('tester');
});
Route::get('/test-query', 'App\Http\Controllers\QueryController@showForm')->name('test-query-form');
//Route::post('/execute-query', 'App\Http\Controllers\QueryController@executeQuery')->name('execute-query');
Route::post('/execute-query', [QueryController::class, 'executeQuery'])->name('execute-query');


//Route::get('/query', [Controller::class, 'testEloquent'])->name('query');
use App\Http\Controllers\Controlador;
use Carbon\Carbon;

Route::get('/eloquent-form', function () {
    return view('eloquent');
});

Route::match(['get', 'post'], '/eloquent', [Controlador::class, 'testEloquent'])->name('api.eloquent');


Route::get('/options', function () {
    return view('options');
});

Route::post('/combine-options', function (Illuminate\Http\Request $request) {
    $combinedOptions = $request->input('option1') . ' -> ' . $request->input('option2'); // Add more options as needed

    return view('options', ['combinedOptions' => $combinedOptions]);
})->name('combineOptions');



Route::get('/test',[ReportController::class, 'index']);
Route::get('/test2',[ReportController::class, 'index2']);
Route::get('/test/search',[ReportController::class,'search'])->name('reports.search');


Route::resource('users', UserController::class);
Route::resource('companies', CompanyController::class);
Route::resource('reports', ReportController::class);