<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class FeelController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new MyModel;
    }
    public function feelIndex(Request $request)
    {
        $datas = $this->model->feelIndex();
        $uid = Auth::id();
        $search = $request->search;
        $outputs = $this->model->feelSearch($search);
        $userPic = $this->model->UserPic($uid);
        return view('feel.feelIndex', [
            'datas' => $datas,
            'uid' => $uid,
            'outputs' => $outputs,
            'userPic' => $userPic
        ]);
    }

    public function feelDetail(Request $request)
    {
        $ftid = $request->id;
        $article = $this->model->feelDetail($ftid);
        $datas = $this->model->feelnew($ftid);
        $comments = $this->model->feelComment($ftid);
        $uid = Auth::id();
        $userDatas = $this->model->feelComPN($uid);
        $userPic = $this->model->UserPic($uid);
        return view('feel.feelDetail', [
            'article' => $article,
            'datas' => $datas,
            'comments' => $comments,
            'userDatas' => $userDatas,
            'uid' => $uid,
            'ftid' => $ftid,
            'userPic' => $userPic
        ]);
    }

    public function feelCom(Request $request)
    {
        $uid = Auth::id();
        $ftid = $request->ftid;
        $feelcom = $request->feelcom;
        $this->model->feelCom($ftid, $uid, $feelcom);
        // return "ok";
        return redirect("/feelDetail/{$ftid}");
    }

    public function feelMes(Request $request)
    {
        $uid = Auth::id();
        $title = $request->title;
        $content = $request->content;

        // 從請求中獲取文件實例
        $file = $request->file('pic');
        // 獲取文件的二進制內容
        $pic = $file->get();
        if ($request->hasFile('pic')) {
            $file = $request->file('pic');
            $pic = $file->get();
            $mime_type = $file->getMimeType();
            $src = 'data:' . $mime_type . ';base64,' . base64_encode($pic);
        } else {
            $src = null;
        }
        $state = $request->input('btValue');

        $answer = $this->model->feelMes($uid, $title, $content, $src, $state);
        // return redirect("/feelIndex");

        if($answer === 0){
            // return redirect()->back()->with(['answer' => $answer]);
            $request->session()->flash('answer', $answer);
            return redirect()->back()->with('answer', $answer);
        }else{
            return redirect("/feelIndex")->with(['answer' => $answer]);
        }
    }

    public function feelSaved(Request $request)
    {
        $uid = Auth::id();
        $ftid = $request->ftid;
        $this->model->feelSaved($uid,$ftid);
        return redirect("/feelDetail/{$ftid}");
        // return $uid;

    }

    public function feelUnsaved(Request $request){
        $uid = $request->uid;
        $ftid = $request->ftid;
        $this->model->feelUnsaved($uid,$ftid);
        return redirect("/feelDetail/{$ftid}");
        // return $uid ;
    }
    public function feelMesSaved(Request $request){
        $uid = $request->uid;      
        $title = $request->title;
        $content = $request->content;
        // 從請求中獲取文件實例
        $file = $request->file('pic');
        // 獲取文件的二進制內容
        $pic = $file->get();
        $this->model->feelMesSaved($uid,$title,$content,$pic);
        return redirect("/feelMessage/{$uid}");
        // return $uid ;
    }

    public function feelMessage(Request $request){
        $uid = $request->uid;
        $userPic = $this->model->UserPic($uid);
        return redirect("/feelMessage/{$uid}")->with([
            'userPic' => $userPic,
            'uid' => $uid
        ]);


    
    }

    public function getuserpic(){
        $uid = Auth::id();
        $myModel = new MyModel();
        $userPic = $myModel->UserPic($uid);
        return view('feel.feelMessage',[
            'uid' => $uid,
            'userPic' => $userPic
        ]);
    }

}