<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $total = 0;
    protected $listeners = ['updateCartCount' => 'cartCount'];
    public function render()
    {
        $this->cartCount();

        return view('livewire.counter');
    }

    public function cartCount()
    {
        $session= session()->get('cart') == null ? [] : session()->get('cart');
        $this->total = count($session);

    }

}
