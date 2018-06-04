<!doctype html>
<html lang="zh_CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('static/bootstrap/css/bootstrap.min.css') }}">
    <script src="{{ asset('static/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('static/d3/d3.min.js') }}"></script>
    {{--<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>--}}
    <title>毕业设计</title>

    <style>
        .axis path,
        .axis line{
            fill: none;
            stroke: black;
            shape-rendering: crispEdges;
        }

        .axis text {
            font-family: sans-serif;
            font-size: 11px;
        }

        .MyRect {
            fill: steelblue;
        }

        .MyText {
            fill: white;
            text-anchor: middle;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">数据库原理在线考试管理</a>
        </div>
    </div>
</nav>

<div class="container" style="position: relative">
    <div style="margin-top: 10px">
        <!-- 左侧菜单区域   -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ url('teacher/quesbankmanager') }}" class="list-group-item">题库管理</a>
                <a href="{{ url('teacher/createtestpaper') }}" class="list-group-item">试卷管理</a>
                <a href="{{ url('teacher/readpapers') }}" class="list-group-item">批阅试卷</a>
                <a href="{{ url('teacher/scoreanalysis') }}" class="list-group-item active">成绩分析</a>
            </div>
        </div>

        {{--<div>--}}
            {{--@foreach($total_score_count as $count)--}}
                {{--<input type="hidden" name="score[{{ $i }}]" value="{{ $count }}" />--}}
                {{--{{ $i++ }};--}}
            {{--@endforeach--}}
        {{--</div>--}}

        <!-- 右侧内容区域 -->
        <div class="col-md-9" style="">
            <script>
                //画布大小
                var width = 400;
                var height = 400;

                //在 body 里添加一个 SVG 画布
                var svg = d3.select(".col-md-9")
                    .append("svg")
                    .attr("width", width)
                    .attr("height", height);

                //画布周边的空白
                var padding = {left:30, right:30, top:20, bottom:20};

                //定义一个数组
                var dataset = [];
                var i = 0;
                @foreach($total_score_count as $count)
                    dataset[i] = {{ $count }}
                    //$("input[name='score[i]']").val();
                    i++;
                @endforeach
                //console.log(dataset[0]);

                //x轴的比例尺
                var xScale = d3.scale.ordinal()
                    .domain(d3.range(dataset.length))
                    .rangeRoundBands([0, width - padding.left - padding.right]);

                //y轴的比例尺
                var yScale = d3.scale.linear()
                    .domain([0,d3.max(dataset)])
                    .range([height - padding.top - padding.bottom, 0]);

                //定义x轴
                var xAxis = d3.svg.axis()
                    .scale(xScale)
                    .orient("bottom");

                //定义y轴
                var yAxis = d3.svg.axis()
                    .scale(yScale)
                    .orient("left");

                //矩形之间的空白
                var rectPadding = 4;

                //添加矩形元素
                var rects = svg.selectAll(".MyRect")
                    .data(dataset)
                    .enter()
                    .append("rect")
                    .attr("class","MyRect")
                    .attr("transform","translate(" + padding.left + "," + padding.top + ")")
                    .attr("x", function(d,i){
                        return xScale(i) + rectPadding/2;
                    } )
                    .attr("width", xScale.rangeBand() - rectPadding )
                    .attr("y",function(d){
                        var min = yScale.domain()[0];
                        return yScale(min);
                    })
                    .attr("height", function(d){
                        return 0;
                    })
                    .transition()
                    .delay(function(d,i){
                        return i * 200;
                    })
                    .duration(2000)
                    .ease("bounce")
                    .attr("y",function(d){
                        return yScale(d);
                    })
                    .attr("height", function(d){
                        return height - padding.top - padding.bottom - yScale(d);
                    });

                //添加文字元素
                var texts = svg.selectAll(".MyText")
                    .data(dataset)
                    .enter()
                    .append("text")
                    .attr("class","MyText")
                    .attr("transform","translate(" + padding.left + "," + padding.top + ")")
                    .attr("x", function(d,i){
                        return xScale(i) + rectPadding/2;
                    } )
                    .attr("dx",function(){
                        return (xScale.rangeBand() - rectPadding)/2;
                    })
                    .attr("dy",function(d){
                        return 20;
                    })
                    .text(function(d){
                        return d;
                    })
                    .attr("y",function(d){
                        var min = yScale.domain()[0];
                        return yScale(min);
                    })
                    .transition()
                    .delay(function(d,i){
                        return i * 200;
                    })
                    .duration(2000)
                    .ease("bounce")
                    .attr("y",function(d){
                        return yScale(d);
                    });

                //添加x轴
                svg.append("g")
                    .attr("class","axis")
                    .attr("transform","translate(" + padding.left + "," + (height - padding.bottom) + ")")
                    .call(xAxis);

                //添加y轴
                svg.append("g")
                    .attr("class","axis")
                    .attr("transform","translate(" + padding.left + "," + padding.top + ")")
                    .call(yAxis);

            </script>
        </div>
    </div>
</div>

<script src="{{ asset('static/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>


{{--@section('rightcontent')--}}
    {{--@if($total_score_count)--}}
        {{----}}
    {{--@else--}}
        {{--暂无成绩信息.--}}
    {{--@endif--}}

{{--@endsection--}}