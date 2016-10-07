<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
    //图片上传
    public function upload()
    {
        $file = Input::file('Filedata');
        if ($file -> isValid()){
            $realPath = $file -> getRealPath(); //临时文件的绝对路径
            $entension = $file ->getClientOriginalExtension(); //上传文件的后缀
            $newName = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path = $file ->move(base_path().'/uploads',$newName);
            $filepath = 'uploads/'.$newName;
            return $filepath;
        }
    }
}
