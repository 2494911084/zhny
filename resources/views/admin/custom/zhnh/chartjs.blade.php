<link rel="stylesheet" href="/css/mycss.css">
<script src="/js/layer/layer.js"></script>
<h1 class="text-center bg-info" style="padding: 10px;">
  {{ $project['title'] }}
</h1>
<hr>
<ul class="nav nav-tabs">
  <li role="presentation" class="{{ $lx==1?'active':'' }}"><a href="/admin/zhnh?dateTime={{ $dateTime }}&lx=1&project_id={{ $project['id'] }}">标煤当量</a></li>
  <li role="presentation" class="{{ $lx==2?'active':'' }}"><a href="/admin/zhnh?dateTime={{ $dateTime }}&lx=2&project_id={{ $project['id'] }}">电</a></li>
  <li role="presentation" class="{{ $lx==3?'active':'' }}"><a href="/admin/zhnh?dateTime={{ $dateTime }}&lx=3&project_id={{ $project['id'] }}">水</a></li>
  <li role="presentation" class="{{ $lx==4?'active':'' }}"><a href="/admin/zhnh?dateTime={{ $dateTime }}&lx=4&project_id={{ $project['id'] }}">气</a></li>
  <li role="presentation" class="{{ $lx==5?'active':'' }}"><a href="/admin/zhnh?dateTime={{ $dateTime }}&lx=5&project_id={{ $project['id'] }}">光伏</a></li>
</ul>

<div class="btn-group" style="margin-top:15px;margin-left:15px;" role="group" aria-label="...">
  <a href="/admin/zhnh?dateTime={{ $dateTime }}&lx={{ $lx }}&d=1&project_id={{ $project['id'] }}"><button type="button" class="btn btn-default">日</button></a>
  <a href="/admin/zhnh?dateTime={{ $dateTime }}&lx={{ $lx }}&d=2&project_id={{ $project['id'] }}"><button type="button" class="btn btn-default">月</button></a>
  <a href="/admin/zhnh?dateTime={{ $dateTime }}&lx={{ $lx }}&d=3&project_id={{ $project['id'] }}"><button type="button" class="btn btn-default">年</button></a>
</div>
<canvas id="myChart" width="1000" height="200"></canvas>

<div class="panel panel-default"style="margin-top:15px;">
  <div class="panel-heading">能源结构</div>
  <div class="panel-body">
    <table class="table">
      <tr class="text-center">
        <td>
          <span>标煤当量</span>
          <div class="Odiv" style="margin-top:10px;background-color:rgb(68, 138, 202);">
            <span style="line-height: 100px;">吨标煤</span>
          </div>
        </td>
        <td>
            <span>水</span>
            <div class="Odiv" style="margin-top:10px;background-color:rgb(19, 181, 177);">
              <span style="line-height: 100px;">吨</span>
            </div>
        </td>
        <td>
            <span>电</span>
            <div class="Odiv" style="margin-top:10px;background-color:rgb(160, 202, 1);">
              <span style="line-height: 100px;">万千瓦时</span>
            </div>
        </td>
        <td>
            <span>汽</span>
            <div class="Odiv" style="margin-top:10px;background-color:rgb(0, 183, 238);">
              <span style="line-height: 100px;">万Nm3</span>
            </div>
        </td>
        <td>
            <span>光伏</span>
            <div class="Odiv" style="margin-top:10px;">
              <span style="line-height: 100px;">单位</span>
            </div>
        </td>
      </tr>
      <tr class="text-center">
        <td>当日: -</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
      </tr>
      <tr class="text-center">
        <td>环比: -</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
      </tr>
      <tr class="text-center">
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        <td>-</td>
      </tr>
    </table>
  </div>
</div>
<script>
$(function () {
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["2021-05-28 10:43:35","2021-05-28 10:21:55","2021-05-28 10:04:48","2021-05-28 10:02:10","2021-05-28 10:00:15","2021-05-28 10:00:15","2021-05-28 10:00:15","2021-05-28 10:00:15","2021-05-28 09:51:00","2021-05-28 09:49:48","2021-05-28 09:48:50","2021-05-28 09:41:00","2021-05-28 09:38:35","2021-05-28 09:38:35","2021-05-28 09:38:35","2021-05-28 09:38:35","2021-05-28 09:35:30","2021-05-28 09:34:48","2021-05-28 09:31:00","2021-05-28 09:22:10","2021-05-28 09:21:00","2021-05-28 09:19:48","2021-05-28 09:16:55","2021-05-28 09:16:55","2021-05-28 09:16:55","2021-05-28 09:16:55","2021-05-28 09:11:00","2021-05-28 09:08:50","2021-05-28 09:04:48","2021-05-28 09:01:00","2021-05-28 08:55:30","2021-05-28 08:55:15","2021-05-28 08:55:15","2021-05-28 08:55:15","2021-05-28 08:55:15","2021-05-28 08:51:00","2021-05-28 08:49:48","2021-05-28 08:42:10","2021-05-28 08:41:00","2021-05-28 08:34:48","2021-05-28 08:33:35","2021-05-28 08:33:35","2021-05-28 08:33:35","2021-05-28 08:33:35","2021-05-28 08:31:00","2021-05-28 08:28:50","2021-05-28 08:21:00","2021-05-28 08:19:48","2021-05-28 08:15:30","2021-05-28 08:11:55","2021-05-28 08:11:55","2021-05-28 08:11:55","2021-05-28 08:11:55","2021-05-28 08:11:00","2021-05-28 08:04:48","2021-05-28 08:02:10","2021-05-28 08:01:00","2021-05-28 07:51:00","2021-05-28 07:50:15","2021-05-28 07:50:15","2021-05-28 07:50:15","2021-05-28 07:50:15","2021-05-28 07:49:48","2021-05-28 07:48:50","2021-05-28 07:41:00","2021-05-28 07:35:30","2021-05-28 07:34:48","2021-05-28 07:31:00","2021-05-28 07:28:35","2021-05-28 07:28:35","2021-05-28 07:28:35","2021-05-28 07:28:35","2021-05-28 07:22:10","2021-05-28 07:21:00","2021-05-28 07:19:48","2021-05-28 07:11:00","2021-05-28 07:08:50","2021-05-28 07:06:55","2021-05-28 07:06:55","2021-05-28 07:06:55","2021-05-28 07:06:55","2021-05-28 07:04:48","2021-05-28 07:01:00","2021-05-28 06:55:30","2021-05-28 06:51:00","2021-05-28 06:49:48","2021-05-28 06:45:15","2021-05-28 06:45:15","2021-05-28 06:45:15","2021-05-28 06:45:15","2021-05-28 06:42:10","2021-05-28 06:41:00","2021-05-28 06:34:48","2021-05-28 06:31:00","2021-05-28 06:28:50","2021-05-28 06:23:35","2021-05-28 06:23:35","2021-05-28 06:23:35","2021-05-28 06:23:35","2021-05-28 06:21:00","2021-05-28 06:19:48","2021-05-28 06:15:30","2021-05-28 06:11:00","2021-05-28 06:04:48","2021-05-28 06:02:10","2021-05-28 06:01:55","2021-05-28 06:01:55","2021-05-28 06:01:55","2021-05-28 06:01:55","2021-05-28 06:01:00","2021-05-28 05:51:00","2021-05-28 05:49:48","2021-05-28 05:48:50","2021-05-28 05:41:00","2021-05-28 05:40:15","2021-05-28 05:40:15","2021-05-28 05:40:15","2021-05-28 05:40:15","2021-05-28 05:35:30","2021-05-28 05:34:48","2021-05-28 05:31:00"],
            datasets: [{
                label: "{{$data['name']}}",
                data: [{{$data['data']}}],
                backgroundColor:'rgba(75, 192, 192, 0.6)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
});
</script>
