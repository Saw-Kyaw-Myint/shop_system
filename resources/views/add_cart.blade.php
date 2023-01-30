@extends('layout.home_app')

@section('contact')
<div class="add-cart">
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route('index') }}">{{ __('message.home') }}</a>
                    <span class="breadcrumb-item active">{{ __('message.shopping_cart') }}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->

  <livewire:shoppingcart>
    <!-- Cart End -->
</div>
@endsection



