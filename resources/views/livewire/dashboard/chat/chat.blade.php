<div class="content-area-wrapper container-xxl p-0">
    <div class="sidebar-left">
        <div class="sidebar">
            <!-- Admin user profile area -->
            <div class="chat-profile-sidebar">
                {{-- <header class="chat-profile-header">
                    <span class="close-icon">
                        <i data-feather="x"></i>
                    </span>
                    <!-- User Information -->
                    <div class="header-profile-sidebar">
                        <div class="avatar box-shadow-1 avatar-xl avatar-border">
                            <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="user_avatar" />
                            <span class="avatar-status-online avatar-status-xl"></span>
                        </div>
                        <h4 class="chat-user-name">John Doe</h4>
                        <span class="user-post">Admin</span>
                    </div>
                    <!--/ User Information -->
                </header> --}}
                <!-- User Details start -->
                {{-- <div class="profile-sidebar-area">
                    <h6 class="section-label mb-1">About</h6>
                    <div class="about-user">
                        <textarea data-length="120" class="form-control char-textarea" id="textarea-counter" rows="5"
                            placeholder="About User">
                            Dessert chocolate cake nie brownie marshmallow.</textarea>
                        <small class="counter-value float-end"><span class="char-count">108</span> / 120 </small>
                    </div>
                    <!-- To set user status -->
                    <h6 class="section-label mb-1 mt-3">Status</h6>
                    <ul class="list-unstyled user-status">
                        <li class="pb-1">
                            <div class="form-check form-check-success">
                                <input type="radio" id="activeStatusRadio" name="userStatus" class="form-check-input"
                                    value="online" checked />
                                <label class="form-check-label ms-25" for="activeStatusRadio">Active</label>
                            </div>
                        </li>
                        <li class="pb-1">
                            <div class="form-check form-check-danger">
                                <input type="radio" id="dndStatusRadio" name="userStatus" class="form-check-input"
                                    value="busy" />
                                <label class="form-check-label ms-25" for="dndStatusRadio">Do Not Disturb</label>
                            </div>
                        </li>
                        <li class="pb-1">
                            <div class="form-check form-check-warning">
                                <input type="radio" id="awayStatusRadio" name="userStatus" class="form-check-input"
                                    value="away" />
                                <label class="form-check-label ms-25" for="awayStatusRadio">Away</label>
                            </div>
                        </li>
                        <li class="pb-1">
                            <div class="form-check form-check-secondary">
                                <input type="radio" id="offlineStatusRadio" name="userStatus" class="form-check-input"
                                    value="offline" />
                                <label class="form-check-label ms-25" for="offlineStatusRadio">Offline</label>
                            </div>
                        </li>
                    </ul>
                    <!--/ To set user status -->

                    <!-- User settings -->
                    <h6 class="section-label mb-1 mt-2">Settings</h6>
                    <ul class="list-unstyled">
                        <li class="d-flex justify-content-between align-items-center mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="check-square" class="me-75 font-medium-3"></i>
                                <span class="align-middle">Two-step Verification</span>
                            </div>
                            <div class="form-check form-switch me-0">
                                <input type="checkbox" class="form-check-input" id="customSwitch1" checked />
                                <label class="form-check-label" for="customSwitch1"></label>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between align-items-center mb-1">
                            <div class="d-flex align-items-center">
                                <i data-feather="bell" class="me-75 font-medium-3"></i>
                                <span class="align-middle">Notification</span>
                            </div>
                            <div class="form-check form-switch me-0">
                                <input type="checkbox" class="form-check-input" id="customSwitch2" />
                                <label class="form-check-label" for="customSwitch2"></label>
                            </div>
                        </li>
                        <li class="mb-1 d-flex align-items-center cursor-pointer">
                            <i data-feather="user" class="me-75 font-medium-3"></i>
                            <span class="align-middle">Invite Friends</span>
                        </li>
                        <li class="d-flex align-items-center cursor-pointer">
                            <i data-feather="trash" class="me-75 font-medium-3"></i>
                            <span class="align-middle">Delete Account</span>
                        </li>
                    </ul>
                    <!--/ User settings -->

                    <!-- Logout Button -->
                    <div class="mt-3">
                        <button class="btn btn-primary">
                            <span>Logout</span>
                        </button>
                    </div>
                    <!--/ Logout Button -->
                </div> --}}
                <!-- User Details end -->
            </div>
            <!--/ Admin user profile area -->

            <!-- Chat Sidebar area -->
            <div class="sidebar-content">
                <span class="sidebar-close-icon">
                    <i data-feather="x"></i>
                </span>
                <!-- Sidebar header start -->
                <div class="chat-fixed-search">
                    <div class="d-flex align-items-center w-100">
                        <div class="sidebar-profile-toggle">
                            <div class="avatar avatar-border">
                                <img src="" alt="user_avatar" height="42" width="42" />
                                <span class="avatar-status-online"></span>
                            </div>
                        </div>
                            {{-- <div class="input-group input-group-merge ms-1 w-100">
                                <span class="input-group-text round"><i data-feather="search"
                                        class="text-muted"></i></span>
                                <input type="text" class="form-control round" id="chat-search"
                                    placeholder="Search or start a new chat" aria-label="Search..."
                                    aria-describedby="chat-search" />
                            </div> --}}
                    </div>
                </div>
                <!-- Sidebar header end -->

                <!-- Sidebar Users start -->
                <div id="users-list" class="chat-user-list-wrapper list-group">
                    <h4 class="chat-list-title">Chats</h4>
                    <ul  class="chat-users-list chat-list media-list">
                        @forelse($cc as $i)
                            <li @if ($conversions_id == $i->id) class="active" @endif>
                                <div class="chat-info" wire:click.prevent="loadmessage({{ $i->id }},{{ $i->user->client_name}})">
                                    <h5 class="mb-0">{{ $i->user->client_name }} </h5>
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
                <!-- Main chat area -->
                <section class="chat-app-window">
                    <!-- To load Conversation -->
                    <div class="start-chat-area  @if ($conversions_id != null)
                    d-none
                    @endif">
                        <div class="mb-1 start-chat-icon">
                            <i data-feather="message-square"></i>
                        </div>
                        <h4 class="sidebar-toggle start-chat-text">Start Conversation</h4>
                    </div>
                    <!--/ To load Conversation -->

                    {{-- @if ($conversions_id != null) --}}
                        <div class="active-chat" wire:ignoure.self>

                            <div class="chat-navbar">
                                <header class="chat-header">
                                    <div class="d-flex align-items-center">
                                        <div class="sidebar-toggle d-block d-lg-none me-1">
                                            <i data-feather="menu" class="font-medium-5"></i>
                                        </div>
                                        {{-- <div class="avatar avatar-border user-profile-toggle m-0 me-1">
                                            <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg"
                                                alt="avatar" height="36" width="36" />
                                            <span class="avatar-status-busy"></span>
                                        </div> --}}
                                        <h6 class="mb-0">{{$nameuser ?? '' }}</h6>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <i data-feather="phone-call"
                                            class="cursor-pointer d-sm-block d-none font-medium-2 me-1"></i>
                                        <i data-feather="video"
                                            class="cursor-pointer d-sm-block d-none font-medium-2 me-1"></i>
                                        <i data-feather="search"
                                            class="cursor-pointer d-sm-block d-none font-medium-2"></i>
                                        <div class="dropdown">
                                            <button
                                                class="btn-icon btn btn-transparent hide-arrow btn-sm dropdown-toggle"
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
                            <div class="user-chats" wire:ignore.self>
                                <div class="chats">
                                    @if ($conversions_id != null)
                                        <livewire:dashboard.chat.messages :id='$conversions_id' />
                                    @endif

                                </div>
                            </div>
                            @if ($conversions_id != null)
                                <form class="chat-app-form">
                                    <div class="input-group input-group-merge me-1 form-send-message">
                                        <span class="speech-to-text input-group-text"><i data-feather="mic"
                                                class="cursor-pointer"></i></span>
                                        <input wire:model='text' type="text" class="form-control message"
                                            placeholder="Type your message or use speech to text" />

                                    </div>
                                    <button type="button" class="btn btn-primary " wire:click.prevent="sentmessage">
                                        <i data-feather="send" class="d-lg-none"></i>
                                        <span class="d-none d-lg-block">ارسال </span>
                                    </button>
                                </form>
                            @endif
                        </div>
                    {{-- @endif --}}
                </section>
                <!--/ Main chat area -->

                <!-- User Chat profile right area -->
                <div class="user-profile-sidebar">
                    <header class="user-profile-header">
                        <span class="close-icon">
                            <i data-feather="x"></i>
                        </span>
                        <!-- User Profile image with name -->
                        <div class="header-profile-sidebar">
                            <div class="avatar box-shadow-1 avatar-border avatar-xl">
                                <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="user_avatar"
                                    height="70" width="70" />
                                <span class="avatar-status-busy avatar-status-lg"></span>
                            </div>
                            <h4 class="chat-user-name">Kristopher Candy</h4>
                            <span class="user-post">UI/UX Designer 👩🏻‍💻</span>
                        </div>
                        <!--/ User Profile image with name -->
                    </header>
                    <div class="user-profile-sidebar-area">
                        <!-- About User -->
                        <h6 class="section-label mb-1">About</h6>
                        <p>Toffee caramels jelly-o tart gummi bears cake I love ice cream lollipop.</p>
                        <!-- About User -->
                        <!-- User's personal information -->
                        <div class="personal-info">
                            <h6 class="section-label mb-1 mt-3">Personal Information</h6>
                            <ul class="list-unstyled">
                                <li class="mb-1">
                                    <i data-feather="mail" class="font-medium-2 me-50"></i>
                                    <span class="align-middle">kristycandy@email.com</span>
                                </li>
                                <li class="mb-1">
                                    <i data-feather="phone-call" class="font-medium-2 me-50"></i>
                                    <span class="align-middle">+1(123) 456 - 7890</span>
                                </li>
                                <li>
                                    <i data-feather="clock" class="font-medium-2 me-50"></i>
                                    <span class="align-middle">Mon - Fri 10AM - 8PM</span>
                                </li>
                            </ul>
                        </div>
                        <!--/ User's personal information -->

                        <!-- User's Links -->
                        <div class="more-options">
                            <h6 class="section-label mb-1 mt-3">Options</h6>
                            <ul class="list-unstyled">
                                <li class="cursor-pointer mb-1">
                                    <i data-feather="tag" class="font-medium-2 me-50"></i>
                                    <span class="align-middle">Add Tag</span>
                                </li>
                                <li class="cursor-pointer mb-1">
                                    <i data-feather="star" class="font-medium-2 me-50"></i>
                                    <span class="align-middle">Important Contact</span>
                                </li>
                                <li class="cursor-pointer mb-1">
                                    <i data-feather="image" class="font-medium-2 me-50"></i>
                                    <span class="align-middle">Shared Media</span>
                                </li>
                                <li class="cursor-pointer mb-1">
                                    <i data-feather="trash" class="font-medium-2 me-50"></i>
                                    <span class="align-middle">Delete Contact</span>
                                </li>
                                <li class="cursor-pointer">
                                    <i data-feather="slash" class="font-medium-2 me-50"></i>
                                    <span class="align-middle">Block Contact</span>
                                </li>
                            </ul>
                        </div>
                        <!--/ User's Links -->
                    </div>
                </div>
                <!--/ User Chat profile right area -->

            </div>
        </div>
    </div>
</div>
@push('jslive')
@endpush
