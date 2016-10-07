<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Model\User;
use App\Http\Model\User_artisan;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class CommunicationController extends CommentController
{
    function index(){
        $data = User_artisan::all();
        $data1 = User::all();
        $data2 = (new Category())->tree();
        return view('admin.Communication',compact('data','data1','data2'));
    }
    function change($cate_id){
        $artisan = $cate_id;
        return back()->with('artisan',$artisan);
    }
}
