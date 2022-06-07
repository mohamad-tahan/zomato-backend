<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

Route::post('/add_resto', [AdminController::class, 'addResto']);

Route::get('/restaurants/{id?}', [AdminController::class, 'getAllRestos']);


Route::post('/add_user', [UserController::class, 'signUp']);
Route::get('/users/{id?}', [AdminController::class, 'getAllUsers']);

Route::post('/signIn', [UserController::class, 'signIn']);

Route::get('/restaurantById/{id}', [AdminController::class, 'getRestoById']);

Route::post('/add_review', [UserController::class, 'addReview']);

Route::get('/ratings/{id?}', [AdminController::class, 'getAllReviews']);

Route::get('/getAvgRatings/{id}', [AdminController::class, 'getAvgRatings']);