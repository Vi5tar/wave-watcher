<?php

namespace App\Http\Livewire;

use App\Models\Stock;
use Livewire\Component;

class SearchStocks extends Component
{
    public $search = '';
    public $stocks = [];
    public $stock;

    protected $listeners = ['formSubmit' => 'resetForm'];

    public function mount()
    {
        $this->stocks = Stock::all();
    }

    public function render()
    {
        return view('livewire.search-stocks');
    }

    public function resetForm()
    {
        unset($this->stock);
        $this->search = '';
    }

    /**
    *
    */
    public function updating()
    {
        $this->stocks = [];
    }

    public function updatedSearch()
    {
        $this->stocks = Stock::where('name', 'like',  "%$this->search%")
            ->orWhere('symbol', 'like', "%$this->search%")
            ->get();

        $this->stock = null;
    }

    /**
    *
    */
    public function setStock($stock)
    {
        if ($stock instanceof Stock){
            $this->stock = $stock;
            $this->search = "{$this->stock->name}";
        } else if ($stock) {
            $this->setStock(Stock::find($stock));
        }

        $this->emit('stockSet', $this->stock);
    }
}