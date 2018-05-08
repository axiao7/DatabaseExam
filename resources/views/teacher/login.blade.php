@extends('common.layouts')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">登录</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="">
                            {{ csrf_field() }}
                            <div style="text-align: center">
                                <h3 style="margin-bottom: 20px">教师登陆</h3>
                            </div>

                            <div class="form-group{{ $errors->has('Teacher.teacher_id') ? ' has-error' : '' }}">
                                <label for="number" class="col-md-4 control-label">工号</label>

                                <div class="col-md-6">
                                    <input id="teacher_id" type="input" class="form-control" name="Teacher[teacher_id]" value="{{ old('teacher_id') }}">

                                    @if ($errors->has('Teacher.teacher_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Teacher.teacher_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Teacher.password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">密码</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="Teacher[password]">

                                    @if ($errors->has('Teacher.password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Teacher.password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> 登录
                                    </button>
                                    @if (Session::get('error'))
                                        <span class="help-block">
                                        <strong>{{ Session::get('error') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop