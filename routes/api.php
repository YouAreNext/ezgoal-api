<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Parser\MaterialParserController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('me', [LoginController::class, 'me']);
Route::post('login', [LoginController::class, 'login']);
Route::post('register', [RegisterController::class, 'create']);

Route::prefix('/parse')->group(function () {
    Route::post('/material', [MaterialParserController::class, 'parseMaterial']);
});
