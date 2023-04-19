<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarpoolController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SendJoinNoticeMailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FeelController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\IndexController;


// 心得
Route::get('/feelDetail/{id}',[FeelController::class,'feelDetail'])->name('fedetail');

Route::get('/feelIndex', [FeelController::class,'feelIndex'])->name('feindex');

Route::get('/feelMessage', [FeelController::class,'getuserpic'])->name('femes');

Route::post('/feelCom/{ftid}',[FeelController::class,'feelCom'])->name('feelcom');

Route::post('feelMes', [FeelController::class,'feelMes'])->name('feelmes');

Route::get('/feelSaved/{ftid}',[FeelController::class,'feelSaved'])->name('fesave');

Route::get('/feelUnsaved/{ftid}',[FeelController::class,'feelUnsaved'])->name('feunsave');

// Route::post('feelMesSaved/{uid}', [FeelController::class,'feelMesSaved']);


