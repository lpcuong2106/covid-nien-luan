<?php
  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Vaccination\VaccinationController;
use App\Http\Controllers\API\Result_test\Result_testController;

  
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
Route::prefix('v1')->group(function () {
    Route::post('/auth/register', [RegisterController::class, 'register']);
    Route::post('/auth/login', [LoginController::class, 'login']);
    Route::get('/test',  [LoginController::class, 'test']);

    //api resource
    Route::middleware('auth:api')->group(function () {
        Route::resource('vaccination', VaccinationController::class);
        Route::resource('result_test', Result_testController::class);
    });
});
