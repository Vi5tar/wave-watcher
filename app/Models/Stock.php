<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    /**
     * The users that belong to the stock.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getCurrentRate()
    {
        return rand(0, 4000);
    }
}
