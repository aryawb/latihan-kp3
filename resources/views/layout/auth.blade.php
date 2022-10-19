<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login - chat!</title>
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<!-- <link href="{{asset('assets/line.css')}}" rel="stylesheet" type="text/css"> -->
	<link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
	<link href="{{asset('assets/css.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('assets/jquery-3.6.1.min.js')}}"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<script src="{{asset('assets/bootstrap.bundle.min.js')}}"></script>
	<script src="{{asset('assets/popper.min.js')}}"></script>
	@livewireStyles

</head>
<body>
	@yield('content')
	@livewireScripts
	<script>
		window.addEventListener('alert', event => {
			toastr[event.detail.type](event.detail.message,
				event.detail.title ?? ''), toastr.options = {
				// "positionClass": "toast-bottom-right",
				"closeButton": true,
				"progressBar": true,
			}
		});
		const signUpButton = document.getElementById('signUp');
		const signInButton = document.getElementById('signIn');
		const container = document.getElementById('container');

		signUpButton.addEventListener('click', () => {
			container.classList.add("right-panel-active");
		});

		signInButton.addEventListener('click', () => {
			container.classList.remove("right-panel-active");
		});

	</script>
</body>
</html>