<?php

namespace App\Http\Livewire\Auth;
// namespace App\Http\Livewire\Auth\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Auth\Events\Registered;
use App\Models\User;

class Login extends Component
{
	public $users, $username, $password, $name, $user, $email,$phone;
	public $registerForm = false;

	public function render()
	{
		return view('livewire.auth.login');
	}
	private function resetInputFields(){
		$this->name = '';
		$this->username = '';
		$this->password = '';
	}

	public function login()
	{
		$validatedDate = $this->validate([
			'username' => 'required',
			'password' => 'required',
		]);

		if(\Auth::attempt(array('username' => $this->username, 'password' => $this->password))){
			// session()->flash('message', "You are Login successful.");
			$this->dispatchBrowserEvent('alert',
				['type' => 'success',  'message' => 'Login successfully!']);
			
			return redirect()->to('/dashboard');
		}else{
			$this->dispatchBrowserEvent('alert',
				['type' => 'error',  'message' => 'Username or password are wrong!']);
		}
	}

	public function register()
	{
		$this->registerForm = !$this->registerForm;
	}

	public function registerStore()
	{
		$validatedDate = $this->validate([
			'name' => 'required',
			'username' => 'required',
			'password' => 'required',
			'phone' => 'required',
			'email' => 'required|email|unique:users,email'
		]);

		$this->password = Hash::make($this->password); 

		$user = User::create(['name' => $this->name, 'username' => $this->username,'password' => $this->password,'phone' => $this->phone,'email' => $this->email]);
		event(new Registered($user));
		// session()->flash('message', 'Your register successfully Go to the login page.');
		$this->dispatchBrowserEvent('alert',
			['type' => 'success',  'message' => 'Register successfully!']);

		$this->resetInputFields();

	}
}
