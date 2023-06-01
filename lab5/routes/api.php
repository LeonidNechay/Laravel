<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\AutoCollection;
use App\Http\Resources\AutoResource;
use App\Models\Auto;

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
Route::get('/autos', function () {
    return new AutoResource(Auto::paginate(2));
})->middleware('auth:api');

Route::middleware('auth:api')->group(function () {
    Route::get('/autos/{id}', function (string $id) {
        return new AutoResource(Auto::findOrFail($id));
    });

    Route::post('posts',  function () {return ["status"=>"ok"];});
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
