@section('panel')
	@if (Session::get('error'))
		<div class="error">{{ Session::get('error') }}</div>
	@endif
	@if (Session::get('message'))
		<div class="message">{{ Session::get('message') }}</div>
	@endif
	@if (Auth::check())
		Welcome {{ Auth::user()->name }}!
		<a href="{{ URL::to('user/logout') }}">Log out</a>
	@else
		{{ Form::open(array('route' => 'user/login')) }}
			{{ Form::hidden('login_uri', Route::getCurrentRoute()->getPath()) }}
			{{ Form::label('login_username', 'Username') }}
			{{ Form::text('login_username') }}
			{{ Form::label('login_password', 'Password') }}
			{{ Form::password('login_password') }}
			{{ Form::submit('Log in') }}
		{{ Form::close() }}
	@endif
@stop