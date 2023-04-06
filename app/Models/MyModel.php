<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\Environment\Console;    

class MyModel extends Model
{
    use HasFactory;

    // 心得
    function feelIndex(){
        $datas = DB::select("select * from Feel_list left join User on Feel_list.uid = User.uid order by Feel_list.createtime");
        return $datas;
    }
    function feelDetail($id){
        $datas = DB::select("select * from Feel_list left join User on Feel_list.uid = User.uid where Feel_list.fid = ?",[$id]);
        return $datas;
    }
    function feelComment($id){
        $comments = DB::select("select Feel_comment.content as content,upicture,username,title,Feel_comment.createtime from Feel_comment left join Feel_list on Feel_comment.fid = Feel_list.fid left join User on Feel_comment.uid = User.uid where Feel_comment.fid = ?",[$id]);
        return $comments;
    }

    function feelCom($ftid,$uid,$feelcom){
        DB::insert("INSERT INTO `Feel_comment` SET fid = ?, uid = ?, content = ? ",[$ftid,$uid,$feelcom]);
        $answer = "ok";
        return $answer;
    }

    function feelMes($uid,$title,$content,$pic){
        DB::insert("INSERT INTO `Feel_list` SET uid = ?, title = ?, content = ?,picture = ?",[$uid, $title, $content,$pic]);
        $answer = "ok";
        return $answer;
    }

    // 論壇

    function question(){
        $questions = DB::select("select fpicture,foid,title,username,Forum_list.createtime as createtime from Forum_list left join User on Forum_list.uid = User.uid where Forum_list.sfid = 1 order by Forum_list.createtime");
        return $questions;
    }

    function group(){
        $groups = DB::select("select fpicture,foid,title,username,Forum_list.createtime as createtime from Forum_list left join User on Forum_list.uid = User.uid where Forum_list.sfid = 2 order by Forum_list.createtime");
        return $groups;
    }

    function hater(){
        $haters = DB::select("select fpicture,foid,title,username,Forum_list.createtime as createtime from Forum_list left join User on Forum_list.uid = User.uid where Forum_list.sfid = 3 order by Forum_list.createtime");
        return $haters;
    }

    function forumDetail($sid,$id){
        $datas = DB::select("select fpicture,username,title,Forum_list.createtime,upicture,Forum_list.content as content from Forum_list left join User on Forum_list.uid = User.uid where Forum_list.sfid = ? and Forum_list.foid = ? ",[$sid, $id]);
        return $datas;
    }

    function FCquestion($sid,$id){
        $FCquestions = DB::select("SELECT * FROM Forum_comment left join User on Forum_comment.uid = User.uid where sfid = ? and focid = ?",[$sid,$id]);
        return $FCquestions;
    }

    function forumNew($sid){
        $forumNews = DB::select("select * from Forum_list left join User on Forum_list.uid = User.uid where Forum_list.sfid = ? order by Forum_list.createtime",[$sid]);
        return $forumNews;
    }

    function forumNew2(){
        $forumNew2s = DB::select("select * from Forum_list left join User on Forum_list.uid = User.uid order by Forum_list.createtime");
        return $forumNew2s;
    }
    
    function forumMes($sid,$uid,$title,$content,$pic){
        DB::insert("INSERT INTO `foruminfo` SET sid = ?, authorId = ?, title = ?, content = ?, pic = ?",[$sid, $uid, $title, $content, $pic]);
        $answer = "ok";
        return $answer;
        
    }


    
}
