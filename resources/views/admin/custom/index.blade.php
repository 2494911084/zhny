<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/echarts.min.js"></script>
    <title>Document</title>
    <style>
        .title-nav {
            text-align: center;
            background-color: red;
            line-height: 70px;
            color: white;
        }
        .count-container {
            display: flex;
            margin-top: 5px;
        }
        .count-left {
            width: 50%;
        }
        .company-img {
            width: 100%;
            height: 212px;
        }
        .count-month-li {
            display: flex;
            align-items: center;
            background-color: #357FD9;
            padding: 15px;
        }
        .all-img {
            width: 50%;
            border-radius: 50%;
        }
        .month-row {
            background-color: rgba(0, 0, 0);
            opacity: 0.2;
            color: white;
            width: 30%;
            text-align: center;
            margin-left: 10px;
            border-radius: 5px;
            padding: 10px;
        }
        .month-row-title {

        }
        .month-row-unit {
            padding: 10px 0;
        }
        .month-row-val {

        }
        .count-right {
            padding-left: 5px;
            width: 50%;
        }
        .type-li {
            display: flex;
            align-items: center;
            padding: 20px;
            border-radius: 5px;
        }
        .type-li:nth-child(n+2) {
            margin-top: 10px;
        }
        .type-img {
            width: 60px;
        }
        .type-row {
            display: flex;
            flex-flow: column;
            justify-content: space-between;
            margin-left: 15px;
            height: 100px;
            color: white;
        }
        .type-title {

        }
        .used-val {
            font-size: 1.4em;
            margin: 0 10px;
        }
        .echarts-container {
            display: flex;
            margin-top: 20px;
        }
        .count-all {
            text-align: center;
            width: 8%;
            color: white;
        }
    </style>
</head>
<body>
    <div>
        <div class="title-nav">叼毛有限公司</div>
        <div class="count-container">
            <div class="count-left">
                <div><img src="https://lionfishosspro.zmpgshop.com/Uploads/image/goods/2021-04-26/6086318a9deeb.png" alt="" class="company-img"></div>
                <div class="count-month-li">
                    <div class="count-all">
                        <img src="/logo.png" alt="" class="all-img">
                        <div style="font-size: 0.9em;">能量总耗</div>
                    </div>
                    <div style="width: 92%;display: flex;">
                        <div class="month-row">
                            <div class="month-row-title">本月用量</div>
                            <div class="month-row-unit">Mvvh</div>
                            <div class="month-row-val">870</div>
                        </div>
                        <div class="month-row">
                            <div class="month-row-title">本月用量</div>
                            <div class="month-row-unit">Mvvh</div>
                            <div class="month-row-val">870</div>
                        </div>
                        <div class="month-row">
                            <div class="month-row-title">本月用量</div>
                            <div class="month-row-unit">Mvvh</div>
                            <div class="month-row-val">870</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="count-right">
                <div class="type-li" style="background-color: #B28850;">
                    <img src="https://lionfishosspro.zmpgshop.com/Uploads/image/goods/2021-04-26/6086318a9deeb.png" alt="" class="type-img">
                    <div class="type-row">
                        <div class="type-title">标煤当量</div>
                        <div>本月已用电能耗相当于燃烧标准<text class="used-val">285.35</text>吨</div>
                    </div>
                </div>
                <div class="type-li" style="background-color: #59493F;">
                    <img src="https://lionfishosspro.zmpgshop.com/Uploads/image/goods/2021-04-26/6086318a9deeb.png" alt="" class="type-img">
                    <div class="type-row">
                        <div class="type-title">标煤当量</div>
                        <div>本月已用电能耗相当于燃烧标准<text class="used-val">285.35</text>吨</div>
                    </div>
                </div>
                <div class="type-li" style="background-color: #22AC38;">
                    <img src="https://lionfishosspro.zmpgshop.com/Uploads/image/goods/2021-04-26/6086318a9deeb.png" alt="" class="type-img">
                    <div class="type-row">
                        <div class="type-title">标煤当量</div>
                        <div>本月已用电能耗相当于燃烧标准<text class="used-val">285.35</text>吨</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="echarts-container">
            <!-- 为 ECharts 准备一个具备大小（宽高）的 DOM -->
            <div id="main" style="width: 100%;height:400px;"></div>

        </div>
    </div>
    <script>
        var chartDom = document.getElementById('main');
        var myChart = echarts.init(chartDom);
        var option;

        option = {
            title: {
                text: '堆叠区域图'
            },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                    type: 'cross',
                    label: {
                        backgroundColor: '#6a7985'
                    }
                }
            },
            legend: {
                data: ['邮件营销', '联盟广告', '视频广告', '直接访问', '搜索引擎']
            },
            toolbox: {
                feature: {
                    saveAsImage: {}
                }
            },
            grid: {
                left: '3%',
                right: '4%',
                bottom: '3%',
                containLabel: true
            },
            xAxis: [
                {
                    type: 'category',
                    boundaryGap: false,
                    data: ['周一', '周二', '周三', '周四', '周五', '周六', '周日']
                }
            ],
            yAxis: [
                {
                    type: 'value'
                }
            ],
            series: [
                {
                    name: '邮件营销',
                    type: 'line',
                    stack: '总量',
                    areaStyle: {},
                    emphasis: {
                        focus: 'series'
                    },
                    data: [120, 132, 101, 134, 90, 230, 210]
                },
                {
                    name: '联盟广告',
                    type: 'line',
                    stack: '总量',
                    areaStyle: {},
                    emphasis: {
                        focus: 'series'
                    },
                    data: [220, 182, 191, 234, 290, 330, 310]
                },
                {
                    name: '视频广告',
                    type: 'line',
                    stack: '总量',
                    areaStyle: {},
                    emphasis: {
                        focus: 'series'
                    },
                    data: [150, 232, 201, 154, 190, 330, 410]
                },
                {
                    name: '直接访问',
                    type: 'line',
                    stack: '总量',
                    areaStyle: {},
                    emphasis: {
                        focus: 'series'
                    },
                    data: [320, 332, 301, 334, 390, 330, 320]
                },
                {
                    name: '搜索引擎',
                    type: 'line',
                    stack: '总量',
                    label: {
                        show: true,
                        position: 'top'
                    },
                    areaStyle: {},
                    emphasis: {
                        focus: 'series'
                    },
                    data: [820, 932, 901, 934, 1290, 1330, 1320]
                }
            ]
        };

        option && myChart.setOption(option);
    </script>
</body>
</html>
