<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\CarpoolController;


// 首頁
Route::get('/',[IndexController::class,'Index'])->name('home');
Route::get('/weather',[IndexController::class,'getweather']);


Route::middleware('auth')->group(function () {
    Route::get('/notice', [CarpoolController::class, 'cpjoinNotice'])->name('notice');
});


// 測試聊天機器人
Route::post('/chatbot', 'ChatbotController@handle');


require __DIR__.'/auth.php';
