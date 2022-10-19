<div>
	<div class="box-login">
		<div class="container" id="container">
			<div class="form-container sign-up-container pt-3">
				<form>
					<div class="box-identy-login">
						<div class="img-identy-login">
							<img src="{{asset('img/LOGO BURNINGROOM 2020 - PNG 2.png')}}" alt="" class="img-fluid">
							<img src="{{asset('img/CUTECHAT.png')}}" alt="" class="img-fluid colab-logo">
						</div>
						<h3 class="font-weight-bold">Create Account</h3>
						<h6 style="font-weight: 500;" class="label-description">Use unique username for your account!</h6>
					</div>
					<div class="box-form">
						<div class="form-group mb-0 d-flex flex-column align-items-start">
							<span class="uil uil-user"></span>
							<input type="text" wire:model.defer="name"  placeholder="Your Name" class="form-control" />
						</div>
						<div class="form-group mb-0 d-flex flex-column align-items-start">
							<span class="uil uil-envelope"></span>
							<input type="text" wire:model.defer="email" placeholder="Email" class="form-control"/>
						</div>
						<div class="form-group mb-0 d-flex flex-column align-items-start">
							<span class="uil uil-phone"></span>
							<input type="number" wire:model.defer="phone" placeholder="Phone" class="form-control"/>
						</div>
						<div class="form-group mb-0 d-flex flex-column align-items-start">
							<span class="uil uil-user-check"></span>
							<input type="text" wire:model.defer="username" placeholder="Username" class="form-control"/>
						</div>
						<div class="form-group mb-0 d-flex flex-column align-items-start">
							<span class="uil uil-padlock"></span>
							<input type="password" wire:model.defer="password" placeholder="Password" class="form-control"/>
						</div>
					</div>
					<button class="mt-2" wire:click.prevent="registerStore">Sign Up</button>
					<span class="mt-4 identy-register">Already have an account? <a href="#" id="signIn">Sign in</a></span>
				</form>
			</div>
			<div class="form-container sign-in-container">
				<form action="#">
					<div class="box-identy-login">
						<div class="img-identy-login">
							<img src="{{asset('img/LOGO BURNINGROOM 2020 - PNG 2.png')}}" alt="" class="img-fluid">
							<img src="{{asset('img/CUTECHAT.png')}}" alt="" class="img-fluid colab-logo">
						</div>
						<h3 class="font-weight-bold">Sign in</h3>
						<h6 style="font-weight: 500;" class="label-description">Sign in into your account!</h6>
					</div>
					<div class="box-form">
						<div class="form-group mb-0 d-flex flex-column align-items-start">
							<span class="uil uil-user"></span>
							<input type="text" wire:model.defer="username" placeholder="Username" class="form-control" />
						</div>
						<div class="form-group mb-0 d-flex flex-column align-items-start">
							<span class="uil uil-padlock"></span>
							<input type="password" wire:model.defer="password" placeholder="Password" class="form-control"/>
						</div>
					</div>
					<button wire:click.prevent="login">Sign In</button>
					<span class="mt-4 identy-register">Don't have an account? <a href="#" id="signUp">Sign up</a></span>
				</form>
			</div>
			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<div class="sampul-overlay">
							<img src="{{asset('img/login-img.jpg')}}" loading="lazy" alt="" class="img-fluid">
						</div>
						<div class="overlay-text">
							<h1>Join Us!</h1>
							<p>Cutechat helps you connect and share with the people in your life.</p>
							<!-- <button class="ghost" id="signIn">Sign In</button> -->
						</div>
					</div>
					<div class="overlay-panel overlay-right">
						<div class="sampul-overlay">
							<img src="{{asset('img/register-img.jpg')}}" loading="lazy" alt="" class="img-fluid">
						</div>
						<div class="overlay-text">
							<h1>Welcome Back!</h1>
							<p class="mb-5">Enter your personal details and start connected with us</p>
							<!-- <button class="ghost" id="signUp">Sign Up</button> -->
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
