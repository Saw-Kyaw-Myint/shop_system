<div>
    <!-- Shop Detail Start -->
    <div class="container-fluid pb-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 mb-30">
                <div id="product-carousel" class="" data-ride="carousel">
                    <div class=" bg-light">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="{{ asset('storage/'. $product->image) }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 h-auto mb-30">
                <div class="h-100 bg-light p-30">
                    <h3>{{ $product->title }}</h3>
                    <h3 class="font-weight-semi-bold mb-4">{{ $product->price . __('message.mmk') }}</h3>
                    <p class="mb-4">{{ Str::words($product->description,18,'...') }}</p>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <button class="btn btn-primary px-3" wire:click="addCart({{ $product->id }})"><i
                                class="fa fa-shopping-cart mr-1"></i> Add To
                            Cart</button>
                    </div>
                    <div class="d-flex pt-2">
                        <strong class="text-dark mr-2">Share on:</strong>
                        <div class="d-inline-flex">
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a class="text-dark px-2" href="">
                                <i class="fab fa-pinterest"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="bg-light p-30">
                    <div class="nav nav-tabs mb-4">
                        <a class="nav-item nav-link text-dark active " data-toggle="tab"
                            href="#tab-pane-1">Description</a>
                        {{-- <a class="nav-item nav-link text-dark" data-toggle="tab" href="#tab-pane-2">Information</a>
                        --}}
                        <a class="nav-item nav-link text-dark " data-toggle="tab" href="#tab-pane-3">Reviews</a>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active " id="tab-pane-1">
                            <h4 class="mb-3">Product Description</h4>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane fade " id="tab-pane-3">
                             <livewire:comment :Product="$product->id"></livewire:comment>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">You May
                Also Like</span></h2>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    @foreach ($relatedProduct as $related)

                    <div class="product-item bg-light position-relative">
                        <a href="{{ route('product.detail',$related->id) }}">
                            <div class="product-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset('storage/'. $related->image) }}" alt="">
                                <div class="product-action">
                                </div>
                            </div>
                            <div class="text-center py-4">
                                <a class="h6 text-decoration-none text-truncate" href="#">{{ $related->title }}</a>
                                <div class="d-flex align-items-center justify-content-center mt-2">
                                    <h5>{{ $related->price . __('message.mmk') }}</h5>
                                    <h6 class="text-muted ml-2"><del>{{ $related->price . __('message.mmk')}}</del></h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-center mb-1">
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small class="fa fa-star text-primary mr-1"></small>
                                    <small>(99)</small>
                                </div>
                            </div>
                        </a>
                        <button class="btn btn-outline-dark btn-square cart-button "
                            wire:click="addCart({{ $related->id }})"><i class="fa fa-shopping-cart"></i></button>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->
</div>