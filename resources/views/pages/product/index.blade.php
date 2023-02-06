@extends('layout.admin_layout')

@section('content-body')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="">Product List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Product List</li>
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
                        <div class="card-header">
                            <h3 class="card-title"><a href="{{ route('product.create') }}" class="btn btn-primary">create</a></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>category</th>
                                        <th>Price</th>
                                        <th>created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->title }}
                                            </td>
                                            <td> <img src="{{ asset('storage/' . $product->image) }}" alt=""
                                                    width="50px" height="50px"
                                                    onerror="this.onerror=null;this.src='{{ asset('img/cat-2.jpg') }}';">
                                            </td>
                                            <td>{{ Str::words($product->description, '10', '....') }}</td>
                                            <td>{{ $product->category->ctitle }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->created_at->format('d-M-Y') }}</td>
                                            <td class=" d-flex align-items-center">
                                                <a href="{{ route('product.edit',$product->id) }}" class="btn btn-sm btn-success mr-2">Edit</a>

                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-danger"
                                                    data-toggle="modal" data-target="#exampleModal">
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
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class=" text-danger h4">Are you sure to dlelete?
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <form
                                                                    action="{{ route('product.destroy', $product->id) }}"
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
    </div>
@endsection
  