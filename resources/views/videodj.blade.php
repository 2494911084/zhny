<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>对讲</title>
  <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.js"></script>

</head>
<body>
<div id="ui-talk"></div>
<script>
  var ezuikitTalkData = {
    // 应用accessToken
    accessToken:"{{ $video->token }}",
    // 包含设备信息的ezopen协议
    ezopen:"{{ $video->video_url  }}",
    // 当前页面与插件主文件ezuiit-talk相对路径
    decoderPath: '/EZUIKit-JavaScript'
  };
  $("#ui-talk").load("/EZUIKit-JavaScript/ui_voice.html");
</script>
</body>
</html>
