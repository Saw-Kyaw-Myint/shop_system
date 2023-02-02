<div>
    <div class="row">
        <div class=" col-12 col-md-5">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Condensed Full Width Table</h3>
                  <div class=" float-right">
                    <p class=" border border-gray p-1" data-toggle="dropdown" >
                        <i class="fas fa-list"></i>
                        <span>Chose Month</span>
                    </p>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        @foreach ($months as $month)
                        <button  class="dropdown-item" wire:click="income({{ $month->format('m') }})">
                            <span class=" text-muted text-sm">{{ $month->format('M') }}</span>
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
                        <th style="width: 10px">#</th>
                        <th>{{ $priceByMonth }}</th>
                        <th>Progress</th>
                        <th style="width: 40px">Label</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1.</td>
                        <td>Update software</td>
                        <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                          </div>
                        </td>
                        <td><span class="badge bg-danger">55%</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>

    </div>
</div>
