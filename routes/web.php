<?php

use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('/tin/them', [NewsController::class, 'create'])->name('news.create');
Route::post('/tin/them', [NewsController::class, 'store'])->name('news.store');

Route::get('/tin/chi-tiet/{id}', [NewsController::class, 'show'])->name('news.show');

Route::get('/tin/sua/{id}', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/tin/sua/{id}', [NewsController::class, 'update'])->name('news.update');

Route::delete('/tin/xoa/{id}', [NewsController::class, 'destroy'])->name('news.destroy');