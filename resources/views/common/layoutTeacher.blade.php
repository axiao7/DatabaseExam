<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">
    <title>毕业设计</title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">数据库在线考试管理</a>
        </div>
    </div>
</nav>

{{--<div class="bs-example" data-example-id="simple-nav-stacked">--}}
{{--<ul class="nav nav-pills nav-stacked nav-pills-stacked-example">--}}
{{--<li role="presentation" class="active"><a href="#">Home</a></li>--}}
{{--<li role="presentation"><a href="#">Profile</a></li>--}}
{{--<li role="presentation"><a href="#">Messages</a></li>--}}
{{--</ul>--}}
{{--</div>--}}

<div class="container">
    <div class="row" style="margin-top: 50px">

        <!-- 左侧菜单区域   -->
        <div class="col-md-3">
            @section('leftmenu')
                <div class="list-group">
                    <a href="{{ url('admin') }}" class="list-group-item active">试卷管理</a>
                    <a href="{{ url('admin/studentinfo') }}" class="list-group-item">学生信息导入</a>
                    <a href="{{ url('admin/teacherinfo') }}" class="list-group-item">教师信息导入</a>
                </div>
            @show
        </div>

        <!-- 右侧内容区域 -->
        <div class="col-md-9">
            试卷信息
        </div>
    </div>
</div>








@yield('content')




<script src="{{ asset('static/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
