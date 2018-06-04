@extends('common.layoutTeacher')

@section('rightcontent')

    <div class="panel panel-default">
        <div class="panel-heading">主观题阅卷</div>
        <input type="hidden" name="paperid" value="{{ $paper_id }}" />
        <table class="table table-striped table-hover table-responsive">
            <thead>
                <tr>
                    <th width="25%">题号</th>
                    <th width="25%">考生答案</th>
                    <th width="25%">打分</th>
                </tr>
            </thead>
            <tbody>

            @foreach($subjects as $subject)
                <tr>
                    <td width="10%">主观题第{{ $id }}题</td>
                    <td width="80%">{{ $subject }}</td>
                    <td width="10%">
                        <input type="text" value="" name="subject_result[{{ $id++ }}]">
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

    <div style="position: relative;left: 70%" >
        <button id="submit_read_result" type="button" class="btn btn-primary">提交打分</button>
    </div>

    <script>
        $('#submit_read_result').click(function () {
            var read_result = [];
            var paper = $("input[name='paperid']").val();
            var i = 0;
            @for($id=1;$id<=5;$id++)
                read_result[i] = $("input[name='subject_result[{{ $id }}]']").val();
                i++;
            @endfor

            submit_result(read_result,paper);
        });
        function submit_result(result,_paper){
            $.ajax({
                type:'post',
                url:'read_result',
                data: {read_result:result,paper_id:_paper},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    //console.log(data);
                    if(data['msg']=='success'){
                        alert('提交成功');
                    }
                }
            });
        }
    </script>
@endsection