@extends('layout.admin_layout')

@section('content-body')
     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Product Edit</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post" action="{{ route('product.update', $product->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Title" name="title"
                                            value="{{ old('title', $product->title) }}">
                                    </div>

                                    @error('title')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror


                                    <div class="form-group">
                                        <label for="exampleInputFile">Product Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    id="exampleInputFile" value="{{ old('image') }}"
                                                    onchange="loadFile(event)">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                    @error('image')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror
                                    <img id="output" src="{{ asset('storage/' . $product->image) }}" class=" mb-2"
                                        alt="preview" width="150px" height="150px"
                                        onerror="this.onerror=null;this.src='{{ asset('img/offer-2.jpg') }}';">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>

                                        <select name="category" id="" class=" custom-select">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ $category->id == old('category',
                                                $category->id) ? 'selected' : '' }}>
                                                {{ $category->ctitle }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    @error('category')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea class="form-control" id="exampleInputPassword1" name="description"
                                            placeholder="Enter Description"
                                            rows="5">{{ old('description', $product->description) }}</textarea>
                                    </div>
                                    @error('description')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">price</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter price" name="price"
                                            value="{{ old('price', $product->price) }}">
                                    </div>
                                    @error('price')
                                    <span class="error-message">{{ $message }}</span>
                                    @enderror

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->

                        <!-- Control Sidebar -->
                        <aside class="control-sidebar control-sidebar-dark">
                            <!-- Control sidebar content goes here -->
                        </aside>
                        <!-- /.control-sidebar -->
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
       
        <!-- ./wrapper -->

        