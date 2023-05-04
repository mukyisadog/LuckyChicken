<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Chat extends Model
{
    use HasFactory;

    function saveContent($content,$state){
        $uid = Auth::id();
        DB::insert("INSERT INTO `chat` SET uid = ?, content = ?, state = ? ",[$uid,$content,$state]);
        return "ok";
    }

    function takeOutContent(){
        $uid = Auth::id();
        $datas =  DB::select("SELECT * FROM `chat` WHERE uid = ?" ,[$uid]);
        return $datas;
    }
}
