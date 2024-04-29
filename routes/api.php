<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;

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

// Ruta para obtener todos los registros
Route::get('/movies', [MovieController::class, 'index']);

// Ruta para obtener un registro por ID
Route::get('/movies/{id}', [MovieController::class, 'show']);

Route::post('/movies', [MovieController::class, 'store']);

Route::put('/movies/{id}', [MovieController::class, 'update']);

Route::delete('/movies/{id}', [MovieController::class, 'destroy']);

