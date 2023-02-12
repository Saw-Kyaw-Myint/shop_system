<div>
    @foreach ($orders as $item)
        <p class="d-none">{{ $item }}</p>
    @endforeach
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <h3>Daily Chart</h3>
                <div class="">
                    <form wire:submit.prevent="searchDate">
                        @csrf
                        <input type="date" class="" wire:model="startDate">
                        <input type="date" class="" wire:model="endDate">
                        <button>search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <canvas id="dailyChart"></canvas>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js" integrity="sha512-QEiC894KVkN9Tsoi6+mKf8HaCLJvyA6QIRzY5KrfINXYuP9NxdIkRQhGq3BZi0J4I7V5SidGM3XUQ5wFiMDuWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let dates = {!! json_encode($dates) !!};
        let orders = {!! json_encode($orders) !!};
        //dailyChart



        const dailyChart = document.getElementById('dailyChart');

       let myChart= new Chart(dailyChart, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                    label: '# of Votes',
                    data: orders,
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

    //    window.livewire.on('searchDate', (newData) => {
    //    chart.data = newData;
    //    chart.update();
    //});
    </script>
</div>
