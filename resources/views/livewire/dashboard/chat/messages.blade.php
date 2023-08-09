<div>

        @foreach ($messageso as $msg)
            @if (Auth::guard('admin')->user()->id == $msg['admin_id'])
            <div class="chat chat-left">
                <div class="chat-avatar">
                    <span class="avatar box-shadow-1 cursor-pointer">
                        <img src="../../../app-assets/images/portrait/small/avatar-s-7.jpg" alt="avatar"
                            height="36" width="36" />
                    </span>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                        <p>ME : {{  $msg['message'] }}</p>

                    </div>
                </div>
            </div>

            @else
            <div class="chat">
                <div class="chat-avatar">
                    <span class="avatar box-shadow-1 cursor-pointer">
                        <img src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar"
                            height="36" width="36" />
                    </span>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                        <p> {{  $msg['message'] }}</p>
                    {{--<p> {{ $msg->user->client_name . ' : ' . $msg['message'] }}</p>--}}
                  
                    </div>
                </div>
            </div>
            @endif
        @endforeach

</div>
