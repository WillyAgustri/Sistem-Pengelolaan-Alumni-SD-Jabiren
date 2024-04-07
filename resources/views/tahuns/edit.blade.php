@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($tahun, array('route' => array('tahuns.update', $tahun->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('id_tahun', 'Id_tahun', ['class'=>'form-label']) }}
			{{ Form::text('id_tahun', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tahun', 'Tahun', ['class'=>'form-label']) }}
			{{ Form::text('tahun', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
