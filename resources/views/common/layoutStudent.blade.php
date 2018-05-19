<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            <a class="navbar-brand" href="{{ url('/') }}">数据库原理在线考试系统</a>
        </div>

        <div class="navbar-brand" style="position: relative;left: 60%;">
            考生：{{ $stu_name }}
        </div><!-- /.navbar-collapse -->

    </div>
</nav>

{{--<div class="bs-example" data-example-id="simple-nav-stacked">--}}
{{--<ul class="nav nav-pills nav-stacked nav-pills-stacked-example">--}}
{{--<li role="presentation" class="active"><a href="#">Home</a></li>--}}
{{--<li role="presentation"><a href="#">Profile</a></li>--}}
{{--<li role="presentation"><a href="#">Messages</a></li>--}}
{{--</ul>--}}
{{--</div>--}}



@yield('content')



{{--<script src="{{ asset('static/jquery/jquery.min.js') }}"></script>--}}
<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>