@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.home') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">

			<div class="col-md-6">
		           <div class="box box-solid">
		             <div class="box-header with-border">
		               <h3 class="box-title">Fonsodi</h3>
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
		                     <img src="http://fonsodi.com/images/creditos/img_creditos.jpg" alt="First slide" style="width: 900; ">

		                     <div class="carousel-caption">
		                       Fonsodi
		                     </div>
		                   </div>
		                   <div class="item">
		                     <img src="http://fonsodi.com/images/somos/img_fonsodi1.jpg" alt="Second slide">

		                     <div class="carousel-caption">
		                       Fonsodi
		                     </div>
		                   </div>
		                   <div class="item">
		                     <img src="http://fonsodi.com/images/creditos/img_creditos.jpg" alt="Third slide" >

		                     <div class="carousel-caption">
		                       Fonsodi
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


		<div class="col-lg-3 col-xs-6"><div class="small-box bg-aqua"><div class="inner"><h4>BOLETERIA</h4> <p>Modulo de Boletaria</p></div> <div class="icon"><i class="fa fa-ticket"></i></div> <a href="/boleteria" class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a></div></div>

		<div class="col-lg-3 col-xs-6">
			<div class="small-box bg-navy">
				<div class="inner">
					<h4>ESTADO DE CUENTA</h4>
					<p>Módulo de atención</p>
				</div>
				<div class="icon">
					<i class="fa fa-user"></i>
				</div>
				<a href="{{ url('atencion') }}"class="small-box-footer">Ingresar <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>

		<div class="col-lg-3 col-xs-6 pull-right">
			<div class="small-box bg-gray">
				<div class="inner">
					<h4>TRANSFERENCIA </h4>
					<p>SOLIDARIA</p>
				</div>
				<div class="icon">
					<i class="fa fa-file-text-o"></i>
				</div>
				<a href="{{ url('transferencia') }}"class="small-box-footer">Descargar <i class="fa fa-arrow-circle-down"></i></a>
			</div>
		</div>






			</div>
	</div>


@endsection
