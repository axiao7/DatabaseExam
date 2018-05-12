<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('static/jquery/jquery.min.js') }}"></script>
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
                <a class="navbar-brand" href="#">数据库原理在线考试管理</a>
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
                        <a href="{{ url('teacher/quesbankmanager') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/teacher/quesbankmanager'
                        || Request::getPathInfo() == '/teacher/quesbankmanager/choice'
                        || Request::getPathInfo() == '/teacher/quesbankmanager/torf'
                        || Request::getPathInfo() == '/teacher/quesbankmanager/subject'? 'active':'' }}">题库管理</a>
                        <a href="{{ url('teacher/createtestpaper') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/teacher/createtestpaper' ? 'active':'' }}">试卷管理</a>
                        <a href="{{ url('teacher/readpapers') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/teacher/readpapers' ? 'active':'' }}">批阅试卷</a>
                        <a href="{{ url('teacher/scoreanalysis') }}" class="list-group-item
                        {{ Request::getPathInfo() == '/teacher/scoreanalysis' ? 'active':'' }}">成绩分析</a>
                    </div>
                @show
            </div>

            <!-- 右侧内容区域 -->
            <div class="col-md-9">

                @yield('rightcontent')

            </div>
        </div>
    </div>



<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
