@extends('layout.admin_layout')

@section('content-body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="">order List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Order List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header w-100%  d-flex  align-items-center  justify-content-between">
                            <p class="m-0 text-primary h4">Today Order Price :: <span
                                    class=" text-black-50 bold ">{{ $todayOrderPrice . __('message.mmk') }}</span>
                            </p>
                            <div class="">
                                @if (request('page')!=null)
                                <a href="{{ route('order.export',request('page')) }}" class="btn btn-primary btn-sm">export</a>
                                @else
                                <a href="{{ route('order.export',1) }}" class="btn btn-primary btn-sm">export</a>
                                @endif

                                     <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning btn-sm ml-2" data-toggle="modal"
                            data-target="#exampleModal">
                            upload
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('order.import') }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" id="" name="file" class=" form-control p-1">

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>title</th>
                                        <th>origin_price</th>
                                        <th>quantity</th>
                                        <th>Order_price</th>
                                        <th>created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderProducts as $order)
                                    <tr>
                                        <td>{{ $order->user->name }}
                                        </td>
                                        <td>{{ $order->product->title }}</td>
                                        <td>{{ $order->product->price . __('message.mmk') }}</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->quantity * $order->product->price . __('message.mmk') }}</td>
                                        <td>{{ $order->created_at->format('d-M-Y') }}</td>
                                        <td class=" d-flex align-items-center">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Delete
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                Delete
                                                                box</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class=" text-danger h4">Are you sure to dlelete?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <form action="{{ route('order.destroy', $order->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')
                                                                <button
                                                                    class="btn btn-sm btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center  float-right">
                                {!! $orderProducts->links() !!}
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    <livewire:summery-month></livewire:summery-month>
    
    </div>
    <!-- ./wrapper -->   
@endsection
     
