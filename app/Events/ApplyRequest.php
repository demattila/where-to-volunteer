<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApplyRequest implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $event;
    public $eventName;
    public $ownerId;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($event,$volunteername,$isApplied)
    {
        $this->event = $event;
        $this->eventName = $event->title;
        $this->ownerId = $event->owner->id;

        if($isApplied){
            $this->message = $volunteername." has applied to your event!";
        }
        else{
            $this->message = $volunteername." has canceled the apply!";
        }

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
//        return new PrivateChannel('channel-name');
        return ['my-channel'.$this->ownerId];
    }

    public function broadcastAs()
    {
        return 'apply_request';
    }
}
