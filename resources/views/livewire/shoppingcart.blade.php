<div>
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>{{ __('message.products') }}</th>
                            <th>{{ __('message.price') }}</th>
                            <th>{{ __('message.quantity') }}</th>
                            <th>{{ __('message.total') }}</th>
                            <th>{{ __('message.action') }}</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">

                        @foreach ($cartItems as $id => $details)
                            <tr>
                                <td class="align-middle"><img src="{{ asset('storage/' . $details['image'] ) }}"
                                        alt="" style="width: 50px;">
                                    {{ Str::words($details['title'], 1, '...') }}</td>
                                <td class="align-middle">{{ $details['price'] }}</td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto" style="width: 100px;">
                                  
                                        <div class="input-group-btn">    
                                            <button class="btn btn-sm btn-primary btn-minus"
                                                wire:click="decrement({{ $id }})">
                                                <i class="fa fa-minus"></i>
                                            </button>
                                        </div>
                                        <input type="text"
                                            class="form-control form-control-sm bg-secondary border-0 text-center"
                                            min="2" value="{{ $details['quantity'] }}">
                                        <div class="input-group-btn">
                                            <button class="btn btn-sm btn-primary btn-plus"
                                                wire:click="increment({{ $id }})">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle">{{ $details['price']* $details['quantity'] }}</td>
                                <td class="align-middle"><button class="btn btn-sm btn-danger"
                                        wire:click="removeCart({{ $id}})"><i
                                            class="fa fa-times"></i></button></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <h5 class="section-title position-relative text-uppercase mb-3"><span
                        class="bg-secondary pr-3">{{ __('message.cart_summery') }}</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>{{ __('message.subtotal') }}</h6>
                            <h6>{{ $sub_total . __('message.mmk') }} </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">{{ __('message.delevery') }}</h6>
                            <h6 class="font-weight-medium">15%</h6>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>{{ __('message.total') }}</h5>
                            <h5>{{ $total . __('message.mmk') }}</h5>
                        </div>
                        <a href="{{ route('order.create') }}"
                            class="btn btn-block btn-primary font-weight-bold my-3 py-3">{{ __('message.checkout') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
