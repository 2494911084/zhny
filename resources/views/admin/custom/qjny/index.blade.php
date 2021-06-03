
<div class="row">
  <div class="col-md-8">
    <!-- 定义地图显示容器 -->
    @if($project)
    <form class="form-inline" action="{{url('admin/qjny')}}" style="margin-bottom:10px;" method="POST">
    @csrf
    @method('POST')
      <div class="form-group">
        <select name="project_id" id="" style="width:100%" class="form-control">
          <option value="">请选择需要查看的项目</option>
          @foreach ($projects as $item)
            <option value="{{$item['id']}}" {{$item['id']==$project['id']?"selected":''}}>{{$item['title']}}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <input type="text" name="project_name" class="form-control">
      </div>
      <button type="submit" class="btn btn-default">查询</button>
      </form>
      <div class="row">
        <div class="col-md-6">
            <img src="{{ config('app.url') . '/uploads/' .$project['image'] }}" width="100%" height="500px" alt="">
        </div>
        <div class="col-md-6">
            <h1 style="text-align:center;background-color: rgb(242, 255, 255)">{{ $project['title'] }}</h1>
<hr>
<canvas id="myChart" hegith="500"></canvas>
<script>
$(function () {
    var ctx = document.getElementById("myChart").getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['光伏发电', '其他能源'],
            datasets: [    {
              label: 'Dataset 1',
              data: ['599','125'],
              backgroundColor: ['red', 'Orange'],
            }]
        },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: '绿色能源'
                },
                tooltips: {
                    mode: 'index',
                    intersect: true
                }
            }
    });
});
</script>
        </div>
      </div>
      @endif
  </div>
<style>
  .text-white {
    color: white;
  }
</style>
  <div class="col-md-4">
    <div class="list-group" style="height:500px;margin-top:30px;">
      <a href="#" class="list-group-item" style="height: 25%;background-color:rgb(75, 59, 226);">
        <img src="/images/zhnyi0.png" alt="" style="float: left;padding-top:20px;margin-left:25px">
        <h4 class="text-white" style="margin-left: 120px;margin-top:20px;">本月能耗:1244 MWh</h4>
        <h4 class="text-white" style="margin-left: 120px;margin-top:40px;">上月同期:1244 MWh</h4>
      </a>
      <a href="#" class="list-group-item" style="height: 25%;background-color:rgb(178, 136, 80);">
        <img src="/images/zhnyi1.png" alt="" style="float: left;padding-top:20px;margin-left:25px">
        <h3 class="text-white" style="margin-left: 120px">标煤当量</h3>
        <p class="list-group-item-text text-white" style="margin-left: 120px;margin-top:25px;">本月电能耗相当于燃烧标准:  408.09  吨        </p>
      </a>
      <a href="#" class="list-group-item" style="height: 25%;background-color:rgb(89, 73, 63);">
        <img src="/images/zhnyi2.png" alt="" style="float: left;padding-top:20px;margin-left:25px">
        <h3 class="text-white" style="margin-left: 120px">碳足迹</h3>
        <p class="list-group-item-text text-white" style="margin-left: 120px;margin-top:25px;">本月用电能耗相当于碳排放:  1,240.44  吨        </p>
      </a>
      <a href="#" class="list-group-item" style="height: 25%;background-color:rgb(34, 172, 56);">
        <img src="/images/zhnyi3.png" alt="" style="float: left;padding-top:20px;margin-left:25px">
        <h3 class="text-white" style="margin-left: 120px">植树当量</h3>
        <p class="list-group-item-text text-white" style="margin-left: 120px;margin-top:25px;">本月用电总能耗相当于需植树:  8,269.60  棵</p>
      </a>
    </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-12">

    <span> </span>
    {{-- <canvas id="myChart" width="850" width="850" height="200"></canvas> --}}
    <canvas id="bar-line" width="850" height="200" ></canvas>
    <script>
    $(function () {
        function randomScalingFactor() {
            return Math.floor(Math.random() * 100)
        }
        window.chartColors = {
            red: 'rgb(255, 99, 132)',
            orange: 'rgb(255, 159, 64)',
            yellow: 'rgb(255, 205, 86)',
            green: 'rgb(75, 192, 192)',
            blue: 'rgb(54, 162, 235)',
            purple: 'rgb(153, 102, 255)',
            grey: 'rgb(201, 203, 207)'
        };
        var chartData = {
            labels: ['1日', '2日', '3日', '4日', '5日', '6日', '7日', '8日', '9日', '10日','11日', '12日', '13日', '14日', '15日', '16日', '17日', '18日'
            , '19日', '20日','21日', '22日', '23日', '24日', '25日', '26日', '27日', '28日', '29日', '30日', '31日'],
            datasets: [{
                type: 'bar',
                label: '本月',
                backgroundColor: window.chartColors.red,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ],
                borderColor: 'white',
                borderWidth: 2
            }, {
                type: 'bar',
                label: '上月',
                backgroundColor: window.chartColors.green,
                data: [
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor(),
                    randomScalingFactor()
                ]
            }]
        };
        var ctx = document.getElementById('bar-line').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: chartData,
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: '能耗趋势'
                },
                tooltips: {
                    mode: 'index',
                    intersect: true
                }
            }
        });
    });
    </script>
  </div>
</div>

</body>
</html>
