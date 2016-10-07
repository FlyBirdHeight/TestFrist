
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>修改个人信息</title>
    <link rel="stylesheet" href="{{asset('public/style/css/bootstrap.min.css')}}">
    <style>
        .changdu{
            width: 300px;
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
    <h1 class="wenzi">个人信息修改</h1>
    <form role="form" class="form-horizontal text-align-center" action="#" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div style="color: red; text-align: center">
                {{session('errors')}}
            </div>
            <label class="col-sm-2 control-label">姓名:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control changdu" value="{{session('user')->name}}" name="name">
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">年龄:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control changdu" value="{{session('user')->age}}" name="age">
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">性别:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control changdu" value="{{session('user')->sex}}" name="sex">
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">生日:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control changdu" value="{{session('user')->birthday}}" name="birthday">
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">手机号:</label>
            <div class="col-sm-10">
                <input type="tel" class="form-control changdu" value="{{session('user')->phonenumber}}" name="phonenumber">
            </div>
        </div><br>
        <div class="form-group">
            <label class="col-sm-2 control-label">邮箱:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control changdu" value="{{session('user')->email}}" name="email">
            </div>
        </div><br>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button class="btn btn-success changdu">确认修改</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>

