<div>
    <div class="row">
        <div class=" col-12 col-md-5">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title text-primary">Month Product Sale Table</h3>
                  <div class=" float-right">
                    <p class=" border border-gray p-1" data-toggle="dropdown" >
                        <i class="fas fa-list"></i>
                        <span>Chose Month</span>
                    </p>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @foreach ($months as $month)
                        <button  class="dropdown-item" wire:click="income({{ $month }})">
                            <span class=" text-muted text-sm">{{ date('F', strtotime("2023-$month-06")) }}</span>
                        </button>
                        <div class="dropdown-divider"></div>
                        @endforeach
                    
                    </div>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th>Month</th>
                        <th>Progress</th>
                        <th style="width: 40px">percentage</th>
                        <th >totol sale</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>{{ $searchMonth }}</td>
                        <td>
                          <div class="progress progress-xs mt-2">
                            <div class="progress-bar progress-bar-danger" style="width: {{ $percentage }}%"></div>
                          </div>
                        </td>
                        <td ><span class="badge bg-danger">{{ $percentage }}%</span></td>
                        <td class=" d-flex align-items-center"><span class="badge bg-success">{{ $priceByMonth }}</span>{{ __('message.mmk') }}</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>

    </div>
</div>
