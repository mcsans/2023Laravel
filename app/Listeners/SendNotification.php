<?php

namespace App\Listeners;

use App\Events\TransferExecuted;
use App\Models\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TransferExecuted $event): void
    {
        $ledger = $event->getLedger();

        Notification::create([
            'customer_id' => $ledger->customer_id,
            'title' => 'TRANSFER SUCCESS',
            'body' => 'Your Tranfer from '.$ledger->src_account.' To '.$ledger->dst_account
        ]);
    }
}
