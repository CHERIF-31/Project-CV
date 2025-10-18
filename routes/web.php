<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CvController;
use App\Http\Controllers\EntrpriseController;
use App\Http\Controllers\CvsController;

Route::get('/', function () {
    return view('welcome');
});



Route::resource('/cvs',CvController::class);

Route::resource('/entreprise',EntrpriseController::class);

Route::get('/listcv',[CvsController::class,'index_all'])->name('listcv');
Route::get('/listentreprise',[EntrpriseController::class,'index_all'])->name('listentreprise');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
