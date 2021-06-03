
<script src="/js/laydate/laydate.js"></script>
<style>

#test-n1 .layui-laydate-main{width:100%;}
#test-n1 .layui-laydate-content td,#test-n1 .layui-laydate-content th{width:87px;height: 50px;}
</style>
<div style="width: 100%">
<div id="test-n1"></div>
</div>
<script>
laydate.render({
  elem: '#test-n1'
  ,theme: 'molv'
  ,position: 'static'
  ,value: '{{ $dateTime }}' //必须遵循format参数设定的格式
  ,showBottom: false
  ,change: function(value, date, endDate){
    window.location.replace("{{ request()->url() }}?project_id={{ $project['id'] }}&dateTime="+value);
  }
});

  </script>
