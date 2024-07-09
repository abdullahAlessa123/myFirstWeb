<?php

use App\Http\Controllers\Api\myUserController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\StudentCRUD;
//use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', myUserController::class . '@logout');
    Route::apiResource('/users', UserController::class);
});


Route::post('/AddStudent', StudentCRUD::class . '@addStudent')->middleware('auth:sanctum');

Route::get('/GetStudent', StudentCRUD::class . '@getStudent');

Route::get('/GetOneStudent/{id}', StudentCRUD::class . '@getOneStudent');


Route::delete('/DeleteStudent/{id}', StudentCRUD::class . '@deleteStudent');

Route::patch('/SomeUpdateStudent/{id}/{name}', StudentCRUD::class . '@updateSomeStudent');

Route::put('/AllUpdateStudent/{id}/{name}/{ksuId}', StudentCRUD::class . '@updateAllStudent');

// Route::post('/signup', [myUserController::class, 'signup']);
// Route::post('/login', [myUserController::class, 'login']);
// Route::post('/logout', [myUserController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/signup', myUserController::class . '@signup');
Route::post('/login', myUserController::class . '@login');
