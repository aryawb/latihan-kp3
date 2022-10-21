<div wire:poll>
	<nav wire:ignore.self class="navbar navbar-expand-lg navbar-light">
		<div class="navbar-brand">
			<div wire:ignore.self class="menu-toggle">
				<div class="hamburger">
					<span></span>
				</div>
			</div>
			<img src="{{asset('img/CUTECHAT.png')}}" alt="" class="img-fluid">
			<div class="navbar-box-img none-profile-desktop">
				@if($userini->foto_profil)
				<img src="{{ Storage::url('images/' .$userini->foto_profil)}}" alt="" class="img-fluid" loading="lazy">
				@else
				<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
				@endif
			</div>
		</div>
		
		<div class="w-100 justify-content-end align-items-center d-flex" id="navbarNavDropdown">
			<ul class="navbar-nav ml-auto">
				<!-- <li class="nav-item d-flex align-items-center">
					<div class="dropdown d-flex align-items-center" wire:ignore.self>
						<a wire:ignore.self href="#" class="nav-link d-flex justify-content-center flex-column" role="button" data-toggle="dropdown" aria-expanded="false">
							<i class='bx bxs-bell'></i>
							<div class="notif">
								<i class='bx bxs-circle'></i>
							</div>
						</a>
						<div class="dropdown-menu" wire:ignore.self>
							<a href="javascript:void(0)" type="button" onclick="openNavLeft()" class="dropdown-item" href="#">Profile</a>
							<a wire:click="logout" class="dropdown-item">Logout</a>
						</div>
					</div>
				</li> -->
				<li class="nav-item none-profile ">
					<!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
					<div class="navbar-panel">

						<p>Hello, <span>{{$userini->username}}</span></p>

						<div class="navbar-box-img">
							@if($userini->foto_profil)
							<img src="{{ Storage::url('images/' .$userini->foto_profil)}}" alt="" class="img-fluid" loading="lazy">
							@else
							<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
							@endif
						</div>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<div class="box-outside-chat">
		<div wire:ignore.self class=" sidebar nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<ul wire:ignore.self class="nav nav-tabs border-0" id="myTab" role="tablist">
				<li  class="nav-item" role="presentation">
					<button wire:ignore.self class="nav-link active" id="message-tab" data-toggle="tab" data-target="#message" type="button" role="tab" aria-controls="home" aria-selected="true">
						<i class='bx bxs-chat' ></i>
					</button>
					<span wire:ignore.self class="tooltip">Messages</span>
				</li>
				<li  class="nav-item" role="presentation">
					<button wire:ignore.self class="nav-link" id="addfriend-tab" data-toggle="tab" data-target="#addfriend" type="button" role="tab" aria-controls="profile" aria-selected="false">
						<i class='bx bxs-user-account'></i>
					</button>
					<span wire:ignore.self class="tooltip">Add Friend</span>
				</li>
				<li  class="nav-item" role="presentation">
					<button wire:ignore.self class="nav-link" id="friendlist-tab" data-toggle="tab" data-target="#friendlist" type="button" role="tab" aria-controls="contact" aria-selected="false">
						<i class='bx bxs-user-badge'></i>
					</button>
					<span wire:ignore.self class="tooltip">Friend List</span>
				</li>
				<li  class="nav-item" role="presentation">
					<button wire:ignore.self class="nav-link" id="setting-tab" data-toggle="tab" data-target="#setting" type="button" role="tab" aria-controls="contact" aria-selected="false">
						<i class='bx bxs-cog' ></i>
					</button>
					<span wire:ignore.self class="tooltip">Setting</span>
				</li>
			</ul>
		</div>
		<div class="box-inside-left" id="closechat" wire:ignore.self>
			<div class="tab-content" id="myTabContent">
				<div wire:ignore.self class="tab-pane fade show active" id="message" role="tabpanel" aria-labelledby="home-tab">
					<h5>Conversations</h5>
					<div class="card" wire:ignore.self>
						<div class="card-body">
							<div class="search-box" wire:ignore.self>
								<span class="bx bx-search"></span>
								<input wire:ignore.self class="form-control search-dark" type="search" placeholder="Search Messages.." aria-label="Search">
							</div>

							@foreach ($users as $item)
							<a type="button" class="w-100" wire:ignore.self wire:click="startChat({{ $item->id }})">
								@php
								$notifications = App\Models\Message::where('is_read', '0')->where('sender_id', $item->id)->get();
								@endphp
								<div class="box-list-chat" wire:ignore.self onclick="openChat()">
									<div class="box-detail-chat">
										<div class="box-img-chat">
											@if($item->foto_profil)
											<img src="{{ Storage::url('images/' .$item->foto_profil)}}" alt="" class="img-fluid" loading="lazy">
											@else
											<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
											@endif
											<img src="{{asset('img/login-img.jpg')}}" alt="" loading="lazy" class="img-fluid">
											<span class="dots-online d-none"><i class='bx bxs-circle'></i></span>
										</div>
										<div class="box-text-chat">
											<div class="box-label-chat">
												<h6 wire:ignore.self class="name">{{$item->username}}</h6>
												<div class="dropdown" wire:ignore.self>
													<button class="bg-transparent border-0" role="button" data-toggle="dropdown" aria-expanded="false">
														<span wire:ignore.self class="bx bx-dots-horizontal-rounded"></span>
													</button>
													<div class="dropdown-menu" wire:ignore.self>
														<button class="dropdown-item"><i class='bx bx-trash'></i> Delete Chat</button>
													</div>
												</div>
											</div>
											<div class="box-label-chat">
												@if (Cache::has('is_online' . $item->id))
												<!-- <div class="small"><span class="fa fa-circle chat-online"></span> Online</div> -->
												<p class="small-messages" wire:ignore.self> Online</p>
												@else
												<div class="small-messages" wire:ignore.self>Last seen: {{ \Carbon\Carbon::parse($item->last_seen)->diffForHumans() }}</div>
												@endif
												<!-- <p class="small-messages"> Lorem ipsum dolor sit amet</p> -->
												@if ($notifications->count() > 0)
												<span class="list-time-chat badge badge-danger">{{ $notifications->count() }}</span>
												@endif
											</div>
										</div>
									</div>
								</div>	
							</a>

							@endforeach		
						</div>
					</div>
				</div>
				<div wire:ignore.self class="tab-pane fade" id="addfriend" role="tabpanel" aria-labelledby="profile-tab">
					<h5>Add Friend</h5>
					@foreach ($noFriends as $friends)
					@if($friends['wolak'])
					@php
					error_reporting(0);
					$req_friend = App\Models\Friend::where('status', 'pending')->where('friend', Auth::user()->id)->get();
					$friend_null = App\Models\Friend::orderBy('friend','desc')->where('friend',$friends->id)->get();
					$user_null = App\Models\Friend::orderBy('user','desc')->where('user',Auth::user()->id)->get();
					$duplicateF_null = App\Models\Friend::orderBy('friend','desc')->limit(1)->get();
					$duplicateS_null = App\Models\Friend::orderBy('user','desc')->limit(1)->get();
					@endphp

					@if($friend_null->isEmpty() || $user_null->isEmpty())
					<!-- Card -->
					<div class="card" wire:ignore.self>
						<div class="card-body">
							<div wire:ignore.self class="search-box">
								<span class="bx bx-search"></span>
								<input wire:ignore.self class="form-control search-dark" type="search" placeholder="Search your friends" aria-label="Search">
							</div>

							<div wire:ignore.self class="box-list-chat">
								<div class="box-detail-chat">
									<div class="box-img-friend">
										@if($friends->foto_profile)
										<img src="{{ Storage::url('images/' .$friends->foto_profile)}}" alt="" class="img-fluid" loading="lazy">
										@else
										<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
										@endif
										
										<span class="dots-online"></span>
									</div>
									<div class="d-flex justify-content-between" style="width: 250px;">
										<div class="box-text-chat">
											<div class="box-label-chat justify-content-start">
												<h6 class="name">{{ $friends->username}}</h6>
												@foreach($req_friend as $notif)
												@if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $friends->id)
												<span class="badge badge-danger ml-2" style="font-size: 14px;"><i class='bx bxs-error-circle'></i></span>
												@endif
												@endforeach
											</div>
											@if($friends->bio)
											<p wire:ignore.self class="small-messages">{{ $friends->bio}}</p>
											@else
											<p wire:ignore.self class="small-messages">Hi guys, I'am already using cutechat!</p>
											@endif
										</div>
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $friends->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-plus'></i></button>
										</div>
									</div>
								</div>
							</div>			
							
						</div>
					</div>
					<!-- Card -->
					@elseif($friend_null[0]->user != $user_null[0]->user)
					@foreach ($user_null as $cek)
					@if ($cek->user == Auth::user()->id && $cek->friend == $friends->id)

					@elseif($duplicateS_null[0]->user == Auth::user()->id && $duplicateS_null[0]->friend == $friends->id)
					<!-- Card -->
					<div class="card" wire:ignore.self>
						<div class="card-body">
							<div wire:ignore.self class="search-box">
								<span class="bx bx-search"></span>
								<input wire:ignore.self class="form-control search-dark" type="search" placeholder="Search your friends" aria-label="Search">
							</div>

							<div wire:ignore.self class="box-list-chat">
								<div class="box-detail-chat">
									<div class="box-img-friend">
										@if($friends->foto_profile)
										<img src="{{ Storage::url('images/' .$friends->foto_profile)}}" alt="" class="img-fluid" loading="lazy">
										@else
										<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
										@endif
										<span class="dots-online"></span>
									</div>
									<div class="d-flex" style="width: 250px;">
										<div class="box-text-chat">
											<div class="box-label-chat">
												<h6 class="name">{{ $friends->username}}</h6>
												
											</div>
											@if($friends->bio)
											<p wire:ignore.self class="small-messages">{{ $friends->bio}}</p>
											@else
											<p wire:ignore.self class="small-messages">Hi, I'am already using cutechat!</p>
											@endif
										</div>
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $friends->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-plus'></i></button>
										</div>
									</div>
								</div>
							</div>			
							
						</div>
					</div>
					<!-- Card -->
					@elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend != $friends->id)
					@if($user_null[1]->user == Auth::user()->id && $user_null[1]->friend == $friends->id)

					@else
					<!-- Card -->
					<div class="card" wire:ignore.self>
						<div class="card-body">
							<div wire:ignore.self class="search-box">
								<span class="bx bx-search"></span>
								<input wire:ignore.self class="form-control search-dark" type="search" placeholder="Search your friends" aria-label="Search">
							</div>

							<div wire:ignore.self class="box-list-chat">
								<div class="box-detail-chat">
									<div class="box-img-friend">
										@if($friends->foto_profile)
										<img src="{{ Storage::url('images/' .$friends->foto_profile)}}" alt="" class="img-fluid" loading="lazy">
										@else
										<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
										@endif
										<span class="dots-online"></span>
									</div>
									<div class="d-flex" style="width: 250px;">
										<div class="box-text-chat">
											<div class="box-label-chat">
												<h6 class="name">{{ $friends->username}}</h6>
												@foreach($req_friend as $notif)
												@if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $friends->id)
												<span class="badge badge-danger">!</span>
												@endif
												@endforeach
											</div>
											@if($friends->bio)
											<p wire:ignore.self class="small-messages">{{ $friends->bio}}</p>
											@else
											<p wire:ignore.self class="small-messages">Hi, I'am already using cutechat!</p>
											@endif
										</div>
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $friends->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-plus'></i></button>
										</div>
									</div>
								</div>
							</div>			
							
						</div>
					</div>
					<!-- Card -->
					@endif
					@elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend == $friends->id)
					@else
					<!-- Card -->
					<div class="card" wire:ignore.self>
						<div class="card-body">
							<div wire:ignore.self class="search-box">
								<span class="bx bx-search"></span>
								<input wire:ignore.self class="form-control search-dark" type="search" placeholder="Search your friends" aria-label="Search">
							</div>

							<div wire:ignore.self class="box-list-chat">
								<div class="box-detail-chat">
									<div class="box-img-friend">
										@if($friends->foto_profile)
										<img src="{{ Storage::url('images/' .$friends->foto_profile)}}" alt="" class="img-fluid" loading="lazy">
										@else
										<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
										@endif
										<span class="dots-online"></span>
									</div>
									<div class="d-flex" style="width: 250px;">
										<div class="box-text-chat">
											<div class="box-label-chat">
												<h6 class="name">{{ $friends->username}}</h6>
												@foreach($req_friend as $notif)
												@if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $friends->id)
												<span class="badge badge-danger">!</span>
												@endif
												@endforeach
											</div>
											@if($friends->bio)
											<p wire:ignore.self class="small-messages">{{ $friends->bio}}</p>
											@else
											<p wire:ignore.self class="small-messages">Hi, I'am already using cutechat!</p>
											@endif
										</div>
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $friends->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-plus'></i></button>
										</div>
									</div>
								</div>
							</div>			
							
						</div>
					</div>
					<!-- Card -->
					@endif
					@endforeach
					@else
					@foreach ($teman_req as $item)
					@if ($item['user'] == Auth::user()->id && $item['friend'] == $friends->id)

					@elseif($item['user'] != Auth::user()->id)
					<!-- Card -->
					<div class="card" wire:ignore.self>
						<div class="card-body">
							<div wire:ignore.self class="search-box">
								<span class="bx bx-search"></span>
								<input wire:ignore.self class="form-control search-dark" type="search" placeholder="Search your friends" aria-label="Search">
							</div>

							<div wire:ignore.self class="box-list-chat">
								<div class="box-detail-chat">
									<div class="box-img-friend">
										@if($friends->foto_profile)
										<img src="{{ Storage::url('images/' .$friends->foto_profile)}}" alt="" class="img-fluid" loading="lazy">
										@else
										<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
										@endif
										<span class="dots-online"></span>
									</div>
									<div class="d-flex" style="width: 250px;">
										<div class="box-text-chat">
											<div class="box-label-chat">
												<h6 class="name">{{ $friends->username}}</h6>
												@foreach($req_friend as $notif)
												@if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $friends->id)
												<span class="badge badge-danger">!</span>
												@endif
												@endforeach
											</div>
											<p wire:ignore.self class="small-messages">{{ $friends->bio}}</p>
										</div>
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $friends->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-plus'></i></button>
										</div>
									</div>
								</div>
							</div>			
							
						</div>
					</div>
					<!-- Card -->
					@endif
					@endforeach
					@endif
					@else

					@endif
					@endforeach
				</div>
				<div wire:ignore.self class="tab-pane fade" id="friendlist" role="tabpanel" aria-labelledby="contact-tab">
					<h5>Friend List</h5>
					@foreach ($list as $friends)
					@if($friends->user == Auth::user()->id)
					@foreach ($friends['list_teman'] as $data)

					<div class="card" wire:ignore.self>
						<div class="card-body">
							<div wire:ignore.self class="search-box">
								<span class="bx bx-search"></span>
								<input wire:ignore.self class="form-control search-dark" type="search" placeholder="Search your friends" aria-label="Search">
							</div>

							<div wire:ignore.self class="box-list-chat">
								<div class="box-detail-chat">
									<div class="box-img-friend">
										@if($data->foto_profile)
										<img src="{{ Storage::url('images/' .$data->foto_profile)}}" alt="" class="img-fluid" loading="lazy">
										@else
										<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
										@endif

									</div>
									<!-- <p class="dots-online">{{$data->username}}</p> -->
									<div class="d-flex justify-content-between" style="width: 250px;">
										<div class="box-text-chat">
											<div class="box-label-chat justify-content-start">
												<h6 class="name">{{ $data->username}}</h6>
												@foreach($req_friend as $notif)
												@if($notif['friend'] == Auth::user()->id &&  $notif['user'] == $data->id)
												<span class="badge badge-danger ml-2" style="font-size: 14px;"><i class='bx bxs-error-circle'></i></span>
												@endif
												@endforeach
											</div>
											@if($data->bio)
											<p wire:ignore.self class="small-messages">{{ $data->bio}}</p>
											@else
											<p wire:ignore.self class="small-messages">Hi guys, I'am already using cutechat!</p>
											@endif
										</div>

										
										@php
										error_reporting(0);
										$req_friend = App\Models\Friend::where('status', 'pending')->where('friend', Auth::user()->id)->get();
										$friend_null = App\Models\Friend::orderBy('friend','desc')->where('friend',$data->id)->get();
										$user_null = App\Models\Friend::orderBy('user','desc')->where('user',Auth::user()->id)->get();
										$duplicateF_null = App\Models\Friend::orderBy('friend','desc')->limit(1)->get();
										$duplicateS_null = App\Models\Friend::orderBy('user','desc')->limit(1)->get();
										@endphp
										@if($friend_null->isEmpty() || $user_null->isEmpty())
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $data->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-plus'></i></button>
										</div>
										@elseif($friend_null[0]->user != $user_null[0]->user)
										@foreach ($user_null as $cek)
										@if ($cek->user == Auth::user()->id && $cek->friend == $data->id)

										<div class="d-flex align-items-center">
											<button wire:click="removeFriend({{ $data->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-x'></i></button>
										</div>
										

										@elseif($duplicateS_null[0]->user == Auth::user()->id && $duplicateS_null[0]->friend == $data->id)
										
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $data->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-x'></i></button>
										</div>

										@elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend != $data->id)
										@if($user_null[1]->user == Auth::user()->id && $user_null[1]->friend == $data->id)
										@else
										
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $data->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-plus'></i></button>
										</div> 
										
										@endif
										@elseif($user_null[0]->user == Auth::user()->id && $user_null[0]->friend == $data->id)

										@else
										
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $data->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-plus'></i></button>
										</div>
										
										@endif
										@endforeach


										@else
										@foreach ($teman_req as $item)
										@if ($item['user'] == Auth::user()->id && $item['friend'] == $data->id)
										
										<div class="d-flex align-items-center">
											<button wire:click="removeFriend({{ $data->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-x'></i></button>
										</div>
										
										@elseif($item['user'] != Auth::user()->id)
										
										<div class="d-flex align-items-center">
											<button wire:click="addFriend({{ $data->id }})" class="btn btn-sm text-white"><i class='bx bxs-user-plus'></i></button>
										</div>
										
										@endif
										@endforeach                                                        
										@endif


									</div>
								</div>
							</div>			

						</div>
					</div>
					@endforeach
					@endif
					@endforeach
				</div>
				<div wire:ignore.self class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="contact-tab">
					<h5>Settings</h5>
					<div class="box-profile-setting">
						<label wire:ignore.self class="font-weight-bold w-100 pb-2 label-setting" for=""><i class='bx bxs-user'></i> Account</label>
						<div class="card" wire:ignore.self>
							<div class="card-body">
								<div wire:ignore.self class="accordion clearfix" id="accordionExample">
									<!-- <a href="javascript:void(0)" type="button" onclick="openNavLeft()" > -->
										<!-- wire:click="editProfile({{ $userini->id }})" -->
										<div wire:ignore.self wire:click="editProfile({{ $userini->id }})" class="box-inside" onclick="openNavLeft()">
											<h6 class="mb-0 font" for="">Profile</h6>
											<i class='bx bxs-user-detail'></i>
										</div>
										<!-- </a> -->
									<!-- <div wire:ignore.self id="collapseOne" class="collapse d-none" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="accordion-setting">
											<div class="w-100 d-flex justify-content-center mb-2">
												<div class="img-setting">
													<img src="{{asset('img/login-img.jpg')}}" alt="" loading="lazy" class="img-fluid">
													<a href="" type="" class="btn profile-img d-flex justify-content-center align-items-center"><i class='bx bxs-camera'></i></a>
												</div>
											</div>
											<div class="form-group">
												<input type="text" name="" required="" placeholder="Full Name">
												<span class="focus-border"></span>
											</div>
											<div class="form-group">
												<input type="text" name="" required="" placeholder="Email">
												<span class="focus-border"></span>
											</div>
											<div class="form-group">
												<input type="number" name="" required="" placeholder="Phone">
												<span class="focus-border"></span>
											</div>
											<div class="form-group">
												
												<textarea wire:ignore.self rows="1" class="w-100" id="my-text" placeholder="Bio"></textarea>
												<span class="focus-border" id="maks"></span>
												<p class="mb-0 w-100 text-right d-none" id="result"></p>
											</div>
											<button wire:ignore.self class="btn w-100" id="btnSave">Save</button>
										</div>
									</div> -->
								</div>
								<div wire:ignore.self class="accordion" id="accordionExample">
									<div class="box-inside" wire:click="editProfile({{ $userini->id }})" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
										<h6 class="mb-0 font" for="">Change Username</h6>
										<i class='bx bxs-user-pin'></i>
									</div>
									<div wire:ignore.self  id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="accordion-setting" wire:ignore.self>
											<form wire:submit.prevent="updateUsername">
												<div class="form-group">
													<input wire:model="usernameUser" wire:ignore.self class="input-profile" type="text" name="" required="" placeholder="Username" value="{{$userini->username}}">
													<span class="focus-border"></span>
												</div>
												<button type="submit" class="btn w-100" id="btnSave">Save</button>
											</form>
										</div>
									</div>
								</div>
								<div wire:ignore.self class="accordion" id="accordionExample">
									<div class="box-inside" wire:click="editProfile({{ $userini->id }})"  data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseOne">
										<h6 class="mb-0 font" for="">Reset Password</h6>
										<i class='bx bxs-lock' ></i>
									</div>
									<div wire:ignore.self id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
										<div class="accordion-setting" wire:ignore.self>
											<form wire:submit.prevent="changePass" onsubmit="validatePassword()" name="passform">
												<div class="form-group">
													<input wire:model.defer="currentpassword" wire:ignore.self class="input-profile" type="password" name="" required="" placeholder="current password" id="currentpassword">
													<i class="bx bxs-low-vision eye-pass" onclick="currentpass()" id="togglePassword" wire:ignore.self>
													</i>
													<span class="focus-border"></span>
												</div>
												<div class="form-group">
													<input type="password" wire:model.defer="newpassword" wire:ignore.self class="input-profile" required="" placeholder="New Password" name="newpass" id="newpassword">
													<i class="bx bxs-low-vision eye-pass" onclick="newpass()" id="togglePassword" wire:ignore.self>
													</i>
													<span class="focus-border"></span>
												</div>
												<div class="form-group">
													<input type="password" wire:model.defer="confirmpassword" wire:ignore.self class="input-profile" name="confirmpass" required="" placeholder="Confirm New Password" class="@error('confirmpass') is-invalid @enderror" id="confirmpassword">
													<i class="bx bxs-low-vision eye-pass" onclick="confirmpass()" id="togglePassword" wire:ignore.self>
													</i>
													<span class="focus-border"></span>
													@error('confirmpass')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
													@enderror
												</div>
												<button type="submit" class="btn w-100" id="validate">Save</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<label wire:ignore.self class="font-weight-bold w-100 pb-2 label-setting" for=""><i class='bx bxs-layer'></i> More</label>
						<div class="card d-none" wire:ignore.self>
							<div class="card-body">
								<div class="box-inside">
									<h6 class="mb-0 font" for="">Dark Mode</h6>
									<i class='bx bxs-moon'></i>
									<label class="switch border-0 mb-0">
										<input type="checkbox" class="dark-button" />
										<span class="slider">
										</span>
									</label>

								</div>
							</div>
						</div>

						<div class="card" wire:ignore.self>
							<div class="card-body">

								<div class="box-inside" wire:click="logout">
									<h6 class="mb-0 font" for="">Logout</h6>
									<i class='bx bxs-exit'></i>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div wire:ignore.self class="sidebar-left-profile " id="mySidebarLeft">
			<div class="sidebar-right-box">
				<div class="sidebar-right-head justify-content-end">
					<a href="javascript:void(0)" type="button" onclick="openNavLeft()">
						<i class='bx bx-x close-left'></i>
					</a>
				</div>
				<div wire:ignore.self>
					@if (session()->has('message'))
					<div class="alert alert-success" wire:ignore.self>
						{{ session('message') }}
					</div>
					@endif
				</div>
				<div class="accordion-setting border-0">
					<form wire:submit.prevent="updateProfile({{Auth::user()->id}})">
						<input type="hidden" wire:model="userId">
						<div class="w-100 d-flex justify-content-center mb-2">
							<div class="img-setting">
								<!--  -->
								@if($avator)
								<img src="{{$avator->temporaryUrl()}}" alt="" class="img-fluid" loading="lazy">
								@elseif($userini->foto_profil)
								<img src="{{ Storage::url('images/' .$userini->foto_profil)}}" alt="" class="img-fluid" loading="lazy">
								@else
								<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
								@endif
								
								<div class="dropdown" wire:ignore.self>
									<a href="#" role="button" data-toggle="dropdown"class="btn profile-img d-flex justify-content-center align-items-center"><i class='bx bxs-camera'></i></a>
									<div class="dropdown-menu" wire:ignore.self>
										@if($userini->foto_profil)
										<a class="dropdown-item" href="#">Lihat</a>
										@else
										<a class="dropdown-item d-none" href="#">Lihat</a>
										@endif
										<a class="dropdown-item" href="#">
											<input class="d-none" type="file" id="file" wire:model="avator">
											<label class="mb-0 w-100 d-flex align-items-center" style="cursor: pointer;" for="file"><i class='bx bxs-edit'></i> &nbsp;Ubah</label>
										</a>
										@if($userini->foto_profil)
										<a onclick="confirm('Delete your profile picture?') || event.stopImmediatePropagation()" wire:click="deleteProfile({{ $userini->id }})" class="dropdown-item" href="#"><i class='bx bx-trash'></i>&nbsp; Hapus</a>
										@else
										<a onclick="confirm('Delete your profile picture?') || event.stopImmediatePropagation()" wire:click="deleteProfile({{ $userini->id }})" class="dropdown-item d-none" href="#">Hapus</a>
										@endif
									</div>
								</div>
							</div>
						</div>
<!-- 						<div class="form-group">
							<input type="file" id="file" wire:model="avator">
						</div> -->
						<div class="form-group">
							<input wire:ignore.self type="text" class="input-profile" wire:model="nameUser"  placeholder="Full Name">
							<!-- <p>{{$userini->name}}</p> -->
							<span class="focus-border"></span>
						</div>
						<div class="form-group">
							<input wire:ignore.self type="text" class="input-profile" wire:model="emailUser"  placeholder="Email">
							<!-- <p>{{$userini->email}}</p> -->
							<span class="focus-border"></span>
						</div>
						<div class="form-group">
							<input wire:ignore.self type="number" class="input-profile" wire:model="phoneUser"  placeholder="Phone">
							<!-- <p>{{$userini->phone}}</p> -->
							<span class="focus-border"></span>
						</div>
						<div class="form-group">
							<textarea wire:ignore.self rows="1" wire:model="bioUser" class="w-100 input-profile" id="my-text" placeholder="Bio"></textarea>
							<span class="focus-border" id="maks"></span>
							<p class="mb-0 w-100 text-right d-none" id="result"></p>
						</div>
						<button type="submit" wire:ignore.self class="btn w-100" id="btnedit">Save</button>
					</form>
				</div>

			</div>
		</div>
		<div class="box-inside-right" wire:ignore.self id="boxchat">
			@if ($noChat)
			<div class="d-block">
				<div wire:ignore.self class="sidebar-right-profile" id="mySidebar">
					<div class="sidebar-right-box">
						<div class="sidebar-right-head">
							<a href="javascript:void(0)" type="button" onclick="openNav()">
								<i class='bx bx-x'></i>
							</a>
						</div>
						<div class="d-block">
							<div class="box-img-profile">
								<div class="img-profile">
									@if($current->foto_profil)
									<img src="{{ Storage::url('images/' .$current->foto_profil)}}" alt="" class="img-fluid" loading="lazy">
									@else
									<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
									@endif
								</div>
							</div>
						</div>

						<div class="box-username-profile">
							<p>{{$current->username}}</p>
							<i class='bx bxs-user-rectangle'></i>
						</div>
						<div class="box-bio-profile" wire:ignore.self>
							<!-- <label for="">Bio</label> -->
							@if($current->bio)
							<p class="text-center">{!! nl2br(e($current->bio)) !!}</p>
							@else
							<p class="text-center">Hi, I'am already using cutechat!</p>
							@endif
						</div>

						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button wire:ignore.self class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class='bx bxs-user-circle'></i></button>
							</li>
							<li class="nav-item" role="presentation">
								<button wire:ignore.self class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class='bx bx-image-alt'></i></button>
							</li>
						</ul>

						<div class="tab-content" id="myTabContent">
							<div wire:ignore.self class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="box-detail-profile">
									<div class="form-group">
										<label for="">Full Name</label>
										<p>{{$current->name}}</p>
									</div>
									<div class="form-group">
										<label for="">Email</label>
										@if($current->email)
										<p>{{$current->email}}</p>
										@else
										<p>-</p>
										@endif
									</div>
									<div class="form-group">
										<label for="">Phone</label>
										@if($current->phone)
										<p>{{$current->phone}}</p>
										@else
										<p>-</p>
										@endif
									</div>
								</div>
							</div>
							<div wire:ignore.self class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<!-- 		<h6>Media</h6> -->
								<div class="list-img-user">
									<div class="list-img-box">
										<img src="{{asset('img/login-img.jpg')}}" alt="" class="img-fluid" loading="lazy">
									</div>
									<div class="list-img-box">
										<img src="{{asset('img/login-img.jpg')}}" alt="" class="img-fluid" loading="lazy">
									</div>
									<div class="list-img-box">
										<img src="{{asset('img/login-img.jpg')}}" alt="" class="img-fluid" loading="lazy">
									</div>
									<div class="list-img-box">
										<img src="{{asset('img/login-img.jpg')}}" alt="" class="img-fluid" loading="lazy">
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="w-100 d-block">
				<div wire:ignore.self class="head-room-chat d-flex">
					<div class="head-room-label">
						<span class="back-mobile" onclick="openChat()">
							<i class='bx bx-left-arrow-alt'></i>
						</span>
						<a href="javascript:void(0)" type="button" onclick="openNav()">
							<div class="head-room-img">
								@if($current->foto_profil)
								<img src="{{ Storage::url('images/' .$current->foto_profil)}}" alt="" class="img-fluid" loading="lazy">
								@else
								<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
								@endif
								<span class="dots-online"></span>
							</div>
						</a>
						<div class="head-room-detail">
							<h6 class="room-chat-name font-weight-bold text-white">{{$current->username}}</h6>
							@if (Cache::has('is_online' . $current->id))
							<!-- <div class="small"><span class="fa fa-circle chat-online"></span> Online</div> -->
							<span class="room-chat-online text-white">active now</span>
							@else
							<div class="room-chat-online text-white" wire:ignore.self>Last seen: {{ \Carbon\Carbon::parse($current->last_seen)->diffForHumans() }}</div>
							@endif
						</div>
					</div>
					<div class="head-room-addons">
						<div class="dropdown" wire:ignore.self>
							<a href="#" role="button" data-toggle="dropdown" aria-expanded="false">
								<div class="bx bx-dots-horizontal-rounded rotate"></div>
							</a>
							<div class="dropdown-menu" wire:ignore.self>
								<a type="button" wire:click="clearChats" onclick="confirm('Are you sure of clearing chats?')" class="dropdown-item d-flex align-items-center" href="#"><i class='bx bx-message-x'></i>&nbsp; Clear chat</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@if ($messages->count())
			<div class="body-room-chat d-block"  id="content_to_scroll">
				@foreach ($messages as $chat)
				@if ($chat->sender_id == Auth::user()->id && $chat->receiver_id == $receiver)
				<div class="chat-right">
					<div class="chat-body-right">
						<div class="box-side-right">
							<div class="dropdown" wire:ignore.self>
								<a href="#" role="button" class="icon text-muted" data-toggle="dropdown" aria-expanded="false">
									<div class="bx bx-dots-horizontal-rounded rotate"></div>
								</a>
								<div class="dropdown-menu" wire:ignore.self>
									<a type="button" wire:click="deleteMessage({{ $chat->id }})" onclick="confirm('Are you sure of clearing chats?')" class="dropdown-item d-flex align-items-center"><i class='bx bx-message-x'></i>&nbsp; Delete</a>
								</div>
							</div>
							<div class="text-muted">{{ date('h:i a', strtotime($chat->created_at)) }}</div>
						</div>
						@if ($chat->message == '0')
						
						<div wire:ignore.self class="text-chat-right">
							<span class="text-white m-0" style="font-style: italic; font-size: 12px;">Message Deleted</span>
						</div>

						@else
						<div wire:ignore.self class="text-chat-right">
							<span style="word-break: break-word;" wire:ignore.self>{!! nl2br(e($chat->message )) !!}</span>
						</div>
						@endif
						<div class="img-chat-right">
							@if($userini->foto_profil)
							<img src="{{ Storage::url('images/' .$userini->foto_profil)}}" alt="" class="img-fluid" loading="lazy">
							@else
							<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
							@endif
							<!-- <img src="{{asset('img/login-img.jpg')}}" alt="" class="img-fluid" loading="lazy"> -->
						</div>

					</div>
				</div>
				@elseif($chat->sender_id == $receiver && $chat->receiver_id == Auth::user()->id)
				<div class="chat-left">
					<div class="chat-body-left">
						<div class="img-chat-left">
							@if($current->foto_profil)
							<img src="{{ Storage::url('images/' .$current->foto_profil)}}" alt="" class="img-fluid" loading="lazy">
							@else
							<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid" loading="lazy">
							@endif
						</div>
						@if ($chat->message == '0')
						
						<div wire:ignore.self class="text-chat-left">
							<span class="text-white m-0" style="font-style: italic; font-size: 12px;">Message Deleted</span>
						</div>

						@else
						
						<div wire:ignore.self class="text-chat-left">
							<span style="word-break: break-word;" wire:ignore.self>{!! nl2br(e($chat->message )) !!}</span>
						</div>

						@endif
						<div class="box-side-left">
							<div class="dropdown" wire:ignore.self>
								<a href="#" role="button" class="icon text-muted" data-toggle="dropdown" aria-expanded="false">
									<div class="bx bx-dots-horizontal-rounded rotate"></div>
								</a>
								<div class="dropdown-menu" wire:ignore.self>
									<a type="button" wire:click="deleteMessage({{ $chat->id }})" onclick="confirm('Are you sure of clearing chats?')" class="dropdown-item d-flex align-items-center"><i class='bx bx-message-x'></i>&nbsp; Delete</a>
								</div>
							</div>
							<div class="text-muted">{{ date('h:i a', strtotime($chat->created_at)) }}</div>
						</div>
						
					</div>
				</div>
				@endif
				@endforeach
			</div>
			@else
			<div class="empty-no-chat">
				<img src="{{asset('img/empty-chat.png')}}" alt="" loading="lazy">
				<p>You haven't started a conversation yet</p>
			</div>
			@endif
			<form style="width: 100%;" wire:submit.prevent="sendChat">
				<div wire:ignore.self class="type-chat d-flex">
					<input type="hidden" value="{{ $receiver }}" wire:model.defer="receiver_id">
					<textarea onfocus="myFunction()" autofocus class="form-control area-dark" rows="2" placeholder="Type Messages" wire:model.defer="message" wire:ignore.self></textarea>
					<!-- <input type="text" class="form-control" placeholder="Type Messages" wire:model.defer="message"> -->
					<button class="btn">Send <i class='bx bxs-send'></i></button>
				</div>
			</form>

			@else
			<div class="d-none">
				<div wire:ignore.self class="sidebar-right-profile  " id="mySidebar">
					<div class="sidebar-right-box">
						<div class="sidebar-right-head">
							<a href="javascript:void(0)" type="button" onclick="openNav()">
								<i class='bx bx-x'></i>
							</a>
						</div>
						<div class="d-block">
							<div class="box-img-profile">
								<div class="img-profile">

									<img src="" alt="" class="img-fluid" loading="lazy">


								</div>
							</div>
						</div>

						<div class="box-username-profile">
							<p></p>
							<i class='bx bxs-user-rectangle'></i>
						</div>
						<div class="box-bio-profile" wire:ignore.self>


							<p class="text-center"></p>

						</div>

						<ul class="nav nav-tabs" id="myTab" role="tablist">
							<li class="nav-item" role="presentation">
								<button wire:ignore.self class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><i class='bx bxs-user-circle'></i></button>
							</li>
							<li class="nav-item" role="presentation">
								<button wire:ignore.self class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><i class='bx bx-image-alt'></i></button>
							</li>
						</ul>

						<div class="tab-content" id="myTabContent">
							<div wire:ignore.self class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								<div class="box-detail-profile">
									<div class="form-group">
										<label for="">Full Name</label>
										<p></p>
									</div>
									<div class="form-group">
										<label for="">Email</label>

										<p></p>

									</div>
									<div class="form-group">
										<label for="">Phone</label>

										<p></p>

									</div>
								</div>
							</div>
							<div wire:ignore.self class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

								<div class="list-img-user">
									<div class="list-img-box">
										<img src="{{asset('img/login-img.jpg')}}" alt="" class="img-fluid" loading="lazy">
									</div>
									<div class="list-img-box">
										<img src="{{asset('img/login-img.jpg')}}" alt="" class="img-fluid" loading="lazy">
									</div>
									<div class="list-img-box">
										<img src="{{asset('img/login-img.jpg')}}" alt="" class="img-fluid" loading="lazy">
									</div>
									<div class="list-img-box">
										<img src="{{asset('img/login-img.jpg')}}" alt="" class="img-fluid" loading="lazy">
									</div>

								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="w-100 d-none">
				<div wire:ignore.self class="head-room-chat ">
					<div class="head-room-label">
						<a href="javascript:void(0)" type="button" onclick="openNav()">
							<div class="head-room-img">
								
								<img src="" alt="" class="img-fluid" loading="lazy">
								<span class="dots-online"></span>
							</div>
						</a>
						<div class="head-room-detail">
							<h6 class="room-chat-name font-weight-bold text-white"></h6>
							<span class="room-chat-online text-white">active now</span>
						</div>
					</div>
					<div class="head-room-addons">
						<div class="dropdown" wire:ignore.self>
							<a href="#" role="button" data-toggle="dropdown" aria-expanded="false">
								<div class="bx bx-dots-horizontal-rounded rotate"></div>
							</a>
							<div class="dropdown-menu" wire:ignore.self>
								<a type="button" wire:click="clearChats" onclick="confirm('Are you sure of clearing chats?')" class="dropdown-item d-flex align-items-center" href="#"><i class='bx bx-message-x'></i>&nbsp; Clear chat</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			
			<div class="empty-no-chat">
				<img src="{{asset('img/bgchat.svg')}}" alt="" loading="lazy">
				<p>Send messages and be friends together!</p>
			</div>
			@endif

		</div>
	</div>
</div>
