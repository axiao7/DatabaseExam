@extends('common.layoutTeacher')


@section('rightcontent')
    @include('common.paper')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('teacher/createtestpaper/check') }}">
        {{ csrf_field() }}
        <button id="submit_check" type="submit" class="btn btn-primary">提交审核</button>
    </form>

    {{--<script>--}}
        {{--function myCheck() {--}}
            {{----}}
        {{--}--}}
    {{--</script>--}}
@stop