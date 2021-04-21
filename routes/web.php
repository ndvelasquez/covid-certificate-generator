<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home']);
Route::get('medical', [PageController::class, 'medical'])->name('medical.reports');
Route::get('dermanova', [PageController::class, 'dermanova'])->name('dermanova.reports');

Route::post('medical/reports', [UserController::class, 'generateBspPdf'])->name('bspReports.pdf');
Route::post('dermanova/reports', [UserController::class, 'generateNovadermPdf'])->name('novadermReports.pdf');