@extends('common.layouts')

@section('content')
    <div class="list-group" style="width: 10%;position: relative;left: 45%">
        <p><b>请选择：</b></p>
        <a href="{{ url('admin/login') }}" class="list-group-item active">管理员</a>
        <a href="{{ url('teacher/login') }}" class="list-group-item">教师</a>
        <a href="{{ url('student/login') }}" class="list-group-item">考生</a>
    </div>
@stop