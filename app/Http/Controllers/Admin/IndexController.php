<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class Indexcontroller extends CommentController
{
    public function index(){
        return  view('admin.index');
    }
    
    public function edit(){
        return view('admin.personinformation');
    }

    public function quit(){
        session(['user'=>null]);
        return redirect('admin/index');
    }

    //个人信息修改
    public function store(){
        if ($input = Input::except('_token')){
            $re = User::where('user',session('user')->user)->update($input);
            $res = session('user')->user;
            $user = DB::table('user')->where('user',$res)->first();
            session(['user'=>null]);
            session(['user'=>$user]);
            if($re==1){
                return redirect('admin/personinformation');
            }else{
                return back()->with('errors','信息更新失败，请稍后重试！');
            }
        }else{
            return view('admin.edituser');
        }
    }

    public function create(){
        return view('admin.zhuche');
    }

    //注册信息
    public function add()
    {
        $input = Input::except('_token');
        $rules = [
            'user'=>'required',
            'password'=>'required|between:6,20',
            'name'=>'required'
        ];

        $message = [
            'user.required'=>'账号不能为空！',
            'password.required'=>'密码不能为空!',
            'password.between'=>'密码必须在6-20位之间!',
            'name.required'=>'姓名不能为空!',
        ];
        $vailedator = Validator::make($input,$rules,$message);
        if ($vailedator->passes()){
            $re = User::create($input);
            if($re){
                return redirect('admin/denglu');
            }else{
                return back()->with('errors','注册失败，请稍后重试！');
            }
        }else{
            return back()->withErrors($vailedator);
        }
    }
    
}
