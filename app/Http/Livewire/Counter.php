<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $total = 0;
    protected $listeners = ['updateCartCount' => 'cartCount'];

    /**
     * cart count
     *
     * @return  counter
     */
    public function render()
    {
        $this->cartCount();

        return view('livewire.counter');
    }

    /**
     * count cart.
     *
     * @return  this->total
     */
    public function cartCount()
    {
        $session = session()->get('cart') == null ? [] : session()->get('cart');
        $this->total = count($session);
    }
}
