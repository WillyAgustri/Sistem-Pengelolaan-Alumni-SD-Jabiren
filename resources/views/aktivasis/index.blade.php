@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('aktivasis.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>name</th>
				<th>nisn</th>
				<th>brks_ijasah</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($aktivasis as $aktivasi)

				<tr>
					<td>{{ $aktivasi->id }}</td>
					<td>{{ $aktivasi->name }}</td>
					<td>{{ $aktivasi->nisn }}</td>
					<td>{{ $aktivasi->brks_ijasah }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('aktivasis.show', [$aktivasi->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('aktivasis.edit', [$aktivasi->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['aktivasis.destroy', $aktivasi->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
