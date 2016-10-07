<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Diyici;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class LoginController extends CommentController
{
    public function login(){
        if($input = Input::except('_token')) {
            $user = DB::table('user')->where('user',$input['user'])->first();
            if($user != null && $user->password == $input['password']){
                session(['user'=>$user]);
                return redirect('admin/index');
            }else {
                $data = "用户名或密码错误！";
                return back()->with('msg',$data);
            }
        }else{
            return view('admin.denglu');
        }
    }

    public function xxx()
    {
        return view('admin.xxx');
    }

}
