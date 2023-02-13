<?php

namespace App\Http\Livewire;

use App\Models\orderProduct;
use Livewire\Component;

class Cancel extends Component
{
    public $orders;

    public function render()
    {
        $this->orders= orderProduct::where('user_id','=',auth()->user()->id)->latest('id')->get();
        return view('livewire.cancel');
    }

    public function cancel($id)
    {
        $order=orderProduct::find($id);
       $order->cancel=1;
       $order->update();

        return back();
    }

    public function unCancel($id){
        $order=orderProduct::find($id);
        $order->cancel=0;
        $order->update();

        return back();
    }
}
