<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\SubscriptionController;



// Route::get('/', 'HomeController@HomeIndex');
// Route::get('/',[HomeController::class,'HomeIndex']);

// Route::get('/visitor', 'VisitorController@VisitorIndex');
Route::get('/visitor',[VisitorController::class,'VisitorIndex']);
Route::get('/service',[ServiceController::class,'ServiceIndex']);
Route::get('/getServicesData',[ServiceController::class,'getServiceData']);
Route::post('/ServiceDelete',[ServiceController::class,'ServiceDelete']);
Route::post('/add-product',[ProductController::class,'addProduct']);
Route::post('/add-package',[PackageController::class,'addPackage']);
Route::post('/add-subscriptions',[SubscriptionController::class,'addSubscriptions']);
Route::get('/get-packages/{productId}',[PackageController::class,'getPackages']);
Route::get('/',[ProductController::class,'index']);
Route::get('/get-price/{packageId}', [PackageController::class,'getPrice']);
