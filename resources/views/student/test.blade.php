@extends('common.layoutStudent')

@section('content')


    <div style="width: 60%;position: relative;left: 20%;right: 20%">
        <div class="checkbox">

            <div style="font-size: 20px"><b>一：单选题</b></div>
            @foreach($choices as $choice)
                <div class="checkbox">
                    <label>
                        {{ $id++ }}.{{$choice->topic_content }}
                    </label>
                </div>

                <div class="checkbox">
                    <div style="height: 30px">
                        <label style="width: 400px">
                            <input type="radio" value="A" name="Choice[{{ $choice->id }}]">
                            A、{{$choice->option_A}}
                        </label>

                        <label>
                            <input type="radio" value="B" name="Choice[{{ $choice->id }}]">
                            B、{{$choice->option_B}}
                        </label>
                    </div>

                    <div style="height: 30px">
                        <label style="width: 400px">
                            <input type="radio" value="C" name="Choice[{{ $choice->id }}]">
                            C、{{$choice->option_C}}
                        </label>

                        <label>
                            <input type="radio" value="D" name="Choice[{{ $choice->id }}]">
                            D、{{$choice->option_D}}
                        </label>
                    </div>
                </div>

                <hr>
            @endforeach
        </div>

        <div class="checkbox">
            <div style="font-size: 20px"><b>二：判断题</b></div>

            @foreach($torfs as $torf)
                <div class="checkbox">
                    <label>
                        {{ $id++ }}.{{$torf->topic_content }}
                    </label>
                </div>

                <div class="checkbox">
                    <label style="width: 400px">
                        <input type="radio" value="T" name="Torf[{{ $torf->id }}]">
                        对
                    </label>

                    <label>
                        <input type="radio" value="F" name="Torf[{{ $torf->id }}]">
                        错
                    </label>
                </div>
                <hr>
            @endforeach
        </div>

        <div class="checkbox">

            <div style="font-size: 20px"><b>三：主观题</b></div>
            @foreach($subjects as $subject)
                <div class="checkbox">
                    <label>
                        {{ $id++ }}.{{$subject->topic_content }}
                    </label>
                </div>

                <div class="checkbox">
                    <textarea class="form-control" rows="5" name="Subject[{{ $subject->id }}]"></textarea>
                    {{--<input type="text" value="" name="Subject" width="500px" height="200px">--}}
                </div>
            @endforeach

        </div>

        <button id="submit" type="button" class="btn btn-primary">交卷</button>

    </div>

    <script>
        $('#submit').click(function () {
            var choice_answer = [];
            var i = 0;
            @foreach($choices as $choice)
                choice_answer[i] = $("input[name='Choice[{{ $choice->id }}]']:checked").val();
                i++;
            @endforeach

            var torf_answer = [];
            var j = -1;
            @foreach($torfs as $torf)
                    j++;
                    torf_answer[j] = $("input[name='Torf[{{ $torf->id }}]']:checked").val();
            @endforeach

            var subject_answer = [];
            var k = 0;
            @foreach($subjects as $subject)
                subject_answer[k] = $("textarea[name='Subject[{{ $subject->id }}]']").val();
                k++;
            @endforeach

            submit_answer(choice_answer, torf_answer, subject_answer);
        });
        function submit_answer(choice, torf, subject){
            $.ajax({
                type:'post',
                url:'submitpaper',
                data: {choice_answer:choice, torf_answer: torf, subject_answer: subject},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    //console.log(data)
                    if(data['msg']=='success'){
                        alert('交卷成功');

                    }
                }
            });
        }
    </script>
@stop