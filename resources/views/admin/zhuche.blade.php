<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="{{asset('public/style/css/bootstrap.min.css')}}">
    <style>
        .changdu{
            width: 300px;
        }

        .kuang{
            width: 600px;
            height: auto;
            background: #edeff1;
            margin:0 auto;
            padding: 20px;
            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 50px;
        }
    </style>
</head>
<body>
<div class="kuang">
    <form role="form" class="form-horizontal text-align-center" action="{{url('admin/add')}}" method="post">
        {{csrf_field()}}
        <div style="margin-left: 73px">
            @if(count($errors)>0)
                <div style="color: red;text-align: center;font-size: 20px">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            {{$error}}<br/>
                        @endforeach
                    @else
                        {{$errors}}
                    @endif
                </div>
            @endif
            <div class="form-group">
                <label class="col-sm-2 control-label">账号:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control changdu" placeholder="user" name="user">
                </div>
            </div><br>
            <div class="form-group">
                <label class="col-sm-2 control-label">密码:</label>
                <div class="col-sm-7">
                    <input type="password" class="form-control changdu" placeholder="password" name="password">
                </div>
                <div class="col-sm-3" style="color: red">
                    密码在6-20为之间!
                </div>
            </div><br>
            <div class="form-group">
                <label class="col-sm-2 control-label">姓名:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control changdu" placeholder="name" name="name">
                </div>
            </div><br>
            <div class="form-group">
                <label class="col-sm-2 control-label">年龄:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control changdu" placeholder="age" name="age">
                </div>
            </div><br>
            <div class="form-group">
                <label class="col-sm-2 control-label">性别:</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control changdu" placeholder="男/女" name="sex">
                </div>
            </div><br>
            <div class="form-group">
                <label class="col-sm-2 control-label">生日:</label>
                <div class="col-sm-9">
                    <input type="date" class="form-control changdu" placeholder="date" name="birthday">
                </div>
            </div><br>
            <div class="form-group">
                <label class="col-sm-2 control-label">手机号:</label>
                <div class="col-sm-9">
                    <input type="tel" class="form-control changdu" placeholder="phonenumber" name="phonenumber">
                </div>
            </div><br>
            <div class="form-group">
                <label class="col-sm-2 control-label">邮箱:</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control changdu" placeholder="xxx@xx.com" name="email">
                </div>
            </div><br>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button class="btn btn-default changdu btn-info">提交注册</button>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>