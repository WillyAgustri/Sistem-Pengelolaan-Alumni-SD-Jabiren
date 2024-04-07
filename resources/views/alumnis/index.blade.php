@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('alumnis.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>nisn</th>
				<th>id_tahun</th>
				<th>j_kelamin</th>
				<th>tmpt_lahir</th>
				<th>tgl_lahir</th>
				<th>phone_num</th>
				<th>alamat</th>
				<th>foto</th>
				<th>password</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($alumnis as $alumnus)

				<tr>
					<td>{{ $alumnus->id }}</td>
					<td>{{ $alumnus->name }}</td>
					<td>{{ $alumnus->nisn }}</td>
					<td>{{ $alumnus->id_tahun }}</td>
					<td>{{ $alumnus->j_kelamin }}</td>
					<td>{{ $alumnus->tmpt_lahir }}</td>
					<td>{{ $alumnus->tgl_lahir }}</td>
					<td>{{ $alumnus->phone_num }}</td>
					<td>{{ $alumnus->alamat }}</td>
					<td>{{ $alumnus->foto }}</td>
					<td>{{ $alumnus->password }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('alumnis.show', [$alumnus->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('alumnis.edit', [$alumnus->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['alumnis.destroy', $alumnus->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
