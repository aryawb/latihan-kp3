<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Livewire\Auth as LivewireAuth;
use App\Models\Favorite;
use App\Models\Message;
use App\Models\Friend;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use DB;
use Session;

use Auth;

use App\Models\User;
use App\Models\Thread;

class dashboard extends Component
{
    use WithFileUploads;
    public $noChat = false;

    public $receiver;
    public $current_user;
    public $message;
    public $thread;
    public $receiver_id;
    public $notification;
    public $fotoUser;
    public $nameUser;
    public $emailUser;
    public $phoneUser;
    public $bioUser;
    public $usernameUser;
    public $UserFoto;
    public $avator;
    public $currentpassword;
    public $newpassword;
    public $confirmpassword;

    protected $rules = ['message' => 'required'];

    public function startChat($id)
    {
      $this->noChat = true;

      $this->receiver = $id;

      $this->current_user = Auth::user()->id;

        // change to chat read
      $notifications = Message::where('thread', $this->current_user.'-'.$this->receiver)->orWhere('thread', $this->receiver.'-'.$this->current_user)->update(['is_read' => '1']);

  }

  public function updated($propertyName)
  {
      $this->validateOnly($propertyName);
  }

  public function sendChat ()
  {
      $this->validate();

      $thread_value = $this->current_user . '-' .$this->receiver;

      if($this->thread = 0){
         Message::create([
            'thread' => $thread_value,
            'message' => $this->message,
            'receiver_id' => $this->receiver,
            'sender_id' => $this->current_user
        ]);
     }else{
         Message::create([
            'thread' => $thread_value,
            'message' => $this->message,
            'receiver_id' => $this->receiver,
            'sender_id' => $this->current_user
        ]);
     }

     $this->clearForm();

 }

 public function clearForm ()
 {
  $this->message = "";
}

public function addFavorite ($id)
{
  $check = Favorite::where('message', $id)->first();

  if ($check) {
     Favorite::where('message', $id)->delete();
 }else{
     Favorite::create(['message' => $id]);
 }

}

    /**
     * This function is for deleting the message
     * What it does is beasically not deleting the row from the database but updating the message to a 0 value.
     * On echo, It will check if the value is 0, then display message deleted as ou can see it from the front end
     *
     * It also clears the message from the favorites
     */
    public function deleteMessage ($id)
    {
    	Message::find($id)->update(['message' => '0']);

    	// Favorite::where('message', $id)->delete();

    }

    /**
     * Logout function
     */
    public function logout ()
    {
    	Auth::logout();
    	return redirect('/');
    	// return redirect()->route('login');
    	// return view('livewire.auth.login');
    }

    /**
     * Clear all Chats With Current Useer
     *
     */
    public function clearChats ()
    {
        // All variables
    	$user = Auth::user()->id;

    	$receiver = $this->receiver;

    	$get_messages = Message::where('thread', $user.'-'.$receiver)->orWhere('thread', $receiver.'-'.$user)->get();

        // Favorite::where('message', $get_messages)->destroy();
    	foreach($get_messages as $message){
    		$message->delete();
    	}
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Chat has been cleared!']);
    }

    /**
     * Function to make fiend favorite
     */

    public function addFriend ($id)
    {
    	// $user = Auth::user()->id;
    	// $friendname = DB::table('users')
    	// ->select('username')
    	// ->where('id', '!=', $user)
    	// ->get();
    	Friend::create(['friend' => $id, 'user' => Auth::user()->id]);
    }

     /**
     * Function to remove friend
     */

     public function removeFriend ($id)
     {
     	Friend::where('friend', $id)->delete();
     }

    /**
     * View profile of an active user you are chatting with
     */
    public function editProfile ($id)
    {
        $userProfile = User::find($id);

        $this->userId = $userProfile->id;
        // $this->avator = $userProfile->foto_profil;
        $this->nameUser = $userProfile->name;
        $this->emailUser = $userProfile->email;
        $this->phoneUser = $userProfile->phone;
        $this->bioUser = $userProfile->bio;
        $this->usernameUser = $userProfile->username;
        // $this->currentpassword = $userProfile->password;

    }

    public function updateUsername(){
        $this->validate([
            'usernameUser'   => 'required',
        ]);
        if($this->userId) {
            $userProfile = User::find($this->userId);
            if($userProfile) {
                $userProfile->update([
                    'username'     => $this->usernameUser,
                ]);
            }
        }
        //flash message
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success',  'message' => 'Data updated successfully!']);
        // session()->flash('message', 'Data Berhasil Diupdate.');
    }
    public function updateProfile($id)
    {
        $this->validate([
            'nameUser'   => 'required',
            'avator'   => 'nullable',
            'emailUser' => 'required',
            'phoneUser' => 'required',
            'bioUser' => 'nullable'
        ]);

        $avator = $this->avator;
        // dd($this->avator);
        if ($this->avator != null) {
            // dd(Str::random(10).'.'. $avator->extension(););
            if($id){
                $edit = User::find($id);

                if ($edit) {
                    $avator = Str::random(10).'.'. $avator->extension();
                    // dd($avator);
                    $edit->update([
                        'name'     => $this->nameUser,
                        'email'   => $this->emailUser,
                        'phone'   => $this->phoneUser,
                        'bio'   => $this->bioUser,
                        'foto_profil' => $avator
                    ]);
                }
            }
            
            $this->avator->storeAs('public/images', $avator);
        }else{
            if($id){
                $edit = User::find($id);

                if ($edit) {
                   $avator = Str::random(10).'.'. $avator->extension();
                   $edit->update([
                    'name'     => $this->nameUser,
                    'email'   => $this->emailUser,
                    'phone'   => $this->phoneUser,
                    'bio'   => $this->bioUser,
                    'foto_profil' => $avator
                ]);
               }
           }
           $this->avator->storeAs('public/images', $avator);
       }
       $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Data updated successfully!']);


       $this->editProfile($id);
   }
   //  public function changePass()
   //  {     
   //     $this->validate([
   //      'currentpassword'   => 'required',
   //      'newpassword' => 'required'
   //  ]);
   //     $pass = $this->currentpassword;
   //     dd($pass);
   // }
   public function changePass()
   {     
     $this->validate([
        'currentpassword'   => 'required',
        'newpassword' => 'required',
        'confirmpassword' => 'required|same:newpassword'
    ]);
       // $pass = $this->confirmpassword;
     // dd($pass);
     if($this->userId) {
        $userProfile = User::find($this->userId);
        if($userProfile) {
         if (!(Hash::check($this->currentpassword, Auth::user()->password))) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'warning',  'message' => 'Your current password does not matches with the password you provided! Please try again!']);

        }else if(strcmp($this->currentpassword, $this->newpassword) == 0){
            $this->dispatchBrowserEvent('alert',
                ['type' => 'warning',  'message' => 'New Password cannot be same as your current password! Please choose a different password!']);

        }
        // else if(strcmp($this->newpassword, $this->confirmpassword) == 0){
        //     $this->dispatchBrowserEvent('alert',
        //         ['type' => 'warning',  'message' => 'Your new password does not match the confirmation password! Please try again!']);

        // }
        else if(Hash::check($this->currentpassword, Auth::user()->password) && strcmp($this->currentpassword, $this->newpassword) != 0){
            $barupassword= Hash::make($this->confirmpassword); 
            $userProfile->update([
                'password'     => $barupassword,
            ]);
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success',  'message' => 'Password has been saved!']);
        }
    }
}
                // $user = Auth::user()->id;

}
public function deleteProfile($id){
    $profildel = User::find($id);
    if($profildel->foto_profil){
        Storage::delete('public/images/' . $profildel->foto_profil);
    }
    $profildel->update([
        $profildel->foto_profil = null
    ]);
    $this->dispatchBrowserEvent('alert',
        ['type' => 'success',  'message' => 'Photos has been deleted!']);
}
public function render ()
{
        // All variables
   $user = Auth::user()->id;
   $receiver = $this->receiver;

   $current = User::find($receiver);
   $userini = User::where('id', '=', $user)->first();
        // get all users
   $users = User::where('id', '!=', $user)->get();
        // check if current user is friend
    	// $friend = Friend::where('user', $user)->first();
    	// $friend = DB::table('friends')
    	// ->join('users', 'users.id ', '=', 'friends.user')
    	// ->select('id','friend')
    	// ->where('user', '=', $user)
    	// ->get();
        // get all chats
   $list = Friend::where('friend','!=',$user)->orWhere('user','==',$user)
   ->with('list_teman')
   ->get();
   $noFriends = User::where('id', '!=', $user)->with('wolak')->get();
   $messages = Message::where('thread', $user.'-'.$receiver)->orWhere('thread', $receiver.'-'.$user)->get();

   return view('livewire.dashboard', compact('users','userini','current', 'messages','noFriends'));
}
}
