<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>详情</title>

        <link href="{{ asset('css/show.css') }}" rel="stylesheet">
        <script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>    
    </head>
    <body>
        <div class="header">MOTORTEST Labs</div>
        <div class="detail">
            <div class="row">
                <div class="single-setting">
                    <image class="icon" src='/images/icon_brand.png'></image>
                    <span class="name">设备</span>
                    <span class="value">{{ $test->device }}</span>
                </div>
            </div>
            <div class="row">
                <div class="single-setting">
                    <image class="icon" src="/images/icon_beanweight.png"></image>
                    <span class="name">类型</span>
                    <span class="value">{{ $test->type }}</span>
                </div>
                <div class="single-setting">
                    <image class="icon" src="/images/icon_time.png"></image>
                    <span class="name">周期</span>
                    <span class="value">{{ $test->cycle }}</span>
                </div>
            </div>
            <div class="row">
                <div class="single-setting">
                    <image class="icon" src="/images/icon_grandsize.png"></image>
                    <span class="name">档位</span>
                    <span class="value">{{ $test->level }}</span>
                </div>
                <div class="single-setting-date">
                    <image class="icon" src="/images/icon_time.png"></image>
                    <span class="name">日期</span>
                    <span class="value">{{ $test->date }}</span>
                </div>
            </div>
        </div>
        <div class="detail" id="chart"></div>
    </body>
</html>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var durations = {{ $durations }}
    var currents = {{ $currents }}
    Highcharts.chart('chart',{
    chart: {
        type: 'line',
        height: 320,
    },
    title: {
        text: 'MOTORTEST'
    },
    tooltip: {
        enabled: false,
    },
    plotOptions: {
        series: {
        marker: {
            enabled: false
        },
        // lineWidth: 1,
        enableMouseTracking: false
        }
    },
    series: [
        {
        name: '电流',
        data: currents,
        color:'#53B2F0',
        fillColor: {
            linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
            },
            stops: [
            [0, '#83c0e8'],
            [1, '#b9e1f5']
            ]
        },
        }
    ],
    xAxis: {
        floor:0,
        categories: durations,
        labels: {
            formatter: function() {
                return this.value.toFixed(2);
            }
        },
        lineWidth: 2,
        lineColor: '#ccc',
        min: 0,
        startOnTick: true,
    },
    yAxis: {
        gridLineWidth: 1,
        title: {
        enabled: false
        }
    },
    credits: {
        enabled: false
    }
    });
</script>
