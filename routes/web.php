<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\IncidentController;

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
Route::get('/incident/add', [IncidentController::class, 'add_incident']);
Route::post('/incident/add/check', [IncidentController::class, 'incident_check']);

Route::get('/test', [MainController::class, 'test']);
