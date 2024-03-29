<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Backend\TagController;
use App\Http\Controllers\Backend\EventController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Support\Facades\Route;


//Frontend
Route::get('/',[FrontendController::class,'index'])->name('front.home');
Route::get('/blog',[FrontendController::class,'blog'])->name('front.blog');
Route::get('/single-blog',[FrontendController::class,'singleBlog'])->name('front.singleBlog');
Route::get('/portfolio-details',[FrontendController::class,'portfolioDetails'])->name('front.portfolioDetails');
//Frontend

//Auth
Route::match(['get','post'],'userlogin',[UserController::class,'login'])->name('login');
Route::match(['get','post'],'register',[UserController::class,'register'])->name('register');

Route::group(['middleware' => ['auth'],'prefix'=>'admin'],function(){
    //Backend Routes
    Route::get('/dashboard',[BackendController::class,'index'])->name('dashboard');
    Route::get('/profile',[BackendController::class,'profile'])->name('profile');
    Route::get('logout', [UserController::class,'logout'])->name('logout');


    // Route::get('event/create',[EventController::class,'create'])->name('event.create');
    // Route::post('event',[EventController::class,'store'])->name('event.store');
    // Route::get('event',[EventController::class,'index'])->name('event.index');
    // Route::get('event/{id}',[EventController::class,'show'])->name('event.show');
    // Route::get('event/{event}/edit',[EventController::class,'edit'])->name('event.edit');
    // Route::put('event/{id}',[EventController::class,'update'])->name('event.update');
    // Route::post('event/{id}',[EventController::class,'destroy'])->name('event.destroy');


    Route::get('event/create',[EventController::class,'create'])->name('event.create')->middleware('admin');
    Route::resource('event',EventController::class)->except('create');
    Route::resource('user',UserController::class)->only(['index','show'])->middleware('admin');
    Route::resource('category',CategoryController::class);
    Route::resource('sub-category',SubCategoryController::class);
    Route::get('get-subcategory/{id}',[SubCategoryController::class,'getSubCategoryByCategory']);
    Route::resource('tag',TagController::class);
    Route::resource('post',PostController::class);

});


