<div>

    @if (session()->has('success'))
        <p class="p-4 bg-success text-white">{{ session('success') }}</p>
    @endif

    <div class="container-fluid pt-5 pb-3" id="product">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span
                class="bg-secondary pr-3">{{ __('message.feature_product') }}</span></h2>
        <div class="row px-xl-5">

            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
                            <img class="img-fluid w-100" src="{{ asset('storage/' . $product->image) }}" alt="">
                            <div class="product-action">
                                <button class="btn btn-outline-dark btn-square cart-item"
                                    wire:click="addToCart({{ $product->id }})"><i
                                        class="fa fa-shopping-cart"></i></button>


                                <button class="btn btn-outline-dark btn-square cart-item"><i
                                        class="far fa-heart"></i></button>
                                <button class="btn btn-outline-dark btn-square cart-item"><i
                                        class="fa fa-sync-alt"></i></button>
                                <button class="btn btn-outline-dark btn-square cart-item"><i
                                        class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate"
                                href="">{{ Str::words($product->title, '3', '...') }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ $product->price . __('message.mmk') }} </h5>
                                <h6 class="text-muted ml-2"><del>{{ $product->price . __('message.mmk') }} </del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star-half-alt text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
