<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>交流</title>
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
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    {{csrf_field()}}
    <div class="container">
        <div class="navbar-header">
            <a href="#" class="navbar-brand">Project Name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{url("admin/index")}}">首页</a></li>
                <li class="active"><a href="#">交流区</a></li>
                <li><a href="#">等待启用</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container" style="margin-top: 45px; ">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <nav class="navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="{{url('admin/Communication')}}">交流区</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @foreach($data2 as $d)
                            <li class="dropdown">
                                @if($d->cate_pid==0)
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$d->cate_name}}<strong class="caret"></strong></a>
                                @endif
                                <ul class="dropdown-menu">
                                    @foreach($data2 as $c)
                                        @if($c->cate_pid == $d->cate_id )
                                            <li>
                                                <a href="{{url('admin/change/'.$c->cate_id)}}">{{$c->cate_name}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">个人信息<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{url('admin/useradd')}}">自己的帖子</a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="{{url('admin/personinformation')}}">个人信息</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/index')}}">返回首页</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            @foreach($data as $v)
                <div class="row clearfix tiezi">
                    <div class="col-md-12 column">
                        <h3>
                            {{$v->art_title}}{{session(['artisan'])}}
                        </h3>
                        <h4>
                            {{$v->art_miaoshu}}
                        </h4>
                        <h5>
                            作者：
                            @foreach($data1 as $c)
                                @if($v->user == $c->user)
                                    {{$c->name}}
                                @endif
                            @endforeach
                            <br>
                            发布时间：
                            {{$v->art_time}}
                        </h5>
                        <div class="col-xs-7"></div>
                        <div class="col-xs-2" style="float: inherit">
                            <button class="btn btn-default">
                                <a href="{{url('admin/visitor/'.$v->art_id)}}">查看详情</a>
                            </button>
                        </div>
                        <div class="col-xs-2" style="float: inherit">
                            <input class="btn btn-default" type="button" value="FUCK">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<script src="{{asset('public/style/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('public/style/js/bootstrap.min.js')}}"></script>
</body>
</html>