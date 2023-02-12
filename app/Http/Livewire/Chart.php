<?php

namespace App\Http\Livewire;
use Carbon\Carbon;

use App\Models\orderProduct;
use Livewire\Component;

class Chart extends Component
{
    public $startDate;
    public $endDate;
    public $orders=[];
    public $dates=[];

    public function mount()
    {
     $this->searchDate();
    }

    public function render()
    {
        //$this->orders;
        return view('livewire.chart');
    }

    public function searchDate(){
        $this->orders=[];
        $this->dates=[];
        //dd($this->orders);
        $start_date = Carbon::parse($this->startDate);
        $end_date = Carbon::parse($this->endDate);
        while ($start_date->lte($end_date)) {
            array_push($this->dates, $start_date->format('Y-m-d'));
            $start_date->addDay();
        }

    foreach ($this->dates as $date) {
        $this->orders[]=orderProduct::Today($date)->count();
    }
    $this->startDate='';
    $this->endDate='';
    }
}
