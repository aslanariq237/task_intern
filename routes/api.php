<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    ProductController
};

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/product', [ProductController::class, 'index'])->name('tampil.product');
Route::post('/add-product', [ProductController::class, 'create'])->name('tambah.product');
Route::get('/tampil/{id}', [ProductController::class, 'tampil'])->name('tmapil');
Route::post('/edit-product/{id}', [ProductController::class, 'editan'])->name('edit.product');
Route::delete('/delete-product/{id}', [ProductController::class, 'hapus'])->name('delete.product');
Route::post('/add-fibbon', [ProductController::class, 'fibbonaci'])->name('fibbon');

Route::post('/login', [UserController::class, 'Login']);
Route::post('/reg', [UserController::class, 'createUser']);
Route::get('/user', [UserController::class, 'index']);