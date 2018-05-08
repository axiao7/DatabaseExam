<div style="font-size: 20px"><b>一：单选题</b></div>
    @foreach($choices as $choice)
        <div>
            <div class="choice">
                <label>
                    {{ $id++ }}.{{$choice->topic_content }}
                </label>

                {{--<form action="{{ url('teacher/quesbankmanager/choice/'.$choice->id) }}" method="POST" style="display: inline;">--}}
                {{--{{ method_field('DELETE') }}--}}
                {{--{{ csrf_field() }}--}}
                {{--<button type="submit" class="btn btn-sm btn-danger">删除</button>--}}
                {{--</form>--}}
            </div>

            <ul class="list-group">
                <li class="list-group-item">
                    A、{{$choice->option_A}}
                </li>

                <li class="list-group-item">
                    B、{{$choice->option_B}}
                </li>


                <li class="list-group-item">
                    C、{{$choice->option_C}}
                </li>

                <li class="list-group-item">
                    D、{{$choice->option_D}}
                </li>

            </ul>
        </div>
    @endforeach

<hr>
<div style="font-size: 20px"><b>二：判断题</b></div>
    @foreach($torfs as $torf)
        <div class="torf">
            <label>
                {{ $id++ }}.{{$torf->topic_content }}
            </label>
        </div>
    @endforeach

<hr>
<div style="font-size: 20px"><b>三：主观题</b></div>
    @foreach($subjects as $subject)
        <div class="subject">
            <label>
                {{ $id++ }}.{{$subject->topic_content }}
            </label>
        </div>
    @endforeach
<hr>