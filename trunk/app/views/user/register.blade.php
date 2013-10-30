@extends('/templates.default')

@section('menu')
@stop

@section('title')
	Register
@stop

@section('content')
	<h1>Register</h1>
	<p>Please fill-in all your information correctly.</p>
	{{ Form::open(array('route' => 'user/register')) }}
	<table>
		<tr>
			<th>Display Name</th>
			<td>
				{{ Form::text('name') }}
				{{ $errors->first('name', '<p class="error">:message</p>') }}
			</td>
		</tr>
		<tr>
			<th>Username</th>
			<td>
				{{ Form::text('username') }}
				{{ $errors->first('username', '<p class="error">:message</p>') }}
			</td>
		</tr>
		<tr>
			<th>Password</th>
			<td>
				{{ Form::password('password') }}
				{{ $errors->first('password', '<p class="error">:message</p>') }}
			</td>
		</tr>
		<tr>
			<th>Repeat Password</th>
			<td>{{ Form::password('password_confirmation') }}</td>
		</tr>
		<tr>
			<th>Email</th>
			<td>
				{{ Form::email('email') }}
				{{ $errors->first('email', '<p class="error">:message</p>') }}
			</td>
		</tr>
		<tr>
			<td colspan="2">
				{{ Form::submit('Register!') }}
			</td>
		</tr>
	</table>
	{{ Form::close() }}
@stop