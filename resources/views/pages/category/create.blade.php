@extends('layout.admin_layout')

@section('content-body')
<!-- Main content -->
<section class="content-wrapper">
    <div class="container-fluid">
        <div class="row  justify-content-center">
            <!-- left column -->
            <div class="col-md-6 mt-5">
                <!-- general form elements -->
                <div class="card card-primary ">
                    <div class="card-header text-center">
                        <h3 class="h5 ">Category Create</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ route('category.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body  pb-0">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter Title" name="ctitle" value="{{ old('ctitle') }}">
                            </div>

                            @error('ctitle')
                            <span class="error-message">{{ $message }}</span>
                            @enderror

                            <div class="form-group">
                                <label for="exampleInputEmail1">Category Image</label>
                                <input type="file" class="form-control p-1" id="exampleInputEmail1"
                                    placeholder="Enter Title" name="cimage" value="{{ old('cimage') }}"
                                    onchange="loadFile(event)">
                            </div>
                            @error('cimage')
                            <span class="error-message">{{ $message }}</span><br>
                            @enderror
                            <img id="output" src="" class=" mb-2" alt="preview" width="150px" height="150px"
                                onerror="this.onerror=null;this.src='{{ asset('img/offer-2.jpg') }}';">



                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">create</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
                <!-- /.control-sidebar -->
            </div>
        </div>
    </div>
</section>
<!-- ./wrapper -->
@endsection