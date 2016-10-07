<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>查看自己的帖子</title>
    <link rel="stylesheet" href="{{asset('public/style/css/bootstrap.min.css')}}">
    <style>
        .tiezi{
            padding: 5px;
            border: 1px solid #cccccc;
            box-shadow: 0 0 5px #ccc;
            border-radius: 5px;
            margin-bottom: 30px;
        }
    </style>
    <script type="text/javascript" src="{{asset('public/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/org/layer/layer/layer.js')}}"></script>
</head>
<body>
<div class="container">
    {{csrf_field()}}
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="page-header">
                <h1>
                    快看自己发表的帖子 <small>在这里查看你所发表的帖子，与大家交流起来</small>
                </h1>
            </div>
            @if($re == null)
                <div class="jumbotron">
                    <h1>
                        Hello, {{session('user')->name}}({{session('user')->user}})!
                    </h1>
                    <p>
                        你还没有上传过帖子，还在等待什么，快去发表自己的帖子吧！
                    </p>
                    <p>
                        <a class="btn btn-primary btn-large" href="{{url('admin/useradd/create')}}">添加帖子</a>
                        <a class="btn btn-primary btn-large" href="{{url('admin/Communication')}}">返回交流区</a>
                    </p>
                </div>
            @else
                @foreach($re as $v)
                    <div class="row clearfix tiezi">
                        <div class="col-md-12 column">
                            <h3>
                                {{$v->art_title}}
                            </h3>
                            <p>
                                {{$v->art_miaoshu}}
                            </p>
                            <div class="col-xs-7"></div>
                            <div class="col-xs-2" style="float: inherit">
                                <button class="btn btn-default">
                                    <a href="{{url('admin/visitor/'.$v->art_id)}}">查看详情</a>
                                </button>
                            </div>
                            <div class="col-xs-2" style="float: inherit">
                                <button class="btn btn-default">
                                    <a href="javascript:;" onclick="delArt({{$v->art_id}})">删除帖子</a>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                <p>
                    <a class="btn btn-primary btn-large" href="{{url('admin/useradd/create')}}">添加帖子</a>
                    <a class="btn btn-primary btn-large" href="{{url('admin/Communication')}}">返回交流区</a>
                </p>
            @endif
        </div>
    </div>
</div>

<script>
    function delArt(art_id) {
        layer.confirm('您确定要删除这篇文章吗？', {
            btn: ['确定','取消'] //按钮
        }, function(){
            $.post("{{url('admin/useradd/')}}/"+art_id,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                if(data.status==0){
                    location.href = location.href;
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
//            layer.msg('的确很重要', {icon: 1});
        }, function(){

        });
    }
</script>
</body>
</html>