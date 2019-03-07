<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>详情</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <div class="row">
            <!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
            <div id="current_tds" style="width:1000px;height:400px;margin-top:40px"></div>
        </div><!-- .row -->
    </body>
    <script src="https://cdn.bootcss.com/echarts/4.1.0.rc2/echarts-en.common.js"></script>
</html>

<script type="text/javascript">
    var durations = {{ $durations }}
    var currents = {{ $currents }}
    var myChart = echarts.init(document.getElementById('current_tds'));
    var option = {
        title: {
            text: '电流变化统计'
        },
        tooltip: {
            trigger: 'axis',
        },
        legend: {
            data:['电流值']
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        toolbox: {
            feature: {
                saveAsImage: {
                    title: '保存'
                }
            }
        },
        xAxis: {
            type: 'category',
            // boundaryGap: false,
            data: durations,
            // axisLabel: {
            //     rotate: 45
            // }
        },
        yAxis: {
            type: 'value',
            axisLabel:{
                formatter:'{value}'
            }
        },
        series: [
            {
                name:'电流值',
                type:'line',
                data:currents
            }
        ]
    };

    // myChart.showLoading();    //数据加载完之前先显示一段简单的loading动画
    // current_tds = [];
    // durations = [];

    // for(var i = 0 ; i < 1; i++){
    //     current_tds.push(1);
    //     durations.push(1);
    // }
    // myChart.hideLoading();    //隐藏加载动画
    // myChart.setOption({        //载入数据
    //     xAxis: {
    //         data: durations    //填入X轴数据
    //     },
    //     series: [
    //         {
    //             type:'line',
    //             data:current_tds
    //         }
    //     ]
    // });

    // 使用刚指定的配置项和数据显示图表。
    myChart.setOption(option);
</script>
