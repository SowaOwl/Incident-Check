<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\IncidentController;
use App\Http\Controllers\ModeratorController;
use App\Http\Controllers\RequestController;
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

Route::get('/', [MainController::class, 'main'])->name('main');

Route::get('/incidents', [IncidentController::class, 'incidents'])->name('incidents');

Route::get('/incident', [IncidentController::class, 'incident']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['role:admin|redactor|user']],function (){
    Route::get('/request/add', [RequestController::class, 'add_request']);
    Route::post('/request/add/check', [RequestController::class, 'request_check']);
});

Route::group(['middleware'=>['role:admin|redactor']],function (){
    Route::get('/incident/add', [IncidentController::class, 'add_incident']);
    Route::post('/incident/add/check', [IncidentController::class, 'incident_check']);
});

Route::group(['middleware'=>['role:admin']],function (){
    Route::get('/moderator_list',[RequestController::class, 'moderator_list'])->name('moderator_list');
    Route::get('/request/approved', [RequestController::class, 'request_approved']);
    Route::get('/request/reject', [RequestController::class, 'request_reject']);
});
