<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ImageUpload
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $voucherId;
    public $customerId;
    public $verified;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($voucherId, $customerId, $verified)
    {
        $this->voucherId = $voucherId;
        $this->customerId = $customerId;
        $this->verified = $verified;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
