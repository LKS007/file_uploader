@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Hello {{ $user->name }}</h1>

    <!-- if there are creation errors, they will show here -->

    
        <div class="form-group">
            <label>You Name: </label>
            {{ $user->name}}
        </div>

        <div class="form-group">
            <label>Email</label>
            {{ $user->email }}
        </div>

        
    
    
  </div>
@endsection
