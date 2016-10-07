<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use App\Http\Model\User_artisan;
use App\Http\Model\User_jiaoliu;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class VisitorController extends CommentController
{
    public function index($art_id){
        $data = User_artisan::find($art_id);
        $data1 = DB::table('users_jiaoliu')->where('art_id',$art_id)->get();
        return view('admin.visitor.Viewdetails',compact('data','data1'));
    }

    public function inter($art_id){
        $input = Input::all();
        $aaa = User_artisan::find($art_id);
        $input['link_newusername']= session('user')->name;
        $input['art_id'] = $art_id;
        $input['link_olduser'] = $aaa->user;
        $input['link_newuser'] = session('user')->user;
        $input['link_time'] = date("Y年m月d日 H时i分s秒");
        $links = User_jiaoliu::create($input);
        return back();
    }

}
