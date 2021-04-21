<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home']);
Route::get('medical', [PageController::class, 'medical'])->name('medical.reports');
Route::get('dermanova', [PageController::class, 'medical'])->name('dermanova.reports');

Route::post('reports-generator', [UserController::class, 'generatePdf'])->name('users.pdf');