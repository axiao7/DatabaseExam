@extends('common.layoutTeacher')

@section('rightcontent')

    <div style="position: relative;left: 280px">
        <ul class="nav nav-pills">
            <li role="presentation" class="active"><a href="{{ url('teacher/quesbankmanager/choice') }}">单选题</a></li>
            <li role="presentation"><a href="{{ url('teacher/quesbankmanager/torf') }}">判断题</a></li>
            <li role="presentation"><a href="{{ url('teacher/quesbankmanager/subject') }}">主观题</a></li>
        </ul>
    </div>

    {{--文件上传--}}
    {{--<div class="row">--}}
        {{--<div class="col-md-8 col-md-offset-2">--}}
            {{--<div class="panel panel-default">--}}
                {{--<div class="panel-heading">--}}
                    {{--批量导入题目--}}
                {{--</div>--}}
                {{--<div class="panel-body">--}}
                    {{--<form class="form-horizontal" role="form" method="POST" action="{{ url('teacher/quesbankmanager/upload', ['name' => 'choice']) }}" enctype="multipart/form-data">--}}
                        {{--{{ csrf_field() }}--}}

                        {{--@include('common.upload')--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--弹出框文件上传--}}
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        批量导入题目
    </button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">导入单选题</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('teacher/quesbankmanager/upload', ['name' => 'choice']) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include('common.upload')
                    </form>
                </div>

            </div>
        </div>
    </div>


    <div>
            @foreach($choices as $choice)
                <div>
                    <div class="checkbox">
                        <label>
                            <input class="choiceId" type="checkbox" value="{{ $choice->id }}" name="Choice">
                            {{ $id_++ }}.{{$choice->topic_content }}
                        </label>

                        <form action="{{ url('teacher/quesbankmanager/choice/'.$choice->id) }}" method="POST" style="display: inline;">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-sm btn-danger">删除</button>
                        </form>
                    </div>

                    <ul class="list-group">
                        <li class="list-group-item">
                            A{{$choice->option_A}}
                            @if($choice->right_answer == 'A')
                                <span style="color: lightsalmon">[正解]</span>
                            @endif
                        </li>

                        <li class="list-group-item">
                            B{{$choice->option_B}}
                            @if($choice->right_answer == 'B')
                                <span style="color: lightsalmon">[正解]</span>
                            @endif
                        </li>


                        <li class="list-group-item">
                            C{{$choice->option_C}}
                            @if($choice->right_answer == 'C')
                                <span style="color: lightsalmon">[正解]</span>
                            @endif
                        </li>

                        <li class="list-group-item">
                            D{{$choice->option_D}}
                            @if($choice->right_answer == 'D')
                                <span style="color: lightsalmon">[正解]</span>
                            @endif
                        </li>

                    </ul>
                </div>
            @endforeach
            <button id="submit_choice" type="button" class="btn btn-primary">提交</button>

    </div>
    <script>
        $('#submit_choice').click(function () {
            var checkId = [];
            $("input[name='Choice']:checked").each(function (i) {
                checkId[i] =$(this).val();
            });
            makepaper_choice(checkId);
        });
        function makepaper_choice(data){
            // $.post('choice/makepaper', {checkId: data}, function (json) {
            //
            // }, 'json');
            $.ajax({
                type:'post',
                url:'choice/makepaper',
                data: {checkId:data},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    alert("单选题组卷成功");
                }
            });
        }
    </script>
@endsection

