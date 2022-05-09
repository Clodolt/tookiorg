<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IslandController;

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

//Protected Routes
//Route:group(['middleware' => ['auth:sanctum']], function(){
  //  Route::post('/island', [IslandController::class, 'store']);
    //Route::post('/island/{id}', [IslandController::class, 'update']);
    //Route::post('/island{{id}', [IslandController::class, 'destroy']);
//});



//Public routes
Route::get('/islands', [IslandController::class, 'index']);
Route::get('/islands/{title}', [IslandController::class, 'show']);

//Route::resource('island', IslandController::class);
