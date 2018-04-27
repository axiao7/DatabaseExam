@extends('common.layouts')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px">

            <!-- 左侧菜单区域   -->
            <div class="col-md-3">
                @section('leftmenu')
                    <div class="list-group">
                        <a href="{{ url('admin/') }}" class="list-group-item">试卷管理</a>
                        <a href="{{ url('admin/studentinfo') }}" class="list-group-item">学生信息导入</a>
                        <a href="{{ url('admin/teacherinfo') }}" class="list-group-item active">教师信息导入</a>
                    </div>
                @show
            </div>

            <!-- 右侧内容区域 -->
            <div class="col-md-9">
                @if (Session::get('error'))
                    <span class="help-block">
                                        <strong>{{ Session::get('error') }}</strong>
                                    </span>
                @endif
                @if (Session::get('success'))
                    <span class="help-block">
                                    <strong>{{ Session::get('success') }}</strong>
                                </span>
                @endif
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading">文件上传</div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="" enctype="multipart/form-data">
                                    {{ csrf_field() }}



                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="file" class="col-md-4 control-label">请选择文件</label>

                                        <div class="col-md-6">
                                            <input id="file" type="file" class="form-control" name="source">

                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-btn fa-sign-in"></i> 确认上传
                                            </button>

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection