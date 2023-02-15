@extends('layout.home_app')

@section('contact')
    <div class="detail-whole">
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('index') }}">Home</a>
                    <span class="breadcrumb-item active">Shop Detail</span>
                </nav>
            </div>
        </div>
    </div>

    <!-- Breadcrumb End -->
    <livewire:detail :productId="$id">
    </livewire:detail>       
</div>
@endsection
