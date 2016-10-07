<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Category;
use App\Http\Model\User;
use App\Http\Model\User_artisan;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class UseraddController extends CommentController
{
    //get.admin/useradd 查看自己贴子
    function index(){
        $re = DB::table('user_artisan')->where('user',session('user')->user)->get();
        return view('admin.userarticle.index',compact('re'));
    }
    //get.admin/useradd/create 创建自己的帖子
    public function create(){
        $data = (new Category())->tree();
        return view('admin.userarticle.add',compact('data'));
    }

    //get./admin/useradd/{useradd}
    public function show(){

    }
    //post.admin/useradd    添加帖子
    public function store()
    {
        $input = Input::except('_token');
        $input['user'] = session('user')->user;
        $input['art_time'] = date("Y年m月d日 H时i分s秒");
//        dd($input);
        $rules = [
            'cate_id' => 'required',
            'art_title' => 'required',
            'art_miaoshu' => 'required',
            'art_test' => 'required',
        ];
        $message = [
            'cate_id.required' => '帖子分类不能为空!',
            'art_title.required' => '帖子标题不能为空!',
            'art_miaoshu.required' => '帖子描述不能为空!',
            'art_test.required' => '帖子内容不能为空',
        ];
        $valiedator = Validator::make($input, $rules, $message);
        if ($valiedator->passes()) {
            $re = User_artisan::create($input);
            $res = User_artisan::where('user',session('user')->user)->get();
            if ($re) {
                return redirect('admin/useradd');
            } else {
                return back()->with('errors', '文章添加失败，请稍后重试！');
            }
        } else{
            return back()->withErrors($valiedator);
        }
    }

    //delete.admin/useradd/{useradd}
    public function destroy($art_id){
        $re = User_artisan::where('art_id',$art_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '帖子删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '帖子删除失败，请稍后重试！',
            ];
        }
        return $data;
    }
}
