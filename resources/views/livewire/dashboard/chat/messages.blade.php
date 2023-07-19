{{-- <div> --}}
    <div class="user-chats">
        <div class="chats">

            @foreach ($messages as $msg)

                @if (Auth::user()->id == $msg['admin_id'])
                    <div class="chat">
                        <div class="chat-avatar">
                            <span class="avatar box-shadow-1 cursor-pointer">
                                <img src="http://localhost/asset/images/portrait/small/avatar-s-11.jpg"
                                    alt="avatar" height="36" width="36" />
                            </span>
                        </div>
                        <div class="chat-body">
                            <div class="chat-content">
                                <p>{{$msg['message']}}</p>
                            </div>
                        </div>
                    </div>

                @else
                <div class="chat chat-left">
                    <div class="chat-avatar">
                        <span class="avatar box-shadow-1 cursor-pointer">
                            <img src="http://localhost/asset/images/portrait/small/avatar-s-11.jpg"
                                alt="avatar" height="36" width="36" />
                        </span>
                    </div>
                    <div class="chat-body">
                        <div class="chat-content">
                            <p>{{$msg['message']}}</p>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            {{--
            <div class="divider">
                <div class="divider-text">Yesterday</div>
            </div>
            <div class="chat">
                <div class="chat-avatar">
                    <span class="avatar box-shadow-1 cursor-pointer">
                        <img src="http://localhost/asset/images/portrait/small/avatar-s-11.jpg"
                            alt="avatar" height="36" width="36" />
                    </span>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                        <p>Absolutely!</p>
                    </div>
                    <div class="chat-content">
                        <p>Vuexy admin is the responsive bootstrap 4 admin template.</p>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
    {{-- </div> --}}
