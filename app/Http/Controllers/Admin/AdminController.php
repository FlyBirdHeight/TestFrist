<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Useradmin;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class AdminController extends CommentController
{
    public function index()
    {
        return view('admin.index1');
    }

    public function info(){
        return view('admin.info');
    }

//    改密码的方法
    public function pass(){
        if ($input = Input::all()){
            $rules = [
                'password'=>'required|between:6,20|confirmed',
            ];
            $message=[
                'password.required'=>'新密码不能为空!',
                'password.between'=>'新密码必须在6-20位之间!',
                'password.confirmed'=>'两次输入密码不相同!',
            ];
            $vailedator = Validator::make($input,$rules,$message);

            if($vailedator->passes()){
                $user = Useradmin::first();
                $_password = Crypt::decrypt($user->password);
                if ($input['password_o']==$_password){
                    $user->password = Crypt::encrypt($input['password']);
                    $user->update();
                    return back()->with('errors','密码修改成功！');
                }else{
                    return back()->with('errors','原密码错误！');
                }
            }else{
                return back()->withErrors($vailedator);
            }
        }else {
            return view('admin.pass');
        }
    }
}
