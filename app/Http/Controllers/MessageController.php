<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\conversion;
use App\Events\MessageSent;
use Illuminate\Http\Request;
use App\Http\Resources\MessageResource;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        // // PrivetMessage::dispatch('hello');
        // $cc = conversion::get();
        //     return view('livewire.dashboard.chat', compact(['cc']));
        return view('chat');
    }

    public function fetchMessages()
    {
        return MessageResource::collection(Message::get());
    }

    public function sendMessage(Request $request)
    {
         // $message = auth()->user()->messages()->create([
        //     'message' => $request->message
        // ]);

		// broadcast(new MessageSent(auth()->user(), $message))->toOthers();

        // return response()->json([
        //     'message' => 'Message Sent!',
        //     'status' => true,
        // ]);
        // $message = auth()->user()->messages()->create([
        //     'message' => $request->message
        // ]);

		// broadcast(new MessageSent(auth()->user(), $message))->toOthers();

        // return response()->json([
        //     'message' => 'Message Sent!',
        //     'status' => true,
        // ]);
    }


}
