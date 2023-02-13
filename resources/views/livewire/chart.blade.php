<div>
    @foreach ($orders as $item)
    <p class="d-none">{{ $item }}</p>
    @endforeach
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="">
                    <form wire:submit.prevent="searchDate">
                        @csrf
                        <select wire:model="searchType" class=" custom-select w-25">
                       <option>choice type</option>
                       <option value="1">Date</option>
                       <option value="2">Month</option>
                        </select>
                        <input type="text" class="" wire:model="startDate" onfocus="(this.type='date')" max="{{ $currentDate }}" placeholder="Start date" id="chart-date">
                        <input type="text" class=""  wire:model="endDate" onfocus="(this.type='date')"max="{{ $currentDate }}" placeholder="End Date" id="chart-date">
                        <button class="d-none">submit</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <canvas id="dailyChart"></canvas>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

        let dates = {!! json_encode($dates) !!};
        let orders = {!! json_encode($orders) !!};
        
        let originDates = {!! json_encode($originDates) !!};
        let originOrders = {!! json_encode($originOrders) !!};
        //dailyChart

        const dailyChart = document.getElementById('dailyChart');

        if (window.myChart) {
            window.myChart.destroy();
        }

        let myChart = new Chart(dailyChart, {
            type: 'line',
            data: {
                labels: originDates,
                datasets: [{
                    label: '# of Votes',
                    data: originOrders,
                    borderWidth: 1
                }, ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        window.livewire.on('update-chart', function(data) {
            myChart.data.labels = data.labels;
            myChart.data.datasets[0].data = data.data;
            myChart.update();
        });

        window.myChart = myChart;
    </script>
</div>