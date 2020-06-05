<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Softdeletes;

class TransactionDetail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'transactions_id', 'username', 'nationality', 'is_visa', 'doe_passport' 
    ];

    protected $hidden = [

    ];

    // relasikan transaction detail dengan transaction
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transactions_id', 'id');
    }

}
