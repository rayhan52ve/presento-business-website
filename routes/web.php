<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/',[FrontendController::class,'index'])->name('front.home');

Route::get('todo',[TodoController::class,'index'])->name('todo.index');

// Route::get('event/create',[EventController::class,'create'])->name('event.create');
// Route::post('event',[EventController::class,'store'])->name('event.store');
// Route::get('event',[EventController::class,'index'])->name('event.index');
// Route::get('event/{id}',[EventController::class,'show'])->name('event.show');
// Route::get('event/{event}/edit',[EventController::class,'edit'])->name('event.edit');
// Route::put('event/{id}',[EventController::class,'update'])->name('event.update');
// Route::post('event/{id}',[EventController::class,'destroy'])->name('event.destroy');

Route::resource('event',EventController::class);



