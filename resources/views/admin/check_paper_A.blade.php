@extends('common.layouts')

@section('content')
    <div class="container">
        <div class="row" style="margin-top: 50px">

            <!-- 左侧菜单区域   -->
            <div class="col-md-3">
                @section('leftmenu')
                    <div class="list-group">
                        <a href="{{ url('admin') }}" class="list-group-item active">试卷审核</a>
                        <a href="{{ url('admin/studentinfo') }}" class="list-group-item">学生信息导入</a>
                        <a href="{{ url('admin/teacherinfo') }}" class="list-group-item">教师信息导入</a>
                    </div>
                @show
            </div>

            <!-- 右侧内容区域 -->
            <div class="col-md-9">

                <div style="position: relative;left: 280px">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="active"><a href="{{ url('admin/checkpaper/1') }}">审核试卷A</a></li>
                        <li role="presentation"><a href="{{ url('admin/checkpaper/2') }}">审核试卷B</a></li>
                    </ul>
                </div>
                @if($no_paper)
                    暂未组卷.
                @elseif($no_info)
                    已组卷，暂无提交审核.
                @else
                    @include('common.paper')
                        <div class="form-group">
                            审核结果：
                            <select id="paper_pass" class="select">
                                <option value="1">审核通过</option>
                                <option value="0">审核未通过</option>
                            </select>
                        </div>
                        <button id="submit_check" type="submit" class="btn btn-primary">提交</button>
                @endif

            </div>
        </div>
    </div>


    <script>
        $('#submit_check').click(function () {
            var check_info = $("#paper_pass").val();
            var _paper = 1;
            submit_check(check_info,_paper);
        });
        function submit_check(check_info,_paper){
            $.ajax({
                type:'post',
                url:'submitcheck',
                data: {info: check_info,paper_id:_paper},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){

                    if(data['msg']=='success'){
                        alert('提交审核成功');
                    }
                }
            });
        }
    </script>
@endsection