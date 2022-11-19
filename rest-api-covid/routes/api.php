<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    # Get all resource patients - method get 
    Route::get('/patients', [PatientsController::class, 'index']);
    
    # Add Resource - method post
    Route::post('/patients', [PatientsController::class, 'store']);
    
    # Get detail resource - method get
    Route::get('/patients/{id}', [PatientsController::class, 'show']);
    
    # Edit resource - method put
    Route::put('/patients/{id}', [PatientsController::class, 'update']);
    
    # Delete resouce - method delete
    Route::delete('/patients/{id}', [PatientsController::class, 'destroy']);
    
    # Search Resource by name - method get
    Route::get('/patients/search/{name}', [PatientsController::class, 'search']);
    
    # Get Positive Resource - method get
    Route::get('/patients/status/positive', [PatientsController::class, 'positive']);
    
    # Get Recovered Resource - method get
    Route::get('/patients/status/recovered', [PatientsController::class, 'recovered']);
    
    # Get Dead Resource - method get
    Route::get('/patients/status/dead', [PatientsController::class, 'dead']);
});

# membuat route dan register
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);