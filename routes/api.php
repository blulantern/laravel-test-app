<?php

use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(ContactController::class)->group(function () {
    Route::get('/contacts', 'apiIndex')->name('contact.index');
    Route::get('/contacts/{id}', 'apiShow')->name('contact.show');
    Route::post('/contacts', 'store')->name('contact.store');
    Route::put('/contacts/{id}', 'update')->name('contact.update');
    Route::delete('/contacts/{id}', 'delete')->name('contact.delete');
});
