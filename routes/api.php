<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PaketController;

//http://localhost:8000/api/register
Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);

//ini outlet
Route::group(['middleware' => ['jwt.verify:admin']], function () {
    Route::post('outlet', [OutletController::class, 'insert']);
    Route::put('outlet/{id}', [OutletController::class, 'update']);
    Route::delete('outlet/{id}', [OutletController::class, 'delete']);
    Route::get('outlet', [OutletController::class, 'getAll']);
    Route::get('outlet/{id}', [OutletController::class, 'getById']);
});
//Route::post('outlet', [OutletController::class, 'insert']);
//Route::put('outlet/{id}', [OutletController::class, 'update']);
//Route::delete('outlet/{id}', [OutletController::class, 'delete']);

//ini member
Route::post('member', [MemberController::class, 'insert']);
Route::put('member/{id}', [MemberController::class, 'update']);
Route::delete('member/{id}', [MemberController::class, 'delete']);
Route::get('member', [MemberController::class, 'getAll']);
Route::get('member/{id}', [MemberController::class, 'getById']);

//ini paket
Route::post('paket', [PaketController::class, 'insert']);
Route::put('paket/{id}', [PaketController::class, 'update']);
Route::delete('paket/{id}', [PaketController::class, 'delete']);

