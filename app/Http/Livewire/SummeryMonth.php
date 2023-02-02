<?php

namespace App\Http\Livewire;

use App\Models\orderProduct;
use Livewire\Component;

class SummeryMonth extends Component
{

public $months=[],$priceByMonth=0;

public function mount(){
    $orderProducts=orderProduct::latest('id')->get();
    $orderMonths=[];
    foreach ($orderProducts as $key => $orderProduct) {
    $orderMonths[]=$orderProduct->created_at;
    }
    $this->months=array_unique( $orderMonths);
    $this->priceByMonth;
}
  
    public function render()
    {
        return view('livewire.summery-month');
    }

    public function  income($month){

        $month=$month->format('m');
        dd($month);
        $orderByMonth=orderProduct::Filter($month)->get();
        
        foreach ($orderByMonth as $key => $value) {
            $this->priceByMonth += $value->product->price * $value->quantity;
        }
    dd($this->priceByMonth);
        }
}
