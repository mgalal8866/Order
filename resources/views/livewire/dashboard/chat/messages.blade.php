<div>

        @foreach ($messageso as $msg)
            @if (Auth::guard('admin')->user()->id == $msg['admin_idsite'])
            <div class="chat chat-left">
                <div class="chat-avatar">
                    <span class="avatar box-shadow-1 cursor-pointer">
                        <img src="{{ Avatar::create( Auth::guard('admin')->user()->employee->name??'')->setFontFamily('Cairo')->toBase64() }}" alt="avatar"
                            height="36" width="36" />
                    </span>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                        <p>{{  $msg['message'] }}</p>
                        <p> <font size="-3">{{Carbon::parse($msg['created_at'])->translatedFormat('H:i A / m-d-Y') }} </font></p>
                    </div>
                </div>
            </div>

            @else
            <div class="chat">
                <div class="chat-avatar">
                    <span class="avatar box-shadow-1 cursor-pointer">
                        <img src="{{Avatar::create($name)->setFontFamily('Cairo')->toBase64() }}" alt="avatar"
                            height="36" width="36" />
                    </span>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                        <p> {{  $msg['message'] }}</p>
                       <p> <font size="-3">{{Carbon::parse($msg['created_at'])->translatedFormat('H:i A / m-d-Y') }} </font></p>
                    {{--<p> {{ $msg->user->client_name . ' : ' . $msg['message'] }}</p>--}}

                    </div>
                </div>
            </div>
            @endif
        @endforeach

</div>
