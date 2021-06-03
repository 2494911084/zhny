function initMap() {
    //定义地图中心点坐标
    var center=new TMap.LatLng(39.984120,116.307484)
    //定义map变量，调用 TMap.Map() 构造函数创建地图
    var map = new TMap.Map(document.getElementById('qjny-map'), {
        center: center,//设置地图中心点坐标
        zoom:17.2,   //设置地图缩放级别
    });
}
function loadScript() {
var script = document.createElement("script");
script.type = "text/javascript";
script.src = "https://map.qq.com/api/gljs?v=1.exp&key=RXLBZ-7WEL3-NV23U-3XTKL-W7K55-QLBEH&callback=init";
document.body.appendChild(script);
}

window.onload = loadScript;