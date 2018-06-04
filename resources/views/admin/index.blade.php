@extends('common.layouts')

@section('content')
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
                        <li role="presentation"><a href="{{ url('admin/checkpaper/1') }}">审核试卷A</a></li>
                        <li role="presentation"><a href="{{ url('admin/checkpaper/2') }}">审核试卷B</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection