<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MyModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new MyModel;
    }
    public function forumIndex()
    {
        $forumNew2s = $this->model->forumNew2();
        $questions = $this->model->question();
        $groups = $this->model->group();
        $haters = $this->model->hater();
        
        return view('forumIndex',[
            'forumNew2s' => $forumNew2s,
            'questions' => $questions,
            'groups' => $groups,
            'haters' => $haters
        ]);
    }
    public function forumDetail(Request $request)
    {
        $sfid = $request->sfid;
        $foid = $request->foid;
        $articles = $this->model->forumDetail($sfid,$foid);
        $FCquestions = $this->model->FCquestion($foid);
        $forumNews = $this->model->forumNew($sfid);
        $uid = Auth::id();
        $userDatas = $this->model->feelComPN($uid);
        return view('forumDetail',[
            'articles' => $articles,
            'FCquestions' => $FCquestions,
            'forumNews' => $forumNews,
            'userDatas' => $userDatas,
            'sfid' => $sfid,
            'uid' => $uid,
            'foid'=> $foid
        ]);
    }

    public function forumCom(Request $request){
        $uid = $request->uid;
        $foid = $request->foid;
        $sfid = $request->sfid;
        $forumcom = $request->forumcom;
        $this->model->forumCom($sfid,$foid, $uid, $forumcom);
        return redirect("/forumDetail/{$sfid}/{$foid}");
    }


    public function forumMes(Request $request)
    {
        $uid = $request->uid;
        $title = $request->title;
        $content = $request->content;
        $sid = $request->sid;

        // 從請求中獲取文件實例
        $file = $request->file('pic');
        // 獲取文件的二進制內容
        $pic = $file->get();


        $this->model->forumMes($sid,$uid,$title,$content,$pic);

        return redirect("/forumIndex");
        // return $pic;
    }

}