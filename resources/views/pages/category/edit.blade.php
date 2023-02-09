@extends('layout.admin_layout')

@section('content-body')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <!-- left column -->
                    <div class="col-md-6 mt-5">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Category Edit</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" method="post"
                                action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-body  pb-0">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Title</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Title" name="ctitle"
                                            value="{{ old('ctitle', $category->ctitle) }}">
                                    </div>

                                    @error('ctitle')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Category Image</label>
                                        <input type="file" class="form-control p-1" id="exampleInputEmail1"
                                            placeholder="Enter Title" name="cimage"
                                            value="{{ old('ctitle', $category->cimage) }}"
                                            onchange="loadFile(event)">
                                    </div>

                                    <img id="output" src="{{ asset('storage/' . $category->cimage) }}"
                                        class=" mb-2" alt="preview" width="150px" height="150px"
                                        onerror="this.onerror=null;this.src='{{ asset('img/offer-2.jpg') }}';">

                                    @error('cimage')
                                        <span class="error-message">{{ $message }}</span>
                                    @enderror

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.card -->
    </div>
    <!-- ./wrapper --> 
@endsection


     