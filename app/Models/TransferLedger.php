<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransferLedger extends Model
{
    use HasFactory;

    protected  $fillable = [
        'customer_id',
        'src_account',
        'dst_account',
        'tran_type',
        'amount',
    ];
}
