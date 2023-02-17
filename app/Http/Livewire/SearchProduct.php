<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchProduct extends Component
{
    public $q;

    public function render()
    {
        return view('livewire.search-product');
    }
    
    public function search(){
    session()->forget('category');
    $this->emit('productSearch',trim($this->q));
    $this->q=" ";
    }
}
