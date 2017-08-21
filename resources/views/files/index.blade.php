@extends('layouts.app')

@section('content')

<div class="container">


<h1>All the files</h1>

<!-- will be used to show any messages -->
@if (count($files) == 0)
  You don't have a files!
@else
  <table class="table table-striped table-bordered">
      <thead>
          <tr>
              <td>ID</td>
              <td>Name</td>
              <td>Email</td>
              <td>Create At</td>
              <td>Actions</td>
          </tr>
      </thead>
      <tbody>
      
        @foreach($files as $key => $value)
            <tr>
                <td>{{ $value->id }}</td>
                <td>{{ $value->filename }}</td>
                <td>{{ $value->uploader_email }}</td>
                <td>{{ $value->created_at }}</td>

                <td>

                    {!! Form::open(['method' => 'DELETE', 'class' => 'my_own_form_class', 'route' => array('files.update',  $value->id)]) !!}
                      {{ Form::submit('Remove File!', array('class' => 'btn btn-small btn-success')) }}
                    {{ Form::close() }}

                    <a class="btn btn-small btn-info" href="{{ URL::route('files.edit', $value->id) }}">Edit this File</a>
                    <a class="btn btn-small btn-info" href="{{ URL::route('files.download', $value->id) }}">Download</a>

                </td>
            </tr>
        @endforeach
      </tbody>
  </table>
@endif
</div>
@endsection
