<div>

    <div class="row">
        <div class="col-lg-8 mx-auto">

            <!-- List group-->
            <ul class="list-group ">

                @foreach ($orders as $order)

                <!-- list group item-->
                <li class="list-group-item my-2 shadow-lg {{ $order->confirm==1? " confirm " :' '  }}">
                    <!-- Custom content-->
                    <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                        @if ($order->confirm==1)
                        <p class=" position-absolute  " style="right: 18px;
                        top: 0;
                        font-size: 44px;
                        color: #1ac326;"> <i class="fas fa-check"></i></p>
                        @endif

                        <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2">{{ $order->product->title }}</h5>
                            <p class="font-italic text-muted mb-0 small">{{
                                Str::words($order->product->description,15,'...') }}</p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <div class="">
                                    <div class=" d-flex  align-items-center">
                                        <h6 class="font-weight-bold mr-3 ">{{ $order->product->price .
                                            __('message.mmk')}}</h6>
                                        <p class=" badge badge-success mr-4 mt-1 badge-pill rounded">{{ $order->quantity
                                            }}</p>
                                        <p class="mt-1 ml-4">Total price : <span>{{ $order->product->price *
                                                $order->quantity . __('message.mmk')}}</span></p>

                                    </div>

                                </div>

                                <div class="">
                                    <span>{{ $order->created_at->format(' d - F -Y') }}</span>
                                </div>
                             @if ($order->confirm !=1)
                             <ul class="list-inline small">
                                @if ($order->cancel==0)
                                <button class="btn btn-sm  btn-info rounded"
                                    wire:click="cancel({{ $order->id }})">cancel</button>
                                @else
                                <button class="btn btn-sm  btn-warning  rounded"
                                    wire:click="unCancel({{ $order->id }})">unCancel</button>
                                @endif

                            </ul>
                             @endif
                               
                            </div>
                        </div><img src="{{ asset('storage/'.$order->product->image) }}" alt="Generic placeholder image"
                            width="200" class="ml-lg-5 order-1 order-lg-2">
                    </div>
                    <!-- End -->
                </li>
                <!-- End -->
                @endforeach


            </ul>
            <!-- End -->
        </div>
    </div>
</div>