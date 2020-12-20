<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'transactionable_id',
        'transactionable_type',
        'type',
        'qty',
        'balance',
        'exchange_rate',
    ];

    public function transactionable()
    {
        return $this->morphTo();
    }
}
