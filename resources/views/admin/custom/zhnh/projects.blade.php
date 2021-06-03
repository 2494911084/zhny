
<div class="box box-default">

  <div class="box-body pre-scrollable">
    <form method="get" action="{{route('admin.zhnh')}}">
      @csrf
      @method('GET')
      <div class="form-group">
        <select name="project_id" class="form-control"  id="">
          @foreach($projects as $item)
          <option value="{{$item['id']}}" {{$item['id'] == $project['id'] ?'selected':''}}>{{$item['title']}}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-default btn-block">切换</button>
    </form>
  </div>
</div>
