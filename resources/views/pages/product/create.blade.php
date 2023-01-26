<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | General Form Elements</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layout.app')

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
                                <li class="breadcrumb-item active">General Form</li>
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
                                    <h3 class="card-title">Product Create</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="{{ route('product.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter Title" name="title" value="{{ old('title') }}">
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
                                        <img id="output" src="" class=" mb-2" alt="preview" width="150px"
                                            height="150px"
                                            onerror="this.onerror=null;this.src='{{ asset('img/offer-2.jpg') }}';">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Category</label>

                                            <select name="category" id="" class=" custom-select">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == old('category') ? 'selected' : '' }}>
                                                        {{ $category->ctitle }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                        @error('category')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Description</label>
                                            <textarea class="form-control" id="exampleInputPassword1" name="description" placeholder="Enter Description"
                                                rows="5">{{ old('description') }}</textarea>
                                        </div>
                                        @error('description')
                                            <span class="error-message">{{ $message }}</span>
                                        @enderror

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">price</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                placeholder="Enter price" name="price" value="{{ old('price') }}">
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
                        <!-- ./wrapper -->

                        <!-- jQuery -->
                        <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
                        <!-- Bootstrap 4 -->
                        <script src=" {{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                        <!-- bs-custom-file-input -->
                        <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
                        <!-- AdminLTE App -->
                        <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
                        <!-- AdminLTE for demo purposes -->
                        <script src="{{ asset('admin/dist/js/demo.js') }}"></script>
                        <script type="text/javascript">
                            var loadFile = function(event) {
                                var reader = new FileReader();
                                reader.onload = function() {
                                    var output = document.getElementById('output');
                                    output.src = reader.result;
                                };
                                reader.readAsDataURL(event.target.files[0]);
                            };
                            $(document).ready(function() {
                                bsCustomFileInput.init();
                            });
                        </script>
</body>

</html>
