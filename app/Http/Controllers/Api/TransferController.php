<?php

namespace App\Http\Controllers\Api;

use App\Events\TransferExecuted;
use App\Http\Controllers\Controller;
use App\Models\TransferLedger;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function transfer(Request $request)
    {
        $ledger = TransferLedger::create([
            'customer_id' => $request->customer_id,
            'src_account' => $request->src_account,
            'dst_account' => $request->dst_account,
            'tran_type'   => '0',
            'amount'      => $request->amount,
        ]);

        event(new TransferExecuted($ledger));

        return response()->json([
            'data' => $ledger
        ]);
    }
}
