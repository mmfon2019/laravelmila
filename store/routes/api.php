<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserSeriesController;
use App\Http\Controllers\GenreSeriesController;
use App\Http\Controllers\StarringController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\StarringSeriesController;
use App\Http\Controllers\AuthController;
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


Route::resource('users.series',UserSeriesController::class)->only(['index']);
Route::resource('genres.series', GenreSeriesController::class)->only(['index']);
Route::resource('starrings.series', StarringSeriesController::class)->only(['index']);

Route::post('/register',[AuthController::class,'register']);

Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']], function() {
    Route::get('/profiles',function(Request $request) {
        return auth()->user();
    });
    Route::resource('series', SeriesController::class)->only(['update','store','destroy']);
    Route::resource('genres', GenreController::class)->only(['update','store','destroy']);
    Route::resource('starrings', StarringController::class)->only(['update','store','destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});

Route::resource('series', SeriesController::class)->only(['index','show']);
Route::resource('genres', GenreController::class)->only(['index','show']);
Route::resource('starrings', StarringController::class)->only(['index','show']);