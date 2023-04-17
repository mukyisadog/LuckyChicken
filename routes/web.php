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
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CarpoolController;
use App\Http\Controllers\SendJoinNoticeMailController;



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
Route::get('/feelDetail/{id}',[FeelController::class,'feelDetail'])->name('feelDetail');
Route::get('/feelIndex', [FeelController::class,'feelIndex'])->name('feelIndex');
Route::get('/feelMessage/{uid}', function ($uid) {
    $myModel = new MyModel();
    $userPic = $myModel->UserPic($uid);
    return view('feel.feelMessage',[
                'uid' => $uid,
                'userPic' => $userPic
            ]);
})->name('feelMessage');

Route::post('/feelCom/{ftid}/{uid}',[FeelController::class,'feelCom'])->name('feelCom');

Route::post('feelMes/{uid}', [FeelController::class,'feelMes'])->name('feelMes');

Route::get('/feelSaved/{uid}/{ftid}',[FeelController::class,'feelSaved'])->name('feelSaved');

Route::get('/feelUnsaved/{uid}/{ftid}',[FeelController::class,'feelUnsaved'])->name('feelUnsaved');




// 論壇
Route::get('/forumIndex',[ForumController::class,'forumIndex'])->name('forumIndex');

Route::get('/forumDetail/{sfid}/{foid}', [ForumController::class,'forumDetail'])->name('forumDetail');

Route::get('/forumMessage/{uid}', function ($uid) {
    $myModel = new MyModel();
    $userPic = $myModel->UserPic($uid);
    return view('forum.forumMessage',[
        'uid' => $uid,
        'userPic' => $userPic
    ]);
})->name('forumMessage');

Route::post('/forumCom/{sfid}/{foid}/{uid}',[ForumController::class,'forumCom'])->name('forumCom');

Route::post('/forumMes/{uid}', [ForumController::class,'forumMes'])->name('forumMes');

Route::get('/forumSaved/{sfid}/{uid}/{ftid}', [ForumController::class,'forumSaved'])->name('forumSaved');

Route::get('/forumUnsaved/{sfid}/{uid}/{ftid}',[ForumController::class,'forumUnsaved'])->name('forumUnsaved');





// 品薇
Route::get('/carpool',[CarpoolController::class, 'cplist'])->name('cphome');
Route::view('/carpool/form','carpool.cpform')->name('cpform');
Route::post('/carpool/form', [CarpoolController::class, 'create']);
Route::get('/carpool/info/{cpid}',[CarpoolController::class, 'showinfo']);
Route::post('/carpool/info/{cpid}', [CarpoolController::class, 'join']);


// 雯娟


Route::view('/member/info', 'member.member-info');
Route::view('/member/carpool', 'member.carpool');
Route::view('/member/forum', 'member.forum');
Route::view('/member/feel', 'member.feel');
Route::view('/member/save', 'member.save');


require __DIR__.'/auth.php';
