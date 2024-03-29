@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.home') }}
@endsection

@section('main-content')
<section class="content-header">
    <h1>Usuario añadir
    <small>Ingreso de usuario</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('Paginal') }}</li>
		<li><a href="{{ url('/admin_config/user')}}">Configuracion</a></li>
			  <li><a href="{{ url ('admin_config/user')}}">Usuarios</a></li>
        <li class="active"><a href="#">Añadir</a></li>
    </ol>
</section>
<br>
	<div class="container-fluid spark-screen">
		<div class="row">

		@include('admin.user.atras')

		<div class="">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Añadir Usuario</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin_config/user/') }}" method="post">
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
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">

								<div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input style="color:#555555" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                </div>

								<div class="form-group">
                  <label for="email">Correo</label>
                  <input style="color:#555555" type="text" class="form-control" id="email" name="email" placeholder="Correo electronico">
                </div>

								<div class="form-group">
								 <label>ciudad</label>
									 <select style="color:#555555" name="ciudad" class="form-control">
										 	<option></option>
										 @foreach ($ciudades as $ciudad)
								 		 	<option style="color:#555555" value="{{$ciudad->name}}">{{$ciudad->name}}</option>
								 		 @endforeach
									 </select>
							 </div>


								<div class="form-group">
								 <label>Rol</label>
									 <select style="color:#555555" name="rol" class="form-control">
										 	<option></option>
										 @foreach ($roles as $rol)
								 		 	<option style="color:#555555" value="{{$rol->id}}">{{$rol->name}}</option>
								 		 @endforeach
									 </select>
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
@endsection
