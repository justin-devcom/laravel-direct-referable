<?php

namespace Jxclsv\Referable\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Jxclsv\Referable\Contracts\DirectReferable;
use Jxclsv\Referable\Models\DirectReferralBonus;

class DirectAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Referable is attached to
     *
     * $user
     */
    protected $user;

    /**
     * Newly registered referable
     *
     * $referable
     */
    protected $referable;

    /**
     * direct referral bonus
     *
     * $referable
     */
    protected $bonus;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DirectReferable $user, DirectReferable $referable, DirectReferralBonus $bonus)
    {
        $this->user = $user;

        $this->bonus = $bonus;

        $this->referable = $referable;
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
