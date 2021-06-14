<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home']);
Route::get('medical', [PageController::class, 'medical'])->name('medical.reports');
Route::get('dermanova', [PageController::class, 'dermanova'])->name('dermanova.reports');

Route::resource('medical/clients', ClientController::class);
Route::resource('medical/certificates', TestController::class);

Route::get('medical/certificates/{test}/report', [TestController::class, 'generatePdf'])->name('certificates.pdf');