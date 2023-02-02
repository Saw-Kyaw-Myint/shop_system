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

            <!-- Main content -->
            <section class="content">
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
                                                placeholder="Enter Title" name="cimage" value="{{ old('cimage') }}" onchange="loadFile(event)">
                                        </div>

                                        <img id="output" src="" class=" mb-2" alt="preview" width="150px"
                                        height="150px"
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
