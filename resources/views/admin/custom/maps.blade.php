<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hello world!</title>
    <style type="text/css">
    #mapContainer{
        /*地图(容器)显示大小*/
        width:100%;
        height:100%;
    }
    </style>
    <!--引入Javascript API GL，参数说明参见下文-->
    <script src="https://map.qq.com/api/gljs?v=1.exp&key=OB4BZ-D4W3U-B7VVO-4PJWW-6TKDJ-WPB77"></script>
    <script>
    var map = null;
    var label = null;
    var infoDom = document.getElementById('info');
    var bindBtn = document.getElementById('bindClick');
    var unbindBtn = document.getElementById('unbindClick');
    function initMap() {
        var center = new TMap.LatLng('40.040452','116.274486' );//设置中心点坐标
        //初始化地图
        map = new TMap.Map('mapContainer', {
            center: center,
            zoom: 5
        });

        //创建marker事件
        function createMarker(id,latitude,longitude,title) {
          marker = new TMap.MultiMarker({
                    id: id,
                    map: map,
                    styles: {
                        "marker": new TMap.MarkerStyle({
                            "width": 25,
                            "height": 35,
                            "anchor": { x: 16, y: 32 },
                            "src": 'https://mapapi.qq.com/web/lbs/javascriptGL/demo/img/markerDefault.png'
                        })
                    },
                    geometries: [{
                        "id": 'demo',
                        "styleId": 'marker',
                        "position": new TMap.LatLng(latitude, longitude),
                        "properties": {
                            "title": "marker"
                        }
                    }]
                });

            //初始化infoWindow
            var infoWindow = new TMap.InfoWindow({
                map: map,
                position: new TMap.LatLng(39.984104, 116.307503),
                offset: { x: 0, y: -32 } //设置信息窗相对position偏移像素
            });
            infoWindow.close();//初始关闭信息窗关闭
            //监听标注点击事件
            marker.on("click", function (evt) {
                //设置infoWindow
                infoWindow.open(); //打开信息窗
                infoWindow.setPosition(evt.geometry.position);//设置信息窗位置
                infoWindow.setContent(title);//设置信息窗内容
            })
        }
      @foreach ($projects as $project)
      createMarker('{{ $project->id }}','{{ $project->latitude }}','{{ $project->longitude }}','{{ $project->title }}')
      @endforeach
    }
</script>
</head>
<!-- 页面载入后，调用init函数 -->
<body onload="initMap()">
<div class="row">
  <div class="col-md-12">
    <!-- 定义地图显示容器 -->
    {{-- <form class="form-inline" action="{{url('admin/qjny')}}" style="margin-bottom:10px;" method="POST">
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
      </form> --}}
    <div id="mapContainer"></div>
  </div>
<style>
  .text-white {
    color: white;
  }
</style>
</div>

</body>
</html>
