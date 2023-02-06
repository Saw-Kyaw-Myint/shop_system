<?php

namespace App\Http\Livewire;

use App\Models\orderProduct;
use Carbon\Carbon;
use Livewire\Component;

class SummeryMonth extends Component
{
    public $months = [],
        $priceByMonth = 0,
        $priceByYear = 0,
        $percentage = 0,
        $searchMonth = "Choice Month";

    /**
     * add order cart.
     *
     * @return back()
     */
    public function mount()
    {
        $orderProducts = orderProduct::latest('id')->get();
        $orderMonths = [];
        foreach ($orderProducts as $key => $orderProduct) {
            $orderMonths[] = $orderProduct->created_at->format('m');
        }
        $this->months = array_unique($orderMonths);
        $this->priceByMonth;
        $this->searchMonth;
        $this->percentage;
    }

    public function render()
    {
        return view('livewire.summery-month');
    }

    /**
     *order price by month.
     *
     * @return back()
     */
    public function  income($month)
    {
        $this->priceByMonth = 0;
        $this->priceByYear = 0;
        $orderByMonth = orderProduct::Filter($month)->get();
        foreach ($orderByMonth as $key => $value) {
            $this->priceByMonth += $value->product->price * $value->quantity;
        }
        $currentYear = Carbon::now()->year;
        $orderByYear = orderProduct::YearFilter($currentYear)->get();
        foreach ($orderByYear as $key => $value) {
            $this->priceByYear += $value->product->price * $value->quantity;
        }
        $this->percentage = ($this->priceByMonth / $this->priceByYear) * 100;
        $this->percentage = round($this->percentage, 2);
        $this->searchMonth = date('F', strtotime("2023-$month-06"));
    }
}
