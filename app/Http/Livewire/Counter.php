<?php

namespace App\Http\Livewire;

use App\Models\Shoppingcart;
use Livewire\Component;

class Counter extends Component
{
    public $total=0;
    protected $listeners=['updateCartCount'=>'cartCount'];
    public function render()
    {
        $this->cartCount();

        return view('livewire.counter');
    }

    public function cartCount(){
        if(session()->get('cart')!=null){
            $this->total=count(session()->get('cart'));
        }else{
            $this->total=0;
        }
       
    }

}
