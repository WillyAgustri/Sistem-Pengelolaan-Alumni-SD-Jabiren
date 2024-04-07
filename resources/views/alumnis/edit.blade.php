@extends('default')

@section('content')

	@if($errors->any())
		<div class="alert alert-danger">
			@foreach ($errors->all() as $error)
				{{ $error }} <br>
			@endforeach
		</div>
	@endif

	{{ Form::model($alumnus, array('route' => array('alumnis.update', $alumnus->id), 'method' => 'PUT')) }}

		<div class="mb-3">
			{{ Form::label('name', 'Name', ['class'=>'form-label']) }}
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('nisn', 'Nisn', ['class'=>'form-label']) }}
			{{ Form::text('nisn', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('id_tahun', 'Id_tahun', ['class'=>'form-label']) }}
			{{ Form::text('id_tahun', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('j_kelamin', 'J_kelamin', ['class'=>'form-label']) }}
			{{ Form::text('j_kelamin', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tmpt_lahir', 'Tmpt_lahir', ['class'=>'form-label']) }}
			{{ Form::text('tmpt_lahir', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('tgl_lahir', 'Tgl_lahir', ['class'=>'form-label']) }}
			{{ Form::text('tgl_lahir', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('phone_num', 'Phone_num', ['class'=>'form-label']) }}
			{{ Form::text('phone_num', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('alamat', 'Alamat', ['class'=>'form-label']) }}
			{{ Form::text('alamat', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('foto', 'Foto', ['class'=>'form-label']) }}
			{{ Form::textarea('foto', null, array('class' => 'form-control')) }}
		</div>
		<div class="mb-3">
			{{ Form::label('password', 'Password', ['class'=>'form-label']) }}
			{{ Form::text('password', null, array('class' => 'form-control')) }}
		</div>

		{{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

	{{ Form::close() }}
@stop
