<div>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row chat-window">
                <!-- Chat User List -->
                <div class="col-lg-5 col-xl-3 chat-cont-left d-flex">
                    <div class="card mb-sm-3 mb-md-0 contacts_card flex-fill">
                        <div class="chat-header">
                            <div>
                                <h6>All Available Chats </h6>
                            </div>
                            <a href="javascript:void(0)" class="chat-compose">
                                {{ $chats->count() }}
                            </a>
                        </div>
                        <div class="chat-search">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="search_btn"><i class="fas fa-search"></i></span>
                                </div>
                                <input type="text" placeholder="Search users or there emails"
                                        class="form-control search-chat" name="search" wire:model.live='search'>
                            </div>
                        </div>

                        <div class="card-body contacts_body chat-users-list chat-scroll">
                            @foreach($chats as $chat)
                            <a href="javascript:void(0);" wire:click='selectChat({{ $chat->id }})'
                                class="media d-flex active">
                                <div class="media-img-wrap flex-shrink-0">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/imgs') }}/{{ $chat->user->profile_photo_path }}"
                                            alt="User Image" class="avatar-img rounded-circle">
                                    </div>
                                </div>
                                <div class="media-body flex-grow-1">
                                    <div>
                                        <div class="user-name text-yellow-500 font-bold">{{ $chat->user->name }}</div>
                                        <div class="user-last-chat text-indigo-800 font-extrabold">{{
                                            $chat->provider->name }}</div>
                                    </div>
                                    <div>
                                        <div class="last-chat-time">
                                            <img src="{{ asset('assets/imgs') }}/{{ $chat->provider->profile_photo_path }}"
                                                width="30" alt="User Image" class="avatar-img rounded-circle">
                                        </div>
                                    </div>
                                </div>
                            </a>
                            @endforeach

                        </div>
                    </div>
                </div>
                <!-- Chat User List -->

                <!-- Chat Content -->
                <div class="col-lg-7 col-xl-6 chat-cont-right d-flex">

                    <!-- Chat History -->
                    <div class="card mb-0">
                         @if($user)
                        <div class="card-header msg_head">
                            <div class="d-flex bd-highlight">
                                <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <div class="img_cont">
                                    <img class="rounded-circle user_img" src="{{ asset('assets/imgs') }}/{{ $user->profile_photo_path }}" alt="">
                                </div>
                                <div class="user_info">
                                    <span>{{ $user->name }}</span>
                                    @if($user->online_status === 1)
                                    <p class="mb-0 active">Online</p>
                                    @else
                                    <p class="mb-0">offline</p>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="chat-options">
                                <ul>
                                    <li><a href="#"><i class="feather-volume-2"></i></a></li>
                                    <li><a href="#"><i class="feather-search"></i></a></li>
                                    <li><a href="#"><i class="feather-video"></i></a></li>
                                    <li><a href="#"><i class="feather-user" id="task_chat"></i></a></li>
                                    <li><a href="#" class="with-bg"><i class="feather-more-horizontal"></i></a></li>
                                </ul>
                            </div> --}}
                        </div>
                        @endif

                        <div class="card-body msg_card_body chat-scroll pt-0">
                            <ul class="list-unstyled">
                                @foreach ($messages as $message)
                                <li
                                    class="media {{ $message->user_id != Auth::user()->id ? 'sent' : 'received' }} d-flex">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('assets/imgs') }}/{{ $message->user->profile_photo_path }}"
                                            alt="User Image" class="avatar-img rounded-circle">
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <div class="msg-box">
                                            <div>
                                                <ul class="chat-msg-info">
                                                    <li><span>{{ $message->user->name }}</span></li>
                                                    <li>
                                                        <span class="chat-time flex">{{$message->created_at->format('h:i
                                                            A') }}</span>
                                                    </li>
                                                </ul>
                                                <p>{{ $message->content }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>

                        </div>

                        {{-- <div class="card-footer">
                            <div class="input-group">
                                <div class="btn-file btn">
                                    <i class="fa fa-plus fs-14"></i>
                                    <input type="file">
                                </div>
                                <input class="form-control type_msg mh-auto empty_check"
                                    placeholder="Write your message...">
                                <div class="send-action">
                                    <a href="javascript:void(0);"><i class="fa fa-smile"></i></a>
                                    <a href="javascript:void(0);"><i class="fas fa-mic"></i></a>
                                    <button class="btn btn-primary btn_send"><i class="fa fa-paper-plane"
                                            aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div> --}}

                    </div>

                </div>
                <!-- /Chat Content -->

                <!-- Chat Profile -->
                @if($provider)
                <div class="col-xl-3 chat-cont-profile" id="task_window">
                    <div class="card mb-sm-3 mb-md-0 flex-fill">
                        <div class="card-header">
                            <div class="profile-wrap">
                                <div class="chat-profile">
                                    <div class="chat-profile-img">
                                        <img src="{{ asset('assets/imgs') }}/{{ $provider->profile_photo_path }}" alt="">
                                    </div>
                                    <div class="chat-profile-info">
                                        <h6>{{ $provider->name }}</h6>
                                        <p>{{ $provider->city }}</p>
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);"><i class="feather-mail"></i> </a>
                                    </li>
                                    <li>
                                        <a tel="{{ $provider->mobile }}"><i class="feather-phone"></i> </a>
                                    </li>
                                    {{-- <li>
                                        <a href="javascript:void(0);"><i class="feather-map-pin"></i></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);"><i class="feather-more-horizontal"></i></a>
                                    </li> --}}
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chat-pro-list">
                                <ul>
                                    <li>
                                        <span class="role-title"><i
                                                class="fa-solid fa-briefcase"></i>Profile</span><span
                                            class="role-info">{{ $provider->username }}</span>
                                    </li>
                                    <li>
                                        <span class="role-title"><i class="fa-solid fa-phone"></i>Phone</span><span
                                            class="role-info">{{ $provider->mobile }}</span>
                                    </li>
                                    <li>
                                        <span class="role-title"><i
                                                class="fa-solid fa-envelope"></i>Email</span><span
                                            class="role-info"><a href="/cdn-cgi/l/email-protection"
                                                class="__cf_email__">{{ $provider->email }}</a></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="chat-media">
                                {{-- <div class="chat-media-title">
                                    <h6>Shared Media</h6>
                                    <span>(3475 items)</span>
                                </div>
                                <div class="media-list">
                                    <ul class="nav">
                                        <li>
                                            <a href="javascript:void(0);" data-bs-toggle="tab"
                                                data-bs-target="#chat-photo" class="active">Photos</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" data-bs-toggle="tab"
                                                data-bs-target="#chat-file">File</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" data-bs-toggle="tab"
                                                data-bs-target="#chat-vdo">Video</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" data-bs-toggle="tab"
                                                data-bs-target="#chat-link">Link</a>
                                        </li>
                                    </ul>
                                </div> --}}
                                <div class="tab-content pt-0">
                                    <div class="tab-pane active" id="chat-photo">
                                        <div class="photo-list">
                                            <ul>
                                                @foreach($provider->services as $service)
                                                <li>
                                                    <img src="{{ asset('assets/imgs/services/default') }}/{{ $service->image }}" alt="img">
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    {{-- <div class="tab-pane fade" id="chat-vdo">
                                        <div class="photo-list">
                                            <ul>
                                                <li>
                                                    <img src="assets/imgs/service-01.jpg" alt="img">
                                                </li>
                                                <li>
                                                    <img src="assets/imgs/service-04.jpg" alt="img">
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="chat-file">
                                        <div class="photo-file">
                                            <ul>
                                                <li>
                                                    <i class="feather-file-text me-2"></i> admin_v1.0.zip
                                                </li>
                                                <li>
                                                    <i class="feather-file-text me-2"></i> test.pdf
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="chat-link">
                                        <div class="photo-link">
                                            <ul>
                                                <li>
                                                    <a href="#"><i class="feather-link-2 me-2"></i> Sed ut
                                                        perspiciatis</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="feather-link-2 me-2"></i>
                                                        https:example.com</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="chat-notification">
                                    <ul>
                                        <li>
                                            <p><i class="fa-solid fa-bell"></i> Notifications</p>
                                            <div
                                                class="status-toggle blue-tog d-flex justify-content-sm-end align-items-center">
                                                <input type="checkbox" id="status_1" class="check" checked="">
                                                <label for="status_1" class="checktoggle">checkbox</label>
                                            </div>
                                        </li>
                                        <li>
                                            <p><i class="fa-solid fa-star"></i> Add To Favourites</p>
                                            <div
                                                class="status-toggle blue-tog d-flex justify-content-sm-end align-items-center">
                                                <input type="checkbox" id="status_2" class="check" checked="">
                                                <label for="status_2" class="checktoggle">checkbox</label>
                                            </div>
                                        </li>
                                        <li>
                                            <p><i class="fa-solid fa-volume-xmark"></i> Mute</p>
                                            <div
                                                class="status-toggle blue-tog d-flex justify-content-sm-end align-items-center">
                                                <input type="checkbox" id="status_3" class="check">
                                                <label for="status_3" class="checktoggle">checkbox</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="clear-list">
                                    <ul>
                                        <li><a href="#"><i class="feather-trash-2"></i>Clear Chat</a></li>
                                        <li><a href="#"><i class="feather-external-link"></i>Export Chat</a></li>
                                        <li><a href="#"><i class="feather-alert-circle"></i>Report Contact</a></li>
                                    </ul>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
               
                @endif

            </div>
        </div>
    </div>
</div>