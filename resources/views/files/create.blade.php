@extends('layouts.app')

@section('content')
<div class="container">
    
    {{ Form::open(array('action' => 'FileController@store', 'files'=>'true')) }}
        <div class="form-group">
            {{   Form::label('uploader_email', 'Email:') }}
            {{   Form::text('uploader_email', $email, array('class' => 'form-control')) }}          
        </div>

    {{   Form::file('new_file') }}

    {{   Form::submit('Create!', array('class' => 'btn btn-info my_own_button'))  }}
    {{ Form::close() }}
</div>
@endsection
