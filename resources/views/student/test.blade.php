@extends('common.layouts')

@section('content')
    <div class="choice">
        <div style="font-size: 20px"><b>一：单选题</b></div>

        @foreach($choices as $choice)
            <div class="checkbox">
                <label>
                    {{ $id++ }}.{{$choice->topic_content }}
                </label>
            </div>
            <ul class="list-group">
                <li class="list-group-item">
                    <input type="radio" value="" name="choice">
                    A{{$choice->option_A}}
                </li>

                <li class="list-group-item">
                    <input type="radio" value="" name="choice">
                    B{{$choice->option_B}}
                </li>

                <li class="list-group-item">
                    <input type="radio" value="" name="choice">
                    C{{$choice->option_C}}
                </li>

                <li class="list-group-item">
                    <input type="radio" value="" name="choice">
                    D{{$choice->option_D}}
                </li>
            </ul>
        @endforeach
    </div>

    <div class="torf">
        <div style="font-size: 20px"><b>二：判断题</b></div>
        @foreach($torfs as $torf)
            <div>
                <label>
                    {{ $id++ }}.{{$torf->topic_content }}
                </label>
            </div>

            <ul class="list-group">
                <li class="list-group-item">
                    <input type="radio" value="" name="torf">
                    对
                </li>

                <li class="list-group-item">
                    <input type="radio" value="" name="torf">
                    错
                </li>
            </ul>
        @endforeach
    </div>

    <div class="subject">

        <div style="font-size: 20px"><b>三：主观题</b></div>
        @foreach($subjects as $subject)
            <div>
                <label>
                    {{ $id++ }}.{{$subject->topic_content }}
                </label>

            </div>

            <ul class="list-group">
                <li class="list-group-item">
                    <input type="text" value="" name="Subject">
                </li>
            </ul>
        @endforeach

    </div>

    <button id="submit" type="button" class="btn btn-primary">交卷</button>
@stop