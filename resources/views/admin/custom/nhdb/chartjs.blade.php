<link rel="stylesheet" href="/css/mycss.css">
<script src="/js/layer/layer.js"></script>
<h1 class="text-center bg-info" style="padding: 10px;">
  {{ $project['title'] }}
</h1>
<hr>

<form class="form-inline" style="margin-top: 10px;">

  <div class="form-group">
    <label for="pro">项目</label>
    <select name="project_id" class="form-control"  id="pro">
      @foreach($projects as $item)
        <option value="{{$item['id']}}" {{$item['id'] == $project['id'] ?'selected':''}}>{{$item['title']}}</option>
      @endforeach
    </select>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;
  <div class="form-group">
    <label for="exampleInputName2">时间</label>
    <input type="date" class="form-control" id="exampleInputName2" placeholder="Jane Doe">
  </div>
  <div class="form-group">
    <input type="date" class="form-control" id="exampleInputEmail2" placeholder="jane.doe@example.com">
  </div>

  <div class="form-group">
    <label for="exampleInputName2">能源类型</label>
    <select  class="form-control">
      <option>电</option>
      <option>水</option>
      <option>气</option>
      <option>光伏</option>
    </select>
  </div>
  <input type="hidden" name="project" value="{{ $project['id'] }}">
  &nbsp;&nbsp;&nbsp;&nbsp;
  <button type="submit" class="btn btn-default">查询</button>
</form>

<canvas id="myChart" width="460" height="200"></canvas>


<script>
$(function () {
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: '能耗',
                data: [],
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
