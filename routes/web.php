<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('reports-generator', [UserController::class, 'generatePdf'])->name('users.pdf');