<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


use App\Http\Controllers\JournalController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/journals', [JournalController::class, 'index']);  // Lấy tất cả nhật ký
Route::post('/journals', [JournalController::class, 'store']);  // Tạo nhật ký mới
Route::get('/journals/{id}', [JournalController::class, 'show']);  // Lấy 1 nhật ký theo id

