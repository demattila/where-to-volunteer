<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApplyResponse implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $event;
    public $volunteerId;

    /**
     * Create a new event instance.
     *
     * @param $eventname
     */
    public function __construct($eventname,$isAccepted,$volunteerId)
    {
        $this->volunteerId = $volunteerId;
        $this->event = $eventname;
        if($isAccepted === true){
            $this->message  = "Your apply had been accepted!";
        }
        if($isAccepted === false){
            $this->message  = "Your apply had been rejected!";
        }
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('my-channel'.$this->volunteerId);
        return ['my-channel'.$this->volunteerId];
    }

    public function broadcastAs()
    {
        return 'apply_response';
    }
}
