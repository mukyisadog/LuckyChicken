<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarpoolController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SendJoinNoticeMailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FeelController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\IndexController;



Route::get('/carpool',[CarpoolController::class, 'cplist'])->name('cphome');
Route::view('/carpool/form','carpool.cpform')->name('cpform');
Route::post('/carpool/form', [CarpoolController::class, 'create']);
Route::get('/carpool/info/{cpid}',[CarpoolController::class, 'showinfo'])->name('cpinfo');
Route::post('/carpool/info/{cpid}', [CarpoolController::class, 'join']);

require __DIR__.'/auth.php';