<?php

namespace App\Http\Controllers\Admin;
use App\Http\Model\Useradmin;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;

require_once '/xampp/htdocs/blog/public/org/code/Code.class.php';
class UserController extends CommentController
{
    public function login()
    {
        if($input = Input::all()){
            $code = new \Code;
            $_code = $code->get();
            if(strtoupper($input['code'])!=$_code){
                return back()->with('msg','验证码错误！');
            }
            $user = Useradmin::first();
            if ($user->user != $input['user_name'] || Crypt::decrypt($user->password) != $input['user_pass']){
                return back()->with('msg','用户名或密码错误！');
            }
            session(['user'=>$user]);
            return redirect('admin/index1');
        }else{
            return view('admin.login');
        }
    }

    public function code()
    {
        $code = new \Code;
        $code->make();
    }

    public function quit1()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }
}
