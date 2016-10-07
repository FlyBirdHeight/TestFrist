<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Category;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommentController
{
    //post.admin/article    添加文章
    public function store()
    {
        $input = Input::except('_token');
        $input['art_time'] = time();
        $rules = [
            'cate_id' => 'required',
            'art_title' => 'required',
            'art_editor' => 'required',
            'art_content' => 'required',
        ];
        $message = [
            'cate_id.required' => '文章分类不能为空!',
            'art_title.required' => '文章标题不能为空!',
            'art_editor.required' => '文章作者不能为空!',
            'art_content.required' => '文章内容不能为空',
        ];
        $valiedator = Validator::make($input, $rules, $message);
        if ($valiedator->passes()) {
            $re = Article::create($input);
            if ($re) {
                return redirect('admin/article');
            } else {
                return back()->with('errors', '文章添加失败，请稍后重试！');
            }
        } else{
            return back()->withErrors($valiedator);
        }
    }
    
    //get.admin/article 全部文章列表
    public function index(){
        $data = Article::orderBy('art_id','desc')->paginate(10);
//        $data = Article::orderBy('art_id','desc')->all();
        return view('admin.article.index',compact('data'));
    }

    //get.admin/article/create
    public function create(){
        $data = (new Category())->tree();
        return view('admin.article.add',compact('data'));
    }

    //get./admin/article/{article}
    public function show(){
        
    }

    //delete.admin/artisan/{artisan}
    public function destroy($art_id){
        $re = Article::where('art_id',$art_id)->delete();
        if($re){
            $data = [
                'status' => 0,
                'msg' => '文章删除成功！',
            ];
        }else{
            $data = [
                'status' => 1,
                'msg' => '文章删除失败，请稍后重试！',
            ];
        }
        return $data;
    }

    //put.admin/artisan/{artisan}
    public function update($art_id){
        $input = Input::except('_token','_method');
        $re = Article::where('art_id',$art_id)->update($input);
        if($re){
            return redirect('admin/article');
        }else{
            return back()->with('errors','分类信息更新失败，请稍后重试！');
        }
    }

    //get.admin/artisan/{article}/edit  编辑文章
    public function edit($art_id){
        $data = (new Category())->tree();
        $field = Article::find($art_id);
        return view('admin.article.edit',compact('data','field'));
    }
}
