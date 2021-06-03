
<meta name="csrf-token" content="{{ csrf_token() }}">
<ul class="nav nav-tabs">
  <li role="presentation" form_id="1" class="active clicks"><a >上传频率控制</a></li>
  <li role="presentation" form_id="2" class="clicks"><a >继电器控制</a></li>
</ul>
<form class="form-inline form1" style="margin-top:10px;">
  <div class="form-group" style="margin-right:10px;">
    <label for="exampleInputName2">选择设备</label>
    <select class="form-control" name="equipment_id">
      <option value="">请选择设备</option>.
      @foreach ($equipment->all() as $v)
        <option value="{{ $v['id'] .'|'. $v['sn'] .'|'. $v['mac'] }}">{{ $v['name'] }}</option>.
      @endforeach
    </select>
  </div>
  <div class="form-group" style="margin-right:10px;">
    <label for="exampleInputEmail2">上传频率</label>
    <select class="form-control" name="up_pl">
      @foreach ($equipment->uppl as $k => $v)
        <option value="{{$k}}">{{ $v }}</option>.
      @endforeach
    </select>
  </div>
  <input type="hidden" name="_token" value="'.csrf_token().'">
  <button class="btn btn-default button1">提交</button>
</form>
<form class="form-inline form2" style="margin-top:10px;display:none;">
  <div class="form-group" style="margin-right:10px;">
    <label for="exampleInputName2">选择设备</label>
    <select class="form-control" name="equipment_id">
      @foreach ($equipment->all() as $v)
        <option value="{{ $v['id'] .'|'. $v['sn'] .'|'. $v['mac'] }}">{{ $v['name'] }}</option>.
      @endforeach
    </select>
  </div>
  <div class="form-group" style="margin-right:10px;">
    <label for="exampleInputEmail2">开关1</label>
    <select class="form-control" name="kg1">
      <option value="0">关</option>
      <option value="1">开</option>
    </select>
  </div>
  <div class="form-group" style="margin-right:10px;">
    <label for="exampleInputEmail2">开关2</label>
    <select class="form-control" name="kg2">
      <option value="0">关</option>
      <option value="1">开</option>
    </select>
  </div>
  <div class="form-group" style="margin-right:10px;">
    <label for="exampleInputEmail2">开关3</label>
    <select class="form-control" name="kg3">
      <option value="0">关</option>
      <option value="1">开</option>
    </select>
  </div>
  <div class="form-group" style="margin-right:10px;">
    <label for="exampleInputEmail2">开关4</label>
    <select class="form-control" name="kg4">
      <option value="0">关</option>
      <option value="1">开</option>
    </select>
  </div>
  <input type="hidden" name="_token" value="'.csrf_token().'">
  <button type="" class="btn btn-default button2">提交</button>
</form>
<script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>
<script>
  $('.clicks').on('click', function(){
    $('.clicks').removeClass("active");
    $(this).addClass("active");
    var form_id = $(this).attr('form_id');
    $('form').hide();
    $('.form'+form_id).show();
  });
  function register(data) {
    $.ajax({
      type: "POST",
      url: "{{ url('/admin/equipments/equipmentkz') }}",
      dataType: 'json',
      header: {'X-CRSF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: data,
      success: function (data) {
        alert('发送成功');
        location.reload();
      },
      error: function(request, status, error){
        alert(error);
      },
    });
  };
  function set_cycle(slave_id,cycle_time){
    var secondary = new Uint8Array(6);
    secondary[0]= 1;
    secondary[1]= slave_id;
    secondary[2]= cycle_time&0XFF;
    secondary[3]= (cycle_time>>8)&0XFF;
    secondary[4]= (cycle_time>>16)&0XFF;
    secondary[5]= (cycle_time>>24)&0XFF;
    return secondary;
  }
  /***

   slave_id  从机id
   state_arry 从机输出状态数组，共四个元素，元素0是Y1的状态 元素1是Y2的状态 元素2是Y3的状态 元素3是Y4的状态  1表示开  0表示关
   ***/
  function ctr_allfunc(slave_id,state_arry){
    if (state_arry.length!= 4){
      return;
    }
    var sendarry = new Uint8Array(4);
    sendarry[0]=2;
    sendarry[1]=slave_id;
    sendarry[2] = 0X0F;
    sendarry[3]  = 0;
    for (var i=0;i<4;i++){
      if(state_arry[i] == 1){
        sendarry[3]  = 1<<i ;
      }
    }
    return sendarry;
  }

  $('.button1').on('click', function(){
    event.preventDefault();
    var equipment = $('.form1 [name=equipment_id]').val();
    if (equipment){
      var equipment = equipment.split('|');

      var equipment_id = equipment[0];
      var sn = equipment[1];
      var mac = equipment[2];
      var up_pl = $("[name=up_pl] option:selected").val();
      var cyc = set_cycle(sn,up_pl);

      var data = {"equipment_id": equipment_id, "sn":sn, "up_pl": up_pl, "cyc": cyc}
      console.log(data)
      var topic = 'pl/' + mac;
      var payload = cyc;
      mqtts(topic,payload);
      //上后台更新设备表中的上传频率数据
      register(data);
    }
  })

  $('.button2').on('click', function(){
    event.preventDefault();
    var equipment = $('.form2 [name=equipment_id]').val();

    if (equipment){
      var equipment = equipment.split('|');

      var equipment_id = equipment[0];
      var sn = equipment[1];
      var mac = equipment[2];
      var state_arry = [];
      state_arry[0] = $("[name=kg1] option:selected").val();
      state_arry[1] = $("[name=kg2] option:selected").val();
      state_arry[2] = $("[name=kg3] option:selected").val();
      state_arry[3] = $("[name=kg4] option:selected").val();
      var kg = ctr_allfunc(sn,state_arry);

      // var data = {"equipment_id": equipment_id, "sn":sn, "up_pl": up_pl, "cyc": cyc}
      // console.log(data)
      var topic = 'pl/' + mac;
      var payload = kg;
      mqtts(topic,payload);
      //更新继电器状态
      // register(data);
    }
  })

  function mqtts(topic,payload)
  {
    var options = {
      //mqtt客户端的id
      clientId: 'yq_' + Math.random().toString(16).substr(2, 8)
    }
    var client = mqtt.connect("ws://101.132.98.68:8083/mqtt",options) // you add a ws:// url here
    //建立连接
    client.on('connect', function () {
      console.log("connect success!")
      client.publish(topic, payload)
    })
  }
</script>
