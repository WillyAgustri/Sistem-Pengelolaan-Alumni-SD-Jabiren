@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($aktivasi, array('route' => array('aktivasis.update', $aktivasi->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('name', 'Name', ['class'=>'form-label']) }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('nisn', 'Nisn', ['class'=>'form-label']) }}
			{{ Form::text('nisn', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('brks_ijasah', 'Brks_ijasah', ['class'=>'form-label']) }}
			{{ Form::textarea('brks_ijasah', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
