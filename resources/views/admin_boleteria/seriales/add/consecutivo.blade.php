@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.home') }}
@endsection

@section('main-content')
<section class="content-header">
    <h1>Seriales Consecutivo
    <small>Ingreso de seriales Consecutivo</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('Paginal') }}</li>
		<li><a href="{{ url('/admin_boleteria')}}">Boletería</a></li>
			  <li><a href="{{ url('admin_boleteria/seriales/')}}">Seriales</a></li>
        <li class="active"><a href="#">Ingreso consecutivo</a></li>
    </ol>
</section>
<br>

	<div class="container-fluid spark-screen">
		<div class="row">

		@include('admin_boleteria.seriales.atras')

		<div class="">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Añadir Seriales</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin_boleteria/seriales/add/cant') }}" method="post">
							@if (count($errors) > 0)
			            <div class="alert alert-danger">
			                <strong>Whoops!</strong> {{ trans('message.someproblems') }}<br><br>
			                <ul>
			                    @foreach ($errors->all() as $error)
			                        <li>{{ $error }}</li>
			                    @endforeach
			                </ul>
			            </div>
			        @endif

							@if(session()->has('message'))
						 	 <div class="alert alert-danger alert-dismissible">
						 						 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						 						 <h4><i class="icon fa fa-exclamation-triangle"></i> Error!</h4>
						 						 {{session()->get('message')}}
						 					 </div>
						  @endif

							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="hidden" name="consecutivo" value="1">

              <div class="box-body">

								<div class="form-group">
 								 <label for="nombre">Cantidad</label>
 								 <input style="color:#555555" type="number" class="form-control" id="nombre" name="cantidad" value="{{$cantidad}}" placeholder="Cantidad">
 							 </div>

								<div class="form-group">
								 <label>Producto</label>
									 <select style="color:#555555" name="producto" class="form-control">
										 	<option></option>
										 @foreach ($productos as $producto)
								 		 	<option style="color:#555555" value="{{$producto->id}}">{{$producto->nombre}}</option>
								 		 @endforeach
									 </select>
							 </div>


							 <div class="form-group">
								 <label>Precio de compra und</label>
								 <input style="color:#555555" type="number" class="form-control" id="Precio_compra" name="precio_compra" placeholder="$ Precio de compra por unidad" onchange="validarNumero(this)" >
							 </div>

							 <div class="form-group">
								 <label>Precio al publico und</label>
								 <input style="color:#555555" type="number" class="form-control" id="Precio_publico" name="precio_publico" placeholder="$ Precio al publico por unidad" onchange="validarNumero(this)">
							 </div>


							 <div class="form-group">
								 <label>fecha de caducidad</label>
								 <input style="color:#555555" type="date" class="form-control" id="fecha_caducidad" name="fecha_caducidad" placeholder="fecha de caducidad" >
							 </div>

							 <div class="form-group">
								 <label for="nombre">Letra Inicial (Opcional)</label>
								 <input style="color:#555555" type="text" class="form-control" id="nombre" name="LetraInicial" placeholder="Letras">
							 </div>

							 <div class="form-group">
								 <label for="nombre">Número Inicial</label>
								 <input style="color:#555555" type="number" class="form-control" id="nombre" name="NumeroInicial" placeholder="Número Inicial">
							 </div>

							 <div class="form-group">
								 <label for="nombre">Número Final</label>
								 <input style="color:#555555" type="number" class="form-control" id="nombre" name="NumeroFinal" placeholder="Número Final">
							 </div>

							 <div class="form-group">
								 <label for="nombre">Letra Final (Opcional)</label>
								 <input style="color:#555555" type="text" class="form-control" id="nombre" name="LetraFinal" placeholder="Letras">
							 </div>


              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div>
            </form>
          </div>

		</div>






		</div>
	</div>


	<script>
		function validarNumero(dato) {
			dato.value = dato.value.replace(/\./g, '');
		}
	</script>
@endsection
