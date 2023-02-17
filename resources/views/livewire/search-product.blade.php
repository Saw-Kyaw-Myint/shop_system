<div>
    <form wire:submit.prevent="search()" method="get">
        <div class="input-group">
            <input type="text" class="form-control" wire:model="q" placeholder="{{ __('message.product_search') }}">
            <div class="input-group-append">
                <span class="input-group-text bg-transparent text-primary">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>
    </form>

     {{-- <form action="{{ route('product.index') }}" method="get">
        <div class="input-group">
            <input type="text" class="form-control" value="{{ request('q') }}" name="q">
            <div class="input-group-append">
                <span class="input-group-text bg-transparent text-primary">
                    <i class="fa fa-search"></i>
                </span>
            </div>
        </div>
    </form> --}}

</div>