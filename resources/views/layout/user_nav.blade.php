<div class="whole-header">
    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row bg-secondary py-1 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center h-100">
                    <a class="text-body mr-3" href="">{{ __('message.about') }}</a>
                    <a class="text-body mr-3" href="">{{ __('message.contact') }}</a>
                    <a class="text-body mr-3" href="">{{ __('message.help') }}</a>
                    <a class="text-body mr-3" href="">FAQs</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown">{{
                            __('message.account') }}</button>
                        <div class="dropdown-menu dropdown-menu-right">

                       @if (auth()->user())
                       @if (auth()->user()->role==0)
                       <div class=" dropdown-item pl-2">
                           <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Stories">
                               <path d="M4.75 21.5h14.5c.14 0 .25-.11.25-.25V2.75a.25.25 0 0 0-.25-.25H4.75a.25.25 0 0 0-.25.25v18.5c0 .14.11.25.25.25z" stroke="currentColor"></path>
                               <path d="M8 8.5h8M8 15.5h5M8 12h8" stroke="currentColor" stroke-linecap="round"></path>
                           </svg>
                           <a href="{{ route('home.index') }}">{{ __('message.dashboard') }}</a>
                       </div>
                       @else
                       <a href="{{ route('logout') }}" class=" dropdown-item">{{ __('message.logout') }}</a>
                       @endif 
                       @else
                       <button class="dropdown-item" type="button"><a href="{{ route('login.create') }}">{{
                        __('message.sign_in') }}</a>
                    </button>
                    <button class="dropdown-item" type="button"><a href="{{ route('register.create') }}">{{
                        __('message.sign_up') }}</a>
                    </button> 
                       @endif
                        
                        </div>
                    </div>
                    <div class="mx-2">
                        <select class="custom-select custom-select-sm  changeLang" id="inputGroupSelect01">
                            <option class="dropdown-item" value="en" {{ session()->get('locale') == 'en' ? 'selected' :
                                '' }}>
                                {{ __('message.English') }}
                            </option>
                            <option class="dropdown-item" value="myanmar" {{ session()->get('locale') == 'myanmar' ?
                                'selected' : '' }}>
                                {{ __('message.myanmar') }}</option>
                        </select>
                    </div>
                </div>
                
                <div class="d-block d-lg-none">
                   <livewire:counter/>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-light py-3 px-xl-5 d-none d-lg-flex">
            <div class="col-lg-4">
                <a href="#product" class="text-decoration-none">
                    <span class="h1 text-uppercase text-primary bg-dark px-2">Multi</span>
                    <span class="h1 text-uppercase text-dark bg-primary px-2 ml-n1">Shop</span>
                </a>
            </div>
            <div class="col-lg-4 col-6 text-left">
                <form action="{{ route('index') }}" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ request('q') }}" name="q" placeholder="{{ __('message.product_search') }}">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-6 text-right">
                <p class="m-0">{{ __('message.customer_service') }}</p>
                <h5 class="m-0">{{ __('message.phone_number') }}</h5>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <a href="#product">
        <div class="container-fluid bg-dark mb-30">
            <div class="row px-xl-5">
                <div class="col-lg-3 d-none d-lg-block">
                    <a class="btn d-flex align-items-center justify-content-between bg-primary w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; padding: 0 30px;">
                        <h6 class="text-dark m-0"><i class="fa fa-bars mr-2"></i>{{ __('message.pages') }}
                        </h6>
                        <i class="fa fa-angle-right text-dark"></i>
                    </a>
                    <nav class="collapse position-absolute navbar navbar-vertical navbar-light align-items-start p-0 bg-light" id="navbar-vertical" style="width: calc(100% - 30px); z-index: 999;">
                        {{-- <div class="navbar-nav w-100">
                            <div class="nav-item dropdown dropright">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Dresses
                                    <i class="fa fa-angle-right float-right mt-1"></i></a>
                                <div class="dropdown-menu position-absolute rounded-0 border-0 m-0">
                                    <a href="" class="dropdown-item">Men's Dresses</a>
                                    <a href="" class="dropdown-item">Women's Dresses</a>
                                    <a href="" class="dropdown-item">Baby's Dresses</a>
                                </div>
                            </div>
                            @foreach ($categories as $category)
                            <a href="{{ route('category.search', $category->ctitle) }}" class="nav-item nav-link">{{
                                $category->ctitle }}
    </a>
    @endforeach
</div> --}}
</nav>
</div>
<div class="col-lg-9">
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 py-lg-0 px-0">
        <a href="" class="text-decoration-none d-block d-lg-none">
            <span class="h1 text-uppercase text-dark bg-light px-2">Multi</span>
            <span class="h1 text-uppercase text-light bg-primary px-2 ml-n1">Shop</span>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="{{ route('index') }}" class="nav-item nav-link active">{{ __('message.home')
                                    }}</a>
                <a href="#product" class="nav-item nav-link">{{ __('message.products') }}</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">{{
                                        __('message.pages') }}
                        <i class="fa fa-angle-down mt-1"></i></a>
                    <div class="dropdown-menu bg-primary rounded-0 border-0 m-0">
                        <a href="{{ route("addcart") }}" class="dropdown-item">Shopping Cart</a>
                        <a href="checkout.html" class="dropdown-item">Checkout</a>
                    </div>
                </div>
                <a href="#" class="nav-item nav-link">{{ __('message.contact') }}</a>
            </div>
            @auth
            <div  class="d-none d-lg-block">
            <livewire:counter />
            </div>
            @endauth

        </div>
    </nav>
</div>
</div>
</div>
</a>
<!-- Navbar End -->
</div>
