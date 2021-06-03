<style>
  .ext-icon {
      color: rgba(0,0,0,0.5);
      margin-left: 10px;
  }
  .installed {
      color: #00a65a;
      margin-right: 10px;
  }
  .text-dark {
    color:rgba(0,0,0,0.5);
  }
</style>
<div class="box box-default" style="max-height: 400px;">
  <div class="box-header with-border" style="background-color: rgb(255, 255, 255);">
    <h3 class="box-title" style="color: rgb(0, 0, 0);">项目切换</h3>

      <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
          </button>
          <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body pre-scrollable"  style="max-height: 300px;">
      <ul class="products-list product-list-in-box"  style="max-height: 300px;">

          @foreach($projects as $item)
          <li class="item">
              <div class="product-img">
                  <i class="fa fa-2x ext-icon"></i>
              </div>
              <div class="product-info">
                <h4><a href="{{ url('admin/qjny?project='.$item['id']) }}" class="{{ $project['id']==$item['id']?'product-title':'text-dark' }}">
                  {{$item['title']}}
                </a></h4>
                <p></p>
                @foreach ($item->equipments as $kk => $equipment)
                <p class="text-dark installed">&nbsp;&nbsp;&nbsp;{{ $equipment->name }}</p>
                @endforeach

                  {{-- @if($extension['installed'])
                      <span class="pull-right installed"><i class="fa fa-check"></i></span>
                  @endif --}}
              </div>
          </li>
          @endforeach

          <!-- /.item -->
      </ul>
  </div>
  <!-- /.box-body -->
  <div class="box-footer text-center">
      <a href="{{ url('/admin/projects') }}" class="uppercase">查看所有项目</a>
  </div>
  <!-- /.box-footer -->
</div>
