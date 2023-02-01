<?php

namespace App\Console\Commands;

use App\Models\orderProduct;
use Carbon\Carbon;
use Illuminate\Console\Command;

class orderClear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Order clear last month';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if ($this->confirm('Do you wish to delete last Month Order ?')) {
            $lastMonthStart = Carbon::now()->subMonth()->startOfMonth();
            $lastMonthEnd = Carbon::now()->subMonth()->endOfMonth();
            $order = orderProduct::whereBetween('created_at', [$lastMonthStart, $lastMonthEnd])->delete();
            $this->info('Last Month Orders is deleted');
        }
    }
}
