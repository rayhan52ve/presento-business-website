<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//Auth
Route::match(['get','post'],'/',[UserController::class,'login'])->name('login');
Route::match(['get','post'],'register',[UserController::class,'register'])->name('register');

Route::group(['middleware' => ['auth']],function(){
    //Backend Routes
    Route::get('/dashboard',[FrontendController::class,'index'])->name('front.home');
    Route::get('logout', [UserController::class,'logout'])->name('logout');

    Route::get('todo',[TodoController::class,'index'])->name('todo.index');

    Route::get('event/create',[EventController::class,'create'])->name('event.create')->middleware('admin');
    // Route::post('event',[EventController::class,'store'])->name('event.store');
    // Route::get('event',[EventController::class,'index'])->name('event.index');
    // Route::get('event/{id}',[EventController::class,'show'])->name('event.show');
    // Route::get('event/{event}/edit',[EventController::class,'edit'])->name('event.edit');
    // Route::put('event/{id}',[EventController::class,'update'])->name('event.update');
    // Route::post('event/{id}',[EventController::class,'destroy'])->name('event.destroy');

    Route::resource('event',EventController::class)->except('create');
    Route::resource('user',UserController::class)->only(['index','show'])->middleware('admin');

});


