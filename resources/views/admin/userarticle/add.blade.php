<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加帖子</title>
    <link rel="stylesheet" href="{{asset('public/style/css/bootstrap.min.css')}}">
</head>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <form role="form" action="{{url('admin/useradd')}}" method="post">
                {{csrf_field()}}
                @if(count($errors)>0)
                    <div>
                        @if(is_object($errors))
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @else
                            <p>{{$errors}}</p>
                        @endif
                    </div>
                @endif
                <tr>
                    <th width="120">分类：</th>
                    <td>
                        <select name="cate_id">
                            @foreach($data as $d)
                                <option name='cate_id' value="{{$d->cate_id}}">{{$d->_cate_name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <div class="form-group" style="margin-top: 50px">
                    <label for="exampleInputEmail1" >标题</label><input type="text" class="form-control" id="exampleInputEmail1" name="art_title" />
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">帖子描述</label><input type="text" class="form-control" id="exampleInputPassword1" name="art_miaoshu" />
                </div>
                <tr>
                    <th>文章内容：</th>
                    <td>
                        <script type="text/javascript" charset="utf-8" src="{{asset('public/org/ueditor/ueditor.config.js')}}"></script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('public/org/ueditor/ueditor.all.min.js')}}"> </script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('public/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                        <script id="editor" name="art_test" type="text/plain" style="width:1100px;height:500px;" ></script>
                        <script type="text/javascript">
                            var ue = UE.getEditor('editor');
                        </script>
                        <style>
                            .edui-default{line-height: 28px;}
                            div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                            {overflow: hidden; height:20px;}
                            div.edui-box{overflow: hidden; height:22px;}
                        </style>
                    </td>
                </tr>
                <button type="submit" class="btn btn-info" style="margin-top: 30px">创建帖子</button>
                <button type="submit" class="btn btn-info" style="margin-top: 30px;margin-left: 30px"><a href="{{url('admin/useradd')}}">返回自己的帖子页面</a></button>
            </form>
        </div>
    </div>
</div>
<script src="{{asset('public/style/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('public/style/js/bootstrap.min.js')}}"></script>
<script>

</script>
</body>
</html>