@extends('common.layoutTeacher')

@section('rightcontent')

    <div style="position: relative;left: 280px">
        <ul class="nav nav-pills">
            <li role="presentation"><a href="{{ url('teacher/quesbankmanager/choice') }}">单选题</a></li>
            <li role="presentation"><a href="{{ url('teacher/quesbankmanager/torf') }}">判断题</a></li>
            <li role="presentation" class="active"><a href="{{ url('teacher/quesbankmanager/subject') }}">主观题</a></li>
        </ul>
    </div>

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
                    <h4 class="modal-title" id="myModalLabel">导入主观题</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('teacher/quesbankmanager/upload', ['name' => 'subject']) }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include('common.upload')
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div>
        <hr>
        <div style="position: relative; left: 33%;">
            <b>难度系数</b>：
            高<img src="{{ asset('static/star.png') }}"><img src="{{ asset('static/star.png') }}"><img src="{{ asset('static/star.png') }}">
            | 中<img src="{{ asset('static/star.png') }}"><img src="{{ asset('static/star.png') }}">
            | 低<img src="{{ asset('static/star.png') }}">
        </div>

        @foreach($subjects as $subject)
            <div>
                <div class="checkbox">
                    @if($subject->difficulty=='高')
                        <img src="{{ asset('static/star.png') }}"><img src="{{ asset('static/star.png') }}"><img src="{{ asset('static/star.png') }}">
                    @elseif($subject->difficulty=='中')
                        <img src="{{ asset('static/star.png') }}"><img src="{{ asset('static/star.png') }}"><span style="width: 16px"></span>
                    @elseif($subject->difficulty=='低')
                        <img src="{{ asset('static/star.png') }}"><span style="width: 32px"></span>
                    @endif

                    <label>
                        {{--<input type="checkbox" value="">--}}
                        <input class="subjectId" type="checkbox" value="{{ $subject->id }}" name="Subject">
                        {{ $id_++ }}.{{$subject->topic_content }}
                    </label>

                    <form action="{{ url('teacher/quesbankmanager/subject/'.$subject->id) }}" method="POST" style="display: inline;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-danger">删除</button>
                    </form>
                </div>

                <ul class="list-group">
                    <li class="list-group-item">
                           <span style="color: lightsalmon">[参考答案]</span>{{ $subject->right_answer }}
                    </li>
                </ul>

            </div>
        @endforeach
            <hr>
            <div class="form">
                <select id="paper_flag" class="select">
                    <option value="1">试卷A</option>
                    <option value="2">试卷B</option>
                </select>
            </div>

        <button id="submit_subject" type="button" class="btn btn-primary">组卷</button>
    </div>

    <script>
        $('#submit_subject').click(function () {
            var checkId_subject = [];
            $("input[name='Subject']:checked").each(function (i) {
                checkId_subject[i] =$(this).val();
            });
            var _paper = $("#paper_flag").val();
            makepaper_subject(checkId_subject,_paper);
        });
        function makepaper_subject(data,_paper){
            // $.post('choice/makepaper', {checkId: data}, function (json) {
            //
            // }, 'json');
            $.ajax({
                type:'post',
                url:'subject/makepaper',
                data: {checkId_subject:data, paper: _paper},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    //console.log(data);
                    if(data['msg']=='success'){
                        alert('主观题组卷成功');
                    }
                }
            });
        }
    </script>

@endsection

