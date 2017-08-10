You need to autorization in admin panel

{!! Form::open(array('url' => 'admin/authorization')) !!}
  {!! Form::label('email', 'E-Mail Address') !!}
  {!! Form::text('email') !!}

  {!! Form::label('password', 'Password') !!}
  {!! Form::password('password') !!}

  {!! Form::submit('Click Me!') !!}
{!! Form::close() !!}
