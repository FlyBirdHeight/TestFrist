
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>个人信息</title>
    <link rel="stylesheet" href="{{asset('public/style/css/bootstrap.min.css')}}">
    <style>
        .changdu{
            width: 300px;
        }
        .changdu1{
            width: 110px;
        }
        .weizhi{
            float: left;
        }
        .weizhi1{
            margin-left: 30px;
            padding-left: 70px;
        }
        .kuang{
            width: 450px;
            height: 700px;
            background: #edeff1;
            margin:0px auto;
            padding-top: 20px;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
        }
        .wenzi{
            text-align: center;
        }
    </style>
</head>
<body>
<div class="kuang">
    <h1 class="wenzi">个人信息表</h1>
    {{csrf_field()}}
    <form role="form" class="form-horizontal text-align-center">
        <div class="form-group">
            <label class="col-sm-2 control-label">姓名:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control changdu" value="{{session('user')->name}}" disabled>
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">年龄:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control changdu" value="{{session('user')->age}}" disabled>
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">性别:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control changdu" value="{{session('user')->sex}}" disabled>
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">生日:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control changdu" value="{{session('user')->birthday}}" disabled>
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">手机号:</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control changdu" value="{{session('user')->phonenumber}}" disabled>
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">邮箱:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control changdu" value="{{session('user')->email}}" disabled>
            </div>
        </div><br>
        <div class="form-group weizhi weizhi1">
            <div class="col-sm-5 col-sm-offset-1">
                <button class="btn btn-info changdu1"><a href="{{url('admin/edituser')}}">修改个人信息</a></button>
            </div>
        </div>
        <div class="form-group weizhi weizhi1">
            <div class="col-sm-5 col-sm-offset-1">
                <button class="btn btn-info changdu1"><a href="{{url('admin/index')}}">返回首页</a></button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

