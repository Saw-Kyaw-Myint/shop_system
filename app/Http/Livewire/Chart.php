<?php

namespace App\Http\Livewire;

use App\Models\orderProduct;
use Carbon\Carbon;
use Livewire\Component;

class Chart extends Component
{
    public $startDate;
    public $endDate;
    public $orders = [];
    public $dates = [];
    public $chartData = [];
    public $searchType=0;
    public $originDates=[];
    public $originOrders=[];
    public $currentDate;

    public function mount()
    {   
        $originMonths=[];
            for ($i = 0; $i < 12; $i++) {
                $originMonths[] = Carbon::now()->subMonth($i)->format('m');
                $this->originDates[] = Carbon::now()->subMonth($i)->format('F');
            }
            foreach ($originMonths as $c) {
                $data = orderProduct::Filter($c)->count();
                $this->originOrders[] = $data;
            }
    
// $this->searchDate();
    }

    public function render()
    {
        $current = Carbon::now();
        $this->currentDate = $current->toDateString();
        return view('livewire.chart');
    }

    public function searchDate()
    {
        $this->dates=[];
        $this->orders=[];
        
        if ($this->searchType == 1) {   
                $start_date = Carbon::parse($this->startDate);
                $end_date = Carbon::parse($this->endDate);
                while ($start_date->lte($end_date)) {
                    array_push($this->dates, $start_date->format('Y-m-d'));
                    $start_date->addDay();
                }
                foreach ($this->dates as $date) {
                    $this->orders[] = orderProduct::Today($date)->count();
                }
            } else
            if ($this->searchType == 2) {
                $startDate = Carbon::parse($this->startDate);
                $endDate = Carbon::parse($this->endDate);
                $current = $startDate->copy();
                $months = [];
                while ($current->lte($endDate)) {
                    $months[] = $current->format('m');
                    $this->dates[] = $current->format('F');
                    $current->addMonth();
                }
                foreach ($months as $date) {
                    $this->orders[] = orderProduct::Filter($date)->count();
                }
            
        }

        // $this->startDate = '';
        // $this->endDate = '';
        //  $this->searchType=0;


        $this->chartData = [
            'labels' => $this->dates,
            'data' => $this->orders,
        ];
       
        $this->emit('update-chart', $this->chartData);
    }
}
