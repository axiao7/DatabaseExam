@extends('common.layoutTeacher')


@section('rightcontent')
    <div>
        <a href="{{ url('teacher/createtestpaper/') }}">返回</a>

        @if (Session::get('success'))
            <span class="help-block">
                <strong style="color: #286090">{{ Session::get('success') }}</strong>
            </span>
        @endif
    </div>
    @if($no_info)
        暂无试卷信息.
    @else
        @include('common.paper')
        <form class="form-horizontal" role="form" method="POST" action="{{ url('teacher/createtestpaper/submit_check/1') }}">
            {{ csrf_field() }}
            <button id="submit_check" type="submit" class="btn btn-primary">提交审核</button>
        </form>
    @endif



    {{--<script>--}}
    {{--function myCheck() {--}}
    {{----}}
    {{--}--}}
    {{--</script>--}}
@stop