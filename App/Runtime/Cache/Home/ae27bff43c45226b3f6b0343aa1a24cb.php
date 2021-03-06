<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="colorBall">
    <title>双色球</title>

    <link rel="shortcut icon" href="/Public/asset/ico/favicon.png">

    <script src="/Public/Js/echarts.js"></script>
</head>

<body>
<div class="container-fluid">
    <div class="row-fluid example">
        <div id="graphic" class="col-md-8">
            <div id="main" class="main" style="width:100%;height:300px;border:1px solid;"></div>
        </div>
    </div>
</div>
<script src="/Public/asset/js/jquery.min.js"></script>
<script type="text/javascript">
    require.config({
        paths: {
            echarts: '/Public/build/dist'
        }
    });

    // 使用
    require(
            [
                'echarts',
                'echarts/chart/line' // 使用柱状图就加载bar模块，按需加载
            ],
            function (ec) {
                // 基于准备好的dom，初始化echarts图表
                var myChart = ec.init(document.getElementById('main'));

                var option = {
                    title: {
                        text: '双色球',
                    },
                    tooltip: {
                        trigger: 'axis'
                    },
                    legend: {
                        data: ['1', '2','3','4','5','6','7','8','9','10','11','12','13','14','15']
                    },
                    toolbox: {
                        show: true,
                        feature: {
                            mark: {show: true},
                            dataView: {show: true, readOnly: false},
                            magicType: {show: true, type: ['line', 'bar']},
                            restore: {show: true},
                            saveAsImage: {show: true}
                        }
                    },
                    calculable: true,
                    xAxis: [
                        {
                            type: 'category',
                            boundaryGap: false,
                            data: ['第一次出现', '第二次出现', '第三次出现', '第四次出现', '第五次出现', '第六次出现', '红球出现', '蓝球出现']
                        }
                    ],
                    yAxis: [
                        {
                            type: 'value',
                            axisLabel: {
                                formatter: '{value} 次'
                            }
                        }
                    ],
                    series: [
                        {
                            name: '1号球',
                            type: 'line',
                            data: [<?php echo ($data["0"]); ?>],
                            markLine: {
                                data: [
                                    {type: 'average', name: '平均值'}
                                ]
                            }
                        },
                        {
                            name: '2号球',
                            type: 'line',
                            data: [<?php echo ($data["1"]); ?>],
                            markLine: {
                                data: [
                                    {type: 'average', name: '平均值'}
                                ]
                            }
                        }
                    ]
                };
                myChart.setOption(option);
            }
    );
</script>
</body>
</html>