<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;

class RecordTransactionForm extends Component
{
    public $buy = false;

    public $stock;
    public $shares;
    public $exchangeRate;

    protected $listeners = ['stockSet' => 'setStock', 'formSubmit' => 'resetForm'];

    public function render()
    {
        return view('livewire.record-transaction-form');
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function resetForm()
    {
        unset($this->stock);
        unset($this->shares);
        unset($this->exchangeRate);
    }

    public function toggleRecord()
    {
        $this->buy = !$this->buy;
    }

    public function createTransaction()
    {
        auth()->user()->transactions()->create([
            'transactionable_id' => $this->stock['id'],
            'transactionable_type' => Stock::class,
            'type' => $this->buy ? 'buy' : 'sell',
            'qty' => $this->shares,
            'balance' => $this->buy ? $this->shares : null,
            'exchange_rate' => $this->exchangeRate,
        ]);

        auth()->user()->stocks()->syncWithoutDetaching([$this->stock['id']]);

        $this->emit('formSubmit');
    }
}
