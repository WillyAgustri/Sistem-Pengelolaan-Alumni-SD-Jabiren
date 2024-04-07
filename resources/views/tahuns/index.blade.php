@extends('default')

@section('content')

	<div class="d-flex justify-content-end mb-3"><a href="{{ route('tahuns.create') }}" class="btn btn-info">Create</a></div>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th>id</th>
				<th>id_tahun</th>
				<th>tahun</th>

				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($tahuns as $tahun)

				<tr>
					<td>{{ $tahun->id }}</td>
					<td>{{ $tahun->id_tahun }}</td>
					<td>{{ $tahun->tahun }}</td>

					<td>
						<div class="d-flex gap-2">
                            <a href="{{ route('tahuns.show', [$tahun->id]) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('tahuns.edit', [$tahun->id]) }}" class="btn btn-primary">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['tahuns.destroy', $tahun->id]]) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
					</td>
				</tr>

			@endforeach
		</tbody>
	</table>

@stop
