@extends('default')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }} <br>
            @endforeach
        </div>
    @endif

    {!! Form::open(['route' => 'admins.store']) !!}

    <div class="mb-3">
        {{ Form::label('name', 'Name', ['class' => 'form-label']) }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('username', 'Username', ['class' => 'form-label']) }}
        {{ Form::text('username', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('password', 'Password', ['class' => 'form-label']) }}
        {{ Form::text('password', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('foto', 'Foto', ['class' => 'form-label']) }}
        {{ Form::textarea('foto', null, ['class' => 'form-control']) }}
    </div>
    <div class="mb-3">
        {{ Form::label('phone_num', 'Phone_num', ['class' => 'form-label']) }}
        {{ Form::text('phone_num', null, ['class' => 'form-control']) }}
    </div>

    {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@endsection
