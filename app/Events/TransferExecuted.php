<?php

namespace App\Events;

use App\Models\TransferLedger;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TransferExecuted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private TransferLedger $transferLedger;

    public function getLedger()
    {
        return $this->transferLedger;
    }

    /**
     * Create a new event instance.
     */
    public function __construct(TransferLedger $ledger)
    {
        $this->transferLedger = $ledger;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
