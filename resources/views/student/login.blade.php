@extends('common.layouts')

@section('content')
    {{--@if(count($errors))--}}
    {{--<div class="alert alert-danger">--}}
    {{--<ul>--}}
    {{--@foreach($errors->all() as $error)--}}
    {{--<li>{{ $error }}</li>--}}
    {{--@endforeach--}}
    {{--</ul>--}}
    {{--</div>--}}
    {{--@endif--}}
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">登录</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="">
                            {{ csrf_field() }}
                            <div style="text-align: center">
                                <h3 style="margin-bottom: 20px">考生登陆</h3>
                            </div>

                            <div class="form-group{{ $errors->has('Student.student_id') ? ' has-error' : '' }}">
                                <label for="number" class="col-md-4 control-label">学号</label>

                                <div class="col-md-6">
                                    <input id="student_id" type="input" class="form-control" name="Student[student_id]" value="{{ old('student_id') }}">

                                    @if ($errors->has('Student.student_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Student.student_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('Student.password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">密码</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="Student[password]">

                                    @if ($errors->has('Student.password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('Student.password') }}</strong>
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