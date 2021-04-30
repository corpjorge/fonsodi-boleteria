@extends('layouts.app')

@section('htmlheader_title')
	{{ trans('message.home') }}
@endsection


@section('main-content')
<section class="content-header">
    <h1>Eventos
    <small>Inscríbete al evento que deseas asistir</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> {{ trans('message.level') }}</li>
		<li><a href="{{ url('/inscripcion')}}">Eventos</a></li>

    </ol>
</section>
<br>

	<div class="container-fluid spark-screen">
		<div class="row">

			<br>
			<h2 style="left: 22px;position: absolute;" >Felicitaciones</h2>

			@if(session()->has('message'))
			 <div class="alert alert-success alert-dismissible">
								 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 <h4><i class="icon fa fa-check"></i></h4>
								 {{session()->get('message')}}
							 </div>
			@endif

			@if(session()->has('messageerror'))
			 <div class="alert alert-danger alert-dismissible">
								 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								 {{session()->get('messageerror')}}
							 </div>
			@endif

				<div class = "row">
				@foreach($eventos as $evento)
				<?php  $url = Storage::url($evento->img)?>

				   <div class = "col-sm-6 col-md-3">
				      <a href = "{{url('inscripcion/'.$evento->id)}}" class = "thumbnail">
				         <img src = "{{$url}}" alt = "img">
								 <p>{{$evento->title}}</p>
				      </a>
				   </div>

				@endforeach
				</div>
@endsection
