<?php

use App\Http\Controllers\API\APIController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/korisnici', [APIController::class, 'users']);
Route::get('/ucenici', [APIController::class, 'students']);
Route::get('/bibliotekari', [APIController::class, 'librarians']);
Route::get('/tipovi-korisnika', [APIController::class, 'userTypes']);
Route::get('/tipovi-korisnika-broj', [APIController::class, 'userTypesCount']);

