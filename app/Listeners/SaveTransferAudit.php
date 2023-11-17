<?php

namespace App\Listeners;

use App\Events\TransferExecuted;
use App\Models\TransferAudit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SaveTransferAudit
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

        TransferAudit::create([
            'customer_id' => $ledger->customer_id,
            'ip_address' => request()->ip(),
            'location' => request()->header('X-Location'),
            'amount' => $ledger->amount
        ]);
    }
}
