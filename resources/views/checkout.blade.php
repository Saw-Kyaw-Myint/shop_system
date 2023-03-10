@extends('layout.home_app')

@section('contact')

<div class="checkout-whole">

      <!-- Breadcrumb Start -->
      <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ route("index") }}">{{ __('message.home') }}</a>
                    <a class="breadcrumb-item text-dark" href="{{ route('addcart') }}">{{ __('message.shopping_cart') }}</a>
                    <span class="breadcrumb-item active">{{ __('message.checkout') }}</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Checkout Start -->
    <form action="{{ route('order.store') }}" method="post">
        @csrf
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{ __('message.billing_address') }}</span></h5>
                <div class="bg-light p-30 mb-5">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>{{ __('message.name') }}</label>
                                <input class="form-control" type="text" placeholder="John" value="{{ auth()->user()->name }}" disabled>
                            </div>

                            <div class="col-md-6 form-group">
                                <label>{{ __('message.your_email') }}</label>
                                <input class="form-control" type="text" placeholder="example@email.com" value="{{ auth()->user()->email }}" disabled>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>{{ __('message.mobile') }}</label>
                                <input class="form-control" type="text" name="phone" placeholder="+95 123 456 789" value="{{ old('phone') }}">
                                 @error('phone')
                         <span class="error-message text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                            <div class="col-md-6 form-group">
                                <label>{{ __('message.state') }}</label>
                                <select class="custom-select" name="region">
                                    <option selected>mandalay</option>
                                    <option>yangon</option>
                                    <option>loikaw</option>
                                </select>
                                @error('region')
                           <span class="error-message text-danger">{{ $message }}</span>
                            @enderror
                            </div>



                            <div class="col-md-12 form-group">
                                <label>{{ __('message.you_address') }}</label>
                                <textarea class="form-control" name="address" type="text" placeholder="write address">{{ old('address') }}</textarea>
                                 @error('address')
                            <span class="error-message  text-danger">{{ $message }}</span>
                             @enderror
                             </div>

                            <div class="col-md-12 ">
                                <p class=" text-success mb-0">{{ __('message.thank_fill') }}</p>
                            </div>
                        </div>
                </div>

            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{ __('message.order_total') }}</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom">
                        <h6 class="mb-3">{{ __('message.products') }}</h6>
                        <div class="d-flex justify-content-between">
                            <p>{{ __('message.total_order_product') }}</p>
                            <p class=" badge badge-success d-flex align-items-center rounded-circle">{{ count($totalOrder)  }}</p>
                        </div>
                    </div>
                    <div class="border-bottom pt-3 pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>{{ __("message.subtotal") }}</h6>
                            <h6>{{ $sub_total . __('message.mmk') }}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">{{ __("message.delevery") }}</h6>
                            <h6 class="font-weight-medium">15%</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>{{ __('message.total') }}</h5>
                            <h5>{{ $totalPrice . __('message.mmk') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="mb-5">
                    <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">{{ __('message.payment') }}</span></h5>
                    <div class="bg-light p-30">
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="paypal">
                                <label class="custom-control-label" for="paypal">Paypal</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="directcheck">
                                <label class="custom-control-label" for="directcheck">Direct Check</label>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" name="payment" id="banktransfer">
                                <label class="custom-control-label" for="banktransfer">Bank Transfer</label>
                            </div>
                        </div>
                        <button class="btn btn-block btn-primary font-weight-bold py-3">{{ __('message.place_order') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
    <!-- Checkout End -->

</div>
@endsection




