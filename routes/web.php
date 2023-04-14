<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\MyModel;
use App\Http\Controllers\FeelController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\IndexController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// 首頁
Route::get('/',[IndexController::class,'Index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 心得
Route::get('/feelDetail/{id}',[FeelController::class,'feelDetail']);

Route::get('/feelIndex', [FeelController::class,'feelIndex']);

Route::get('/feelMessage/{uid}', function ($uid) {
    $myModel = new MyModel();
    $userPic = $myModel->UserPic($uid);
    return view('feelMessage',[
                'uid' => $uid,
                'userPic' => $userPic
            ]);
});

Route::post('/feelCom/{ftid}/{uid}',[FeelController::class,'feelCom']);

Route::post('feelMes/{uid}', [FeelController::class,'feelMes']);

Route::get('/feelSaved/{uid}/{ftid}',[FeelController::class,'feelSaved']);

Route::get('/feelUnsaved/{uid}/{ftid}',[FeelController::class,'feelUnsaved']);

// Route::post('feelMesSaved/{uid}', [FeelController::class,'feelMesSaved']);



// 論壇
Route::get('/forumIndex',[ForumController::class,'forumIndex']);

Route::get('/forumDetail/{sfid}/{foid}', [ForumController::class,'forumDetail']);

Route::get('/forumMessage/{uid}', function ($uid) {
    $myModel = new MyModel();
    $userPic = $myModel->UserPic($uid);
    return view('forumMessage',[
        'uid' => $uid,
        'userPic' => $userPic
    ]);
});

Route::post('/forumCom/{sfid}/{foid}/{uid}',[ForumController::class,'forumCom']);

Route::post('/forumMes/{uid}', [ForumController::class,'forumMes']);

Route::get('/forumSaved/{sfid}/{uid}/{ftid}', [ForumController::class,'forumSaved']);

Route::get('/forumUnsaved/{sfid}/{uid}/{ftid}',[ForumController::class,'forumUnsaved']);

// Route::post('/forumMesSaved/{uid}', [ForumController::class,'forumMesSaved']);


require __DIR__.'/auth.php';
