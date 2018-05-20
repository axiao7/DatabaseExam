@extends('common.layoutTeacher')

@section('rightcontent')
    <div class="panel panel-default">
        <div class="panel-heading">学生列表</div>
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th width="25%">学号</th>
                <th width="25%">姓名</th>
                <th width="25%">班级</th>
                {{--<th>成绩</th>--}}
                <th width="25%">操作</th>
            </tr>
            </thead>
            <tbody>

            @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $student->student_id }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->class }}</td>
                    <td>
                        <a href="{{ url('teacher/student/detail', ['id'=>$student->id]) }}">详情</a>
                        <a href="{{ url('teacher/read', ['id'=>$student->id]) }}">阅卷</a>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <!-- 分页  -->
    <div>
        <div class="pull-right">
            {{ $students->render() }}
        </div>
    </div>


@endsection