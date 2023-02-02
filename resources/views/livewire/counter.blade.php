<div>
    <div class="navbar-nav ml-auto py-0">
        {{-- <a href="" class="btn px-0">
            <i class="fas fa-heart text-primary"></i>
            <span class="badge text-secondary border border-secondary rounded-circle"
                style="padding-bottom: 2px;">0</span>
        </a> --}}
        <a href="{{ route('addcart') }}" class="btn px-0 ml-3">
            <i class="fas fa-shopping-cart text-primary"></i>
            <span class="badge text-warning  border border-danger rounded-circle"
                style="padding-bottom: 2px;">{{ $total }}</span>
        </a>
    </div>

</div>
