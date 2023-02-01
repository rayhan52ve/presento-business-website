<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendController::class,'index'])->name('front.home');

Route::get('todo',[TodoController::class,'index'])->name('todo.index');

