<div class="content-area-wrapper container-xxl p-0">
    <div class="sidebar-left">
        <div class="sidebar">

            <!-- Chat Sidebar area -->
            <div class="sidebar-content">
                <span class="sidebar-close-icon">
                    <i data-feather="x"></i>
                </span>
                <!-- Sidebar header start -->
                {{-- <div class="chat-fixed-search">
                <div class="d-flex align-items-center w-100">
                    <div class="sidebar-profile-toggle">
                        <div class="avatar avatar-border">
                            <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="user_avatar" height="42" width="42" />
                            <span class="avatar-status-online"></span>
                        </div>
                    </div>
                    <div class="input-group input-group-merge ms-1 w-100">
                        <span class="input-group-text round"><i data-feather="search" class="text-muted"></i></span>
                        <input type="text" class="form-control round" id="chat-search" placeholder="Search or start a new chat" aria-label="Search..." aria-describedby="chat-search" />
                    </div>
                </div>
            </div> --}}
                <!-- Sidebar header end -->

                <!-- Sidebar Users start -->
                <div id="users-list" class="chat-user-list-wrapper list-group">
                    <h4 class="chat-list-title">Contacts</h4>
                    <ul class="chat-users-list contact-list media-list">

                        @forelse($cc as $i)
                            <li>
                                {{-- <span class="avatar"><img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" height="42" width="42" alt="Generic placeholder image" /> --}}
                                </span>
                                <div class="chat-info" wire:click="loadmessage({{ $i->id }})">
                                    <h5 class="mb-0">{{ $i->user->client_name }}</h5>
                                    {{-- <p class="card-text text-truncate">
                                    Tart dragée carrot cake chocolate bar. Chocolate cake jelly beans
                                    caramels tootsie roll candy canes.
                                </p> --}}
                                </div>
                            </li>
                        @empty
                            <li class="no-results">
                                <h6 class="mb-0">No Contacts Found</h6>
                            </li>
                        @endforelse
                    </ul>
                </div>
                <!-- Sidebar Users end -->
            </div>
            <!--/ Chat Sidebar area -->

        </div>
    </div>
    <div class="content-right">
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="body-content-overlay"></div>

                <section class="chat-app-window">

                    <div class="start-chat-area d-none">
                        <div class="mb-1 start-chat-icon">
                            <i data-feather="message-square"></i>
                        </div>
                        <h4 class="sidebar-toggle start-chat-text">Start Conversation</h4>
                    </div>
                    <div class="active-chat ">
                        <!-- Chat Header -->
                        <div class="chat-navbar">
                            <header class="chat-header">
                                <div class="d-flex align-items-center">
                                    <div class="sidebar-toggle d-block d-lg-none me-1">
                                        <i data-feather="menu" class="font-medium-5"></i>
                                    </div>
                                    <div class="avatar avatar-border user-profile-toggle m-0 me-1">
                                        <img src="http://localhost/asset/images/portrait/small/avatar-s-11.jpg"
                                            alt="avatar" height="36" width="36" />
                                        <span class="avatar-status-busy"></span>
                                    </div>
                                    <h6 class="mb-0">{{ $cc[0]->user->client_name }}</h6>
                                </div>
                                <div class="d-flex align-items-center">

                                    <div class="dropdown">
                                        <button class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle"
                                            type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i data-feather="more-vertical" id="chat-header-actions"
                                                class="font-medium-2"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="chat-header-actions">
                                            <a class="dropdown-item" href="#">View Contact</a>
                                            <a class="dropdown-item" href="#">Mute Notifications</a>
                                            <a class="dropdown-item" href="#">Block Contact</a>
                                            <a class="dropdown-item" href="#">Clear Chat</a>
                                            <a class="dropdown-item" href="#">Report</a>
                                        </div>
                                    </div>
                                </div>
                            </header>
                        </div>
                        @if ($conversions_id != null)
                        <livewire:dashboard.chat.messages :id='$conversions_id '/>
                        <form class="chat-app-form">
                            <div class="input-group input-group-merge me-1 form-send-message">
                                <span class="speech-to-text input-group-text"><i data-feather="mic"
                                    class="cursor-pointer"></i></span>
                                    <input type="text" class="form-control message"
                                    placeholder="Type your message or use speech to text" />
                                    <span class="input-group-text">
                                        <label for="attach-doc" class="attachment-icon form-label mb-0">
                                        <i data-feather="image" class="cursor-pointer text-secondary"></i>
                                        <input type="file" id="attach-doc" hidden /> </label></span>
                                    </div>
                                    <button type="button" class="btn btn-primary " wire:click.prevent="sentmessage">
                                        <i data-feather="send" class="d-lg-none"></i>
                                        <span class="d-none d-lg-block">ارسال </span>
                                    </button>
                                </form>


                        @endif



                    </div>

                </section>



            </div>
        </div>
    </div>
</div>
