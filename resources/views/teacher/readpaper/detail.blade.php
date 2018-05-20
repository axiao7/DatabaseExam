@extends('common.layoutTeacher')

@section('rightcontent')
    <div class="panel panel-default">
        <div class="panel-heading">学生详情</div>

        <table class="table table-bordered table-striped table-hover ">
            <tbody>
            <tr>
                <td width="50%">学号</td>
                <td>{{ $student->student_id }}</td>
            </tr>
            <tr>
                <td>姓名</td>
                <td>{{ $student->name }}</td>
            </tr>
            <tr>
                <td>班级</td>
                <td>{{ $student->class }}</td>
            </tr>
            <tr>
                <td>单选题分数</td>
                <td>{{ $choice_score }}</td>
            </tr>
            <tr>
                <td>判断题分数</td>
                <td>{{ $torf_score }}</td>
            </tr>
            <tr>
                <td>主观题分数</td>
                <td>{{ $subject_score }}</td>
            </tr>
            <tr>
                <td>主观题是否阅卷</td>
                @if($read_or_not==0)
                    <td>否</td>
                @else
                    <td>是</td>
                @endif
            </tr>
            <tr>
                <td>总分</td>
                <td>{{ $total_score }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@stop