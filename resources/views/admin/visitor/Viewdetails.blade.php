<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>帖子交流区</title>
    <link rel="stylesheet" href="{{asset('public/style/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('public/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/org/layer/layer/layer.js')}}"></script>
    <style>
        .tiezi{
            padding: 5px;
            border: 1px solid #cccccc;
            box-shadow: 0 0 5px #ccc;
            border-radius: 5px;
            margin-bottom: 30px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="page-header">
                <h1>
                    {{$data->art_title}} <small>{{$data->art_miaoshu}}</small>
                </h1>
            </div>
            <p>
                {!! $data->art_test !!}
            </p>
        </div>
        <div class="col-xs-8"></div>
        <div class="col-xs-2" style="float: left;margin-top: 100px">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                <a href="#">发表评论</a>
            </button>
            <!-- Modal -->
            <form action="{{url('admin/inter/'.$data->art_id)}}" method="post">
                {{csrf_field()}}
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <h4 class="modal-title" id="myModalLabel">快发表评论吧！</h4>
                            </div>
                            <div class="modal-body">
                                <input type="text" class="form-control" name="link_content">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default" data-dismiss="modal">关闭</button>
                                <button class="btn btn-default">发表</button>
                            </div>
                        </div>
                    </div>
                </div>
                </button>
            </form>
        </div>
        <div class="col-xs-2" style="float: left;margin-top: 100px">
            <button class="btn btn-default">
                <a href="{{url('admin/Communication')}}">返回交流区</a>
            </button>
        </div>
    </div>
    @foreach($data1 as $v)
        <div class="row clearfix tiezi">
            <div class="col-md-12 column">
                <h4>
                    {{$v->link_newusername}} <small>{{$v->link_time}}</small>
                </h4>
                <h3>
                    {{$v->link_content}}
                </h3>
            </div>
        </div>
    @endforeach
</div>
<script src="{{asset('public/style/js/jquery-2.1.1.min.js')}}"></script>
<script src="{{asset('public/style/js/bootstrap.min.js')}}"></script>

</body>
</html>