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
    </div>
</nav>


<div class="container">
    <div style="margin-top: 10px">

        <!-- 左侧菜单区域   -->
        <div class="col-md-3">
            @section('leftmenu')
                <div class="list-group">
                    <a href="{{ url('admin') }}" class="list-group-item active">试卷审核</a>
                    <a href="{{ url('admin/studentinfo') }}" class="list-group-item">学生信息导入</a>
                    <a href="{{ url('admin/teacherinfo') }}" class="list-group-item">教师信息导入</a>
                </div>
            @show
        </div>

        <!-- 右侧内容区域 -->
        <div class="col-md-9">

            <div style="position: relative;left: 280px">
                <ul class="nav nav-pills">
                    <li role="presentation" class="active"><a href="{{ url('admin/checkpaper/1') }}">审核试卷A</a></li>
                    <li role="presentation"><a href="{{ url('admin/checkpaper/2') }}">审核试卷B</a></li>
                </ul>
            </div>
            @if($no_paper)
                暂未组卷.
            @elseif($no_info)
                已组卷，暂无提交审核.
            @else
                @include('common.paper')
                <div class="form-group">
                    审核结果：
                    <select id="paper_pass" class="select">
                        <option value="1">审核通过</option>
                        <option value="0">审核未通过</option>
                    </select>
                </div>
                <button id="submit_check" type="submit" class="btn btn-primary">提交</button>
            @endif

        </div>
    </div>
</div>


<script>
    $('#submit_check').click(function () {
        var check_info = $("#paper_pass").val();
        var _paper = 1;
        submit_check(check_info,_paper);
    });
    function submit_check(check_info,_paper){
        $.ajax({
            type:'post',
            url:'submitcheck',
            data: {info: check_info,paper_id:_paper},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success:function(data){

                if(data['msg']=='success'){
                    alert('审核成功');
                }
            }
        });
    }
</script>


{{--<script src="{{ asset('static/jquery/jquery.min.js') }}"></script>--}}
<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>

