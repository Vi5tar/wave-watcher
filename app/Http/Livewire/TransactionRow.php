<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use App\Models\Transaction;
use Livewire\Component;

class TransactionRow extends Component
{
    public $odd;
    public Transaction $transaction;
    public Stock $stock;
    
    public function render()
    {
        $this->stock = $this->transaction->transactionable;

        $this->tick();

        return view('livewire.transaction-row');
    }

    public function tick()
    {
        $this->stock->rate = $this->stock->getCurrentRate();
    }

    public function getGainProperty()
    {
        return round(($this->stock->rate * $this->transaction->qty) - ($this->transaction->qty * $this->transaction->exchange_rate), 2);
    }

    public function getShouldTrackProperty()
    {
        return $this->transaction->type !== 'sell' && $this->transaction->balance > 0;
    }
}
