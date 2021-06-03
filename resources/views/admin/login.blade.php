<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8" />
<title>登录</title>
<link rel="stylesheet" type="text/css" href="/css/index.css" />
</head>

<body>

<img class="bgone" src="/img/1.jpg" />
<img class="pic" src="/img/c.png" />

<form action="{{ admin_url('auth/login') }}" method="post">
<div class="table" style="border-radius:10px;">
	<div class="wel">综合能源管理后台</div>

	<!-- <div class="wel1">MOU MOU XI TONG HUO TAI DENG LU</div> -->
	<div class="user">
		@if($errors->has('username'))
          @foreach($errors->get('username') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
          @endforeach
        @endif
		<div id="yonghu" style=""><img src="/img/yhm.png" /></div>
		<input type="text" name="username" placeholder="用户名" />
	</div>
	<div class="password">
		@if($errors->has('password'))
          @foreach($errors->get('password') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label><br>
          @endforeach
        @endif
		<div id="yonghu"><img src="/img/mm.png" /></div>
		<input type="password" name="password" placeholder="密码"/>
	</div>

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('admin.login') }}</button>
</div>
</form>
</body>
</html>
