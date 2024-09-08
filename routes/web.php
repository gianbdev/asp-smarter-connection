<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\System\ClaimController;

Route::get('/', [ClaimController::class, 'showForm'])->name('reclamos.form');
Route::post('/reclamos', [ClaimController::class, 'store'])->name('reclamos.store');
