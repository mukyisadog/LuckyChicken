<?php

namespace App\Http\Controllers;

use App\Models\CpList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\RedirectResponse;
use App\Mail\JoinNotice;
use Illuminate\Support\Facades\Mail;

use App\Models\MyModel;

class CarpoolController extends Controller
{


    private $model;
    public function __construct()
    {
        $this->model = new MyModel;
    }


    //發起共乘 cpform
    public function create(Request $req){
        $id = Auth::id();
        $cp = new CpList();
        // $cp->uid = $req->user();
        $cp->uid = $id;
        $cp->cptitle = $req -> title1;
        $cp->value = $req -> radio1;
        $cp->arrive = $req -> arrive1;
        $cp->departdate = $req -> departdate1;
        $cp->returndate = $req -> returndate1;
        $cp->depart = $req -> depart1;
        $cp->original = $req -> original1;
        $cp->hire = $req -> hire1;
        $cp->cost = $req -> cost1;
        $cp->note = $req -> note1;
        // $cp->createtime = $req -> timestamps;
        $cp->save();
        return Redirect::to("/carpool/info/{$cp->cpid}");
    }

    //共乘資訊 cpinfo
    public function showinfo($cpid){
        $cp = CpList::find($cpid);
        $id = Auth::id();
        $uid = DB::table('carpool_list1')->where('cpid',$cpid)
                                         ->value('uid');

        $n = DB::select("select count(*) from carpool_join where cpid = ? and uid = ?",[$cpid, $id]);
        $n1 = $n[0]->{'count(*)'} ;

        $status = DB::table('carpool_join')->where('cpid',$cpid)
                                           ->where('uid',$id)
                                           ->value('status'); 

        $userPic = $this->model->UserPic($uid);

        return view('carpool.cpinfo',[
            'title'=> $cp->cptitle,
            'value'=> $cp->value,
            'arrive'=>$cp->arrive,
            'departdate'=>$cp->departdate,
            'returndate'=>$cp->returndate,
            'depart'=>$cp->depart,
            'original'=>$cp->original,
            'hire'=>$cp->hire,
            'cost'=>$cp->cost,
            'note'=>$cp->note,
            'n1'=> $n1,
            'status'=>$status,
            'uid'=>$uid,
            'id'=>$id,
            'userPic'=>$userPic
        ]);
    }
    // $status = DB::select('select status from carpool_join where cpid = ? and uid = ?',[$cpid,$id]);
    // var_dump($status);
    // array(1) { [0]=> object(stdClass)#337 (1) { ["status"]=> int(0) } }
    

    // 共乘首頁列表
    public function cplist(){
        $cplist = CpList::get();
        // dd($cplist);
        $uid = Auth::id();
        $userPic = $this->model->UserPic($uid);
        return view('carpool.cphome', ['cplist'=>$cplist,
                                        'userPic'=>$userPic]);
    }

    //按下參加，發送email
    public function join($cpid) : RedirectResponse{

        $id = Auth::id();
        DB::insert('insert into carpool_join set cpid = ?, uid = ?, status = ?',[$cpid, $id, 0]);

        $creatoremail = DB::table('carpool_list1')
                      ->leftJoin('users', 'carpool_list1.uid', '=', 'users.id')
                      ->where('cpid',$cpid)
                      ->value('email');


        $join = CpList::findOrFail($cpid);
        Mail::to($creatoremail)->send(new JoinNotice($join));
        // dd($creatoremail);
        return redirect("/carpool/info/{$cpid}");
    }




}