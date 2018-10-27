@extends('admin._layouts.main')

@section('title', config('app.name').' | Inicio')

@section('header', 'Página de Inicio')

@push('styles') 

@endpush @section('content')

<div class="row">
  <h3 class="col-md-3 col-xs-6">Administrar</h3>

</div>
<div class="row">
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-aqua">
        <i class="fa fa-building"></i>
      </span>

      <div class="info-box-content">
        <span class="info-box-text">Empresas</span>
        <br>
        <button type="button" class="btn btn-block btn-info" onclick="window.location.href='{{ route('companies.index') }}'">Gestionar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-green">
        <i class="fa fa-home"></i>
      </span>

      <div class="info-box-content">
        <span class="info-box-text">Sucursales</span>
        <br>
        <button type="button" class="btn btn-block btn-success" onclick="window.location.href='{{ route('branches.index') }}'">Gestionar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-yellow">
        <i class="fa fa-book"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Reservaciones</span>
        <br>
        <button type="button" class="btn btn-block btn-warning" onclick="window.location.href='{{ route('reservations.index') }}'">Gestionar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->  

</div>
<div class="row">
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-blue">
        <i class="fa fa-shopping-cart"></i>
      </span>

      <div class="info-box-content">
        <span class="info-box-text">Productos</span>
        <br>
        <button type="button" class="btn btn-block btn-primary" onclick="window.location.href='{{ route('products.index') }}'">Gestionar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-red">
        <i class="fa fa-user"></i>
      </span>

      <div class="info-box-content">
        <span class="info-box-text">Usuarios</span>
        <br>
        <button type="button" class="btn btn-block btn-danger" onclick="window.location.href='{{ route('users.index') }}'">Gestionar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-md-4 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-gray">
        <i class="fa fa-check"></i>
      </span>
      <div class="info-box-content">
        <span class="info-box-text">Roles</span>
        <br>
        <button type="button" class="btn btn-block btn-default" onclick="window.location.href='{{ route('roles.index') }}'">Gestionar</button>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->  

</div>
<div class="row">
  <h3 class="col-md-3 col-xs-6">Novedades</h3>
</div>
<div class="col-md-6">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title"><b>FoodApp:</b> Tú mejor opción</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
          <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner">
          <div class="item active">
            <img src="http://placehold.it/900x500/39CCCC/ffffff&text=I+Love+Bootstrap" alt="First slide">
            <div class="carousel-caption">
              1
            </div>
          </div>
          <div class="item">
            <img src="http://placehold.it/900x500/3c8dbc/ffffff&text=I+Love+Bootstrap" alt="Second slide">

            <div class="carousel-caption">
              2
            </div>
          </div>
          <div class="item">
            <img src="http://placehold.it/900x500/f39c12/ffffff&text=I+Love+Bootstrap" alt="Third slide">

            <div class="carousel-caption">
              3
            </div>
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="fa fa-angle-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="fa fa-angle-right"></span>
        </a>
      </div>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
</div>
<!-- /.col -->
<div class="col-md-6">
  <div class="box box-primary">
    <div class="box-header with-border">
      <i class="fa fa-bar-chart-o"></i>
      <h3 class="box-title">Ventas por Mes</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse">
          <i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove">
          <i class="fa fa-times"></i>
        </button>
      </div>
    </div>
    <div class="box-body">
      <div id="bar-chart" style="height: 300px;"></div>
    </div>
    <!-- /.box-body-->
  </div>
</div>


<!-- <script src="../../../public/plugins/jquery/dist/jquery.min.js"></script>
<script src="../../../public/plugins/Flot/jquery.flot.js"></script> -->

<!--  C:\MAMP\htdocs\food\public\plugins\jquery\dist\jquery.js -->


@endsection

@push('scripts')
<!-- Code -->

<script src="{{ asset('/plugins/jquery/dist/jquery.min.js')}}"></script>
<script src="{{ asset('/plugins/Flot/jquery.flot.js') }}"></script>
<script src="{{ asset('/plugins/Flot/jquery.flot.categories.js') }}"></script>
<script src="{{ asset('/plugins/Flot/jquery.flot.resize.js') }}"></script> 

<!--
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.categories.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.resize.js"></script>  -->
<script>
  $(function () {

    var bar_data = {
      data: [['Enero', 765], ['Febrero', 1205], ['Marzo', 1354], ['Abril', 1278], ['Mayo', 1003], ['Junio', 1076]],
      color: '#3c8dbc'
    }
    $.plot('#bar-chart', [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: '#f3f3f3',
        tickColor: '#f3f3f3'
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.4,
          align: 'center'
        }
      },
      xaxis: {
        mode: 'categories',
        tickLength: 0
      }
    })
  })
</script> 
@endpush