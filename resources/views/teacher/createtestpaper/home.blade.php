@extends('common.layoutTeacher')


@section('rightcontent')
    <div>
        <div>
            <a href="{{ url('teacher/createtestpaper/1') }}">查看试卷A</a>
        </div>
        <div>
            <a href="{{ url('teacher/createtestpaper/2') }}">查看试卷B</a>
        </div>
    </div>
    {{--<script>--}}
        {{--function myCheck() {--}}
            {{----}}
        {{--}--}}
    {{--</script>--}}
@stop