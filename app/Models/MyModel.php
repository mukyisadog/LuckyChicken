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
        $datas = DB::select("select * from feelinfo left join user on feelinfo.authorId = user.uid order by publishD");
        return $datas;
    }
    function feelDetail($id){
        $datas = DB::select("select * from feelinfo left join user on feelinfo.authorId = user.uid where feelinfo.id = ?",[$id]);
        return $datas;
    }
    function feelComment($id){
        $comments = DB::select("select * from feelComment left join feelinfo on feelComment.ftid = feelinfo.id left join user on feelComment.uid = user.uid where feelComment.ftid = ?",[$id]);
        return $comments;
    }

    function feelCom($ftid,$uid,$feelcom){
        DB::insert("INSERT INTO `feelComment` SET ftid = ?, uid = ?, fc = ? ",[$ftid,$uid,$feelcom]);
        $answer = "ok";
        return $answer;
    }

    function feelMes($uid,$title,$content,$pic){
        DB::insert("INSERT INTO `feelinfo` SET authorId = ?, title = ?, content = ?,pic = ?",[$uid, $title, $content,$pic]);
        $answer = "ok";
        return $answer;
    }

    // 論壇

    function question(){
        $questions = DB::select("select * from foruminfo left join user on foruminfo.authorId = user.uid where foruminfo.sid = 1 order by publishD");
        return $questions;
    }

    function group(){
        $groups = DB::select("select * from foruminfo left join user on foruminfo.authorId = user.uid where foruminfo.sid = 2 order by publishD");
        return $groups;
    }

    function hater(){
        $haters = DB::select("select * from foruminfo left join user on foruminfo.authorId = user.uid where foruminfo.sid = 3 order by publishD");
        return $haters;
    }

    function forumDetail($sid,$id){
        $datas = DB::select("select * from foruminfo left join user on foruminfo.authorId = user.uid where foruminfo.sid = ? and foruminfo.id = ? ",[$sid, $id]);
        return $datas;
    }

    function FCquestion($sid,$id){
        $FCquestions = DB::select("SELECT * FROM `FCquestion` left join user on FCquestion.uid = user.uid where sid = ? and ftid = ?",[$sid,$id]);
        return $FCquestions;
    }

    function forumNew($sid){
        $forumNews = DB::select("select * from foruminfo left join user on foruminfo.authorId = user.uid where foruminfo.sid = ? order by publishD",[$sid]);
        return $forumNews;
    }

    function forumNew2(){
        $forumNew2s = DB::select("select * from foruminfo left join user on foruminfo.authorId = user.uid order by publishD");
        return $forumNew2s;
    }
    
    function forumMes($sid,$uid,$title,$content,$pic){
        
        // print_r('sid:' . $sid);
        // print('uid' . $uid);
        // print('title' . $title);
        // print('content' . $content);
        // print('pic' . $pic);
        // print('sid:' . $sid);
        // die();
        DB::insert("INSERT INTO `foruminfo` SET sid = ?, authorId = ?, title = ?, content = ?, pic = ?",[$sid, $uid, $title, $content, $pic]);
        $answer = "ok";
        return $answer;
        
    }


    
}
