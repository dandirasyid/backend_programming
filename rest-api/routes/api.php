<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\StudentController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


# method get
Route::get('/animals', [AnimalsController::class, 'index']);

# method post
Route::post('/animals', [AnimalsController::class, 'store']);

# method put
Route::put('/animals/{id}', [AnimalsController::class, 'update']);

# method delete
Route::delete('/animals/{id}', [AnimalsController::class, 'destroy']);

# method get
Route::get('/student', [StudentController::class, 'index']);

# method post
Route::post('/student', [StudentController::class, 'store']);

# method put
Route::put('/student/{id}', [StudentController::class, 'update']);

# method delete
Route::delete('/student/{id}', [StudentController::class, 'destroy']);
