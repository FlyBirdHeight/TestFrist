<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>bootstrap</title>
    <link rel="stylesheet" href="{{asset('public/style/css/bootstrap.min.css')}}">
    <style>
        body{
            padding-top: 50px;
        }
        .starter{
            padding: 40px 15px;
            text-align: center;
        }
        .height{
            margin-top: 8px;
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
                <li class="active"><a href="#">首页</a></li>
                <li><a href="{{url('admin/Communication')}}">交流区</a></li>
                <li><a href="#">等待启用</a></li>
            </ul>
            @if(session('user'))
                    <div class="dropdown navbar-right height">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                            欢迎{{session('user')->name}}({{session('user')->user}})
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownmenu1">
                            <li><a href="{{url('admin/personinformation')}}" role="menuitem">个人信息</a></li>
                            <li><a href="{{url('admin/quit')}}" role="menuitem">注销</a></li>
                        </ul>
                    </div>
            @else
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{url('admin/zhuche')}}">注册</a></li>
                        <li><a href="{{url('admin/denglu')}}">登陆</a></li>
                    </ul>
            @endif
        </div>
    </div>
</nav>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="carousel slide" id="carousel-915580">
                <ol class="carousel-indicators">
                    <li data-slide-to="0" data-target="#carousel-915580">
                    </li>
                    <li data-slide-to="1" data-target="#carousel-915580">
                    </li>
                    <li data-slide-to="2" data-target="#carousel-915580" class="active">
                    </li>
                </ol>
                <div class="carousel-inner">
                    <div class="item">
                        <img alt=""  src="/blog/public/style/img/1.png" />
                    </div>
                    <div class="item">
                        <img alt=""  src="/blog/public/style/img/2.jpg" />
                    </div>
                    <div class="item active">
                        <img alt="" src="/blog/public/style/img/3.jpg" />
                    </div>
                </div> <a class="left carousel-control" href="#carousel-915580" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-915580" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="starter">
        <h1>Bootstrap starter template</h1>
        <p class="lead">李景秋制作</p>
        <p class="lead">一脸日了狗的感觉</p>
    </div>
</div>


<script src="{{asset('public/style/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('public/style/js/bootstrap.min.js')}}"></script>
</body>
</html>