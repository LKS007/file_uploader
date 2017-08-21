@extends('layouts.app')

@section('content')

<div class="container">


<h1>Edit {{ $edit_file->filename }}</h1>

<!-- if there are creation errors, they will show here -->

{{ Form::model($edit_file, array('route' => array('files.update', $edit_file->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('filename', 'Name') }}
        {{ Form::text('filename', $edit_file->filename, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('uploader_email', 'Email') }}
        {{ Form::email('uploader_email', $edit_file->uploader_email, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('', 'Create at:') }}
        {{ $edit_file->created_at }}
    </div>

    {{ Form::submit('Edit the File!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

{!! Form::open(['method' => 'DELETE', 'route' => array('files.update',  $edit_file->id)]) !!}
{{ Form::submit('Remove File!', array('class' => 'btn btn-info my_own_button')) }}
{{ Form::close() }}
</div>

@endsection
