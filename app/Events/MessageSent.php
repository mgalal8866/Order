<?php

namespace App\Events;

use App\Facade\Tenants;
use App\Models\User;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected $user;

    public $message;
    /**
     * Create a new event instance.
     */
    // public function __construct(String $user, String $message)
    // {
    //     $this->user = $user;
    //     $this->message = $message;
    // }
    public function __construct( $message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        $domain = Tenants::getdomain();
        return [
            new Channel('chat.'.$domain.'.'.$this->message->conversions_id),
        ];
    }
    public function broadcastAs()
    {
        return  'message';
    }
}
