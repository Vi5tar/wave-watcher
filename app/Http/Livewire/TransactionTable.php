<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;

class TransactionTable extends Component
{
    public $transactions;

    protected  $listeners = ['formSubmit' => 'refreshTransactions'];

    public function render()
    {
        $this->transactions = auth()->user()->transactions()->where('transactionable_type', Stock::class)->latest()->get();

        return view('livewire.transaction-table');
    }

    public function refreshTransactions()
    {
        $this->transactions = auth()->user()->transactions;
    }
}
