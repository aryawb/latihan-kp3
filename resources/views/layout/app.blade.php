<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Login - chat!</title>
	<!-- <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"> -->
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<!-- <link href="{{asset('assets/line.css')}}" rel="stylesheet" type="text/css"> -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;500;600&family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<!-- 	<link rel="stylesheet" href="https://kk-designs.github.io/dark-mode/dark-mode.css">
	<script src="https://kk-designs.github.io/dark-mode/dark-mode.js"></script> -->
	<link href="{{asset('assets/app.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/app-dark.css')}}" rel="stylesheet" type="text/css">
		<!-- <link class="light" rel="stylesheet" href="{{asset('assets/app.css')}}" type="text/css" media="(prefers-color-scheme: no-preference), (prefers-color-scheme: light)" />
			<link class="dark" rel="stylesheet" href="{{asset('assets/app-dark.css')}}" type="text/css" media="(prefers-color-scheme: dark)" /> -->
			<script src="{{asset('assets/jquery-3.6.1.min.js')}}"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
			<script src="{{asset('assets/bootstrap.bundle.min.js')}}"></script>
			<script src="{{asset('assets/popper.min.js')}}"></script>
			<script src="{{asset('assets/darkmode.js')}}"></script>
			<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

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

				const menu_toggle = document.querySelector('.menu-toggle');
				const sidebar = document.querySelector('.sidebar');

				menu_toggle.addEventListener('click', () => {
					menu_toggle.classList.toggle('is-active');
					sidebar.classList.toggle('is-active');
				});
				let menu_toggle_right = document.querySelector('.toggle-user');
				let close_right = document.querySelector('.close-right');
				let sidebar_right = document.querySelector('.sidebar-right-profile');
				let close_left = document.querySelector('.close-left');
				let sidebar_left = document.querySelector('.sidebar-left-profile');
				let sidebar_right_box = document.querySelector('.sidebar-right-box');

				close_right.addEventListener('click', () => {
					sidebar_right.classList.toggle('open');
				});
				close_left.addEventListener('click', () => {
					sidebar_left.classList.toggle('open');
				});
				function openNav() {
					document.getElementById("mySidebar").classList.toggle('open');
				}
				function openNavLeft(){
					document.getElementById("mySidebarLeft").classList.toggle('open');
				}
				function openChat(){
					document.getElementById("boxchat").classList.toggle('open-box-message');
					document.getElementById("closechat").classList.toggle('close-list-message');
				}
				function myFunction() {
					$('#content_to_scroll').animate({scrollTop: $('#content_to_scroll').prop("scrollHeight")}, 500);
				}
				var myText = document.getElementById("my-text");
				var result = document.getElementById("result");
				var limit = 10;
				result.textContent = 0 + "/" + limit;

				myText.addEventListener("input",function(){
					var textLength = myText.value.length;
					result.textContent = textLength + "/" + limit;

					if(textLength > limit){
						result.style.color = "#ff2851";
						myText.classList.add("maks");
						btnedit.setAttribute("disabled", "disabled");

					}else{
						btnedit.removeAttribute("disabled", "disabled");
						myText.classList.remove("maks");
						result.style.color = "#737373";
					}
				});

		// document.getElementById("validate").addEventListener("click", validatePassword);
		function validatePassword(){
			// e.preventDefault();
			// var newpassword = document.getElementById("newpass").value;
			// var confirmpassword = document.getElementById("confirmpass").value;
			var newpassword = document.passform.newpass.value;
			var confirmpassword = document.passform.confirmpass.value;
			if (newpassword != confirmpassword) {
				toastr.warning('Your new password does not match the confirmation password')
				return false;
			}
		}
		function currentpass() {
			var x = document.getElementById("currentpassword");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
		function newpass() {
			var x = document.getElementById("newpassword");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
		function confirmpass() {
			var x = document.getElementById("confirmpassword");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		}
	</script>
</body>
</html>