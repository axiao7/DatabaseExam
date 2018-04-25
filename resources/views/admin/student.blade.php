@extends('common.layouts')

@section('content')
    <div class="container">
        <div class="row">

            <!-- 左侧菜单区域   -->
            <div class="col-md-3">
                @section('leftmenu')
                    <div class="list-group">
                        <a href="{{ url('admin/studentinfo') }}" class="list-group-item">学生信息导入</a>
                        <a href="{{ url('admin/teacher') }}" class="list-group-item">教师信息导入</a>
                    </div>
                @show
            </div>

            <!-- 右侧内容区域 -->
            <div class="col-md-9">
            </div>
        </div>
    </div>
@endsection