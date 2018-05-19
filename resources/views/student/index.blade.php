@extends('common.layoutStudent')

@section('content')
    <div style="width: 20%;margin-left: 30%;margin-right: 50%">
        <p style="font-size: 20px;"><b>考生须知：</b></p>
        <div style="width: 500px;">
            <ul class="list-group">
                <li class="list-group-item">1.数据库原理考试采用在线考试的形式。只需携带必要的考试工具（签字笔），
                    禁止携带任何书籍、笔记、资料、报刊、草稿纸。</li>
                <li class="list-group-item">2.考生禁止携带任何无线通信工具进入考场。如发现考生携带禁带物品，
                    将作为违规处理，成绩无效。</li>
                <li class="list-group-item">3.考生在考试过程中遇到相关的问题，可向监考老师举手示意。</li>
                <li class="list-group-item">4.考生必须按规定的时间进入候考室。考生进入候考室时必须主动出示学生证以及有效身份证件，
                    接受监考老师的核验，并按要求在签到表上签字。</li>
                <li class="list-group-item">5.考生在考场内必须严格遵守考场纪律，对于违反考场规定、
                    不服从监考人员管理和舞弊者，严肃处理。</li>
            </ul>
        </div>

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-default">
                <a href="{{ url('student/test/'.$_stu_id) }}">进入考试</a>
            </button>
        </div>

    </div>
@stop