<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablaController;

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

Route::get('/', [TablaController::class, 'index']); 

Route::get('/TablaLicencias', [TablaController::class, 'tabla']); 

Route::post('procesar-form', [TablaController::class, 'procesarForm']);

Route::post('/eliminar-form', [TablaController::class,'eliminarForm']);


