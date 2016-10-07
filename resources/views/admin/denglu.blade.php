<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>登录</title>
    <link rel="stylesheet" href="{{asset('public/style/css/bootstrap.min.css')}}">
    <style>
        .changdu{
            width: 300px;
        }
        .kuang{
            width: 450px;
            height: 400px;
            background: #edeff1;
            margin:auto auto;
            padding-top: 20px;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="kuang">
    <form class="form-horizontal" role="form" action="" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <div style="color: red; text-align: center">
                {{session('msg')}}
            </div>
            <label class="col-sm-2 control-label">账号</label>
            <div class="col-sm-10">
                <input type="text" class="form-control changdu" placeholder="user" name="user">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="password" class="form-control changdu" placeholder="password" name="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox">记住账号(未实现)
                    </label>
                    <label>
                        <input type="checkbox">记住密码(未实现)
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="submit" class="btn changdu btn-info">登录</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>