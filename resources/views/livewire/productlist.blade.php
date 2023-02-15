<div>
    <div class="container-fluid pt-5">
        <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{
                __('message.categories') }}</span></h2>
        <div class="row px-xl-5 pb-3">
            @foreach ($categories as $category)
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="">
                    <button wire:click='search({{ $category->id }})'
                        class="cat-item btn btn-outline-info shadow border-0  rounded d-flex align-items-center mb-4">
                        <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="{{ asset('storage/' . $category->cimage) }}" alt="">
                        </div>
                        <div class="flex-fill pl-3">
                            <h6>{{ $category->ctitle }}</h6>
                            <small class="text-body">100 {{ __('message.products') }}</small>
                        </div>
                    </button>
                </div>
            </div>
            @endforeach
            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <div class="">
                    <button wire:click='search(null)'
                        class="cat-item btn btn-outline-info shadow border-0  rounded d-flex align-items-center mb-4">
                        {{-- <div class="overflow-hidden" style="width: 100px; height: 100px;">
                            <img class="img-fluid" src="{{ asset('img/carousel-3.jpg') }}" alt="">
                        </div> --}}
                        <div class="flex-fill">
                            <p style="width: 190px; height: 90px;"
                                class=" d-flex align-items-center justify-content-center h4">All Category</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    @if (session()->has('warning'))
    <div class="alert alert-warning text-danger alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif


    <div class="container-fluid pt-5 pb-3" id="product">
        <div class="d-flex justify-content-between align-content-center">
            <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">{{
                    __('message.feature_product') }}</span></h2>

            <div class="mr-5">
                <p class="h4  bold" style="color: rgb(77, 77, 252)">{{ $searchValue }}</p>
            </div>

            {{-- <div class=" mr-5 round">
                <a class="btn d-flex align-items-center justify-content-between  bg-secondary  border w-100"
                    data-toggle="collapse" href="#navbar-vertical" style="height: 30px; padding: 0 20px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Lists">
                        <path
                            d="M7.5 5.75a2 2 0 0 0-2 2v14a.5.5 0 0 0 .8.4l5.7-4.4 5.7 4.4a.5.5 0 0 0 .8-.4v-14a2 2 0 0 0-2-2h-9z"
                            fill="currentColor"></path>
                        <path d="M12.5 2.75h-8a2 2 0 0 0-2 2v11.5" stroke="currentColor" stroke-linecap="round"></path>
                    </svg>
                    <h6 class="text-dark m-0 mr-2">{{ __('message.categories') }}
                    </h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light"
                    id="navbar-vertical" style="width: 165px; z-index: 999;">
                    <div class="navbar-nav w-100">
                        @foreach ($categories as $category)
                        <button wire:click='search({{ $category->id }})' class=" border-0 nav-item nav-link ">{{
                            $category->ctitle
                            }}</button>
                        @endforeach
                    </div>
                </nav>
            </div> --}}
        </div>

        <div class="row px-xl-5">

            @foreach ($products as $product)

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1 position-relative product-card">

                <div class="product-item bg-light mb-4 shadow">
                    <div class="product-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="{{ asset('storage/' . $product->image) }}" alt="">
                        <a href="{{ route('product.detail',$product->id) }}">
                            <div class="product-action">

                            </div>
                    </div>

                    <div class="text-center py-4">
                        <a class="h6 text-decoration-none text-truncate" href="">{{ Str::words($product->title, '3',
                            '...') }}</a>
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
                    </a>
                </div>
                <button class="btn btn-outline-dark btn-square cart-item "
                    wire:click="addToCart({{ $product->id }})"><i class="fa fa-shopping-cart"></i></button>
            </div>

            @endforeach

        </div>
    </div>
</div>