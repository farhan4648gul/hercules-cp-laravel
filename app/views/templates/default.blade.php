<!DOCTYPE html>
<html>
	<head>
		<title>@yield('title')</title>
	</head>
	<body>
		<div class="wrapper">
			@section('panel')
				@include('/commons.panel')
			@stop
			@yield('panel')
			@yield('content')
		</div>
	</body>
</html>