<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('product.index') }}" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3" action="{{ route('product.index') }}" method="get">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" value="{{ request('q') }}" type="search" name="q"
                placeholder="Search Products" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
              <!-- Messages Dropdown Menu -->
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-sort-down"></i>
                    <span class="badge badge-danger navbar-badge">2</span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="{{ route('adminLogout') }}" class="dropdown-item d-flex align-items-center"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Profile"><circle cx="12" cy="7" r="4.5" stroke="currentColor"></circle><path d="M3.5 21.5v-4.34C3.5 15.4 7.3 14 12 14s8.5 1.41 8.5 3.16v4.34" stroke="currentColor" stroke-linecap="round"></path></svg> <span class="mt-2">Logout</span></a>
                    <a href="{{ route('orderProduct.index') }}" class="dropdown-item"> <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-label="Stories"><path fill-rule="evenodd" clip-rule="evenodd" d="M4 2.75c0-.41.34-.75.75-.75h14.5c.41 0 .75.34.75.75v18.5c0 .41-.34.75-.75.75H4.75a.75.75 0 0 1-.75-.75V2.75zM7 8.5c0-.28.22-.5.5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0 7c0-.28.22-.5.5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zM7 12c0-.28.22-.5.5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 7 12z" fill="currentColor"></path></svg><span class=" mt-2">order</span> </a>
                </div>
            </li>
            <!-- Notifications Dropdown Menu -->
        <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                <i class="fas fa-th-large"></i>
            </a>
        </li>
    </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->guard('admin')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ route('home.index') }}" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/dashboard" ? 'active' : ' ' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('home.index') }}" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/dashboard" ? 'active' : ' ' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/product/create" ||
                        url()->current()
                        == "http://127.0.0.1:8000/category/create"? 'active' : ' '}}" >
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Forms
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="{{ route('product.create') }}" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/product/create" ? 'active' : ' ' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Product Create</p>
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a href="{{ route('category.create') }}" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/category/create" ? 'active' : ' ' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Category Create</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ url()->current() == " http://127.0.0.1:8000/product" ||
                        url()->current() == "http://127.0.0.1:8000/category" 
                          || url()->current() =="http://127.0.0.1:8000/product" 
                          || url()->current() =="http://127.0.0.1:8000/user" 
                          || url()->current() =="http://127.0.0.1:8000/order"
                          || url()->current() =="http://127.0.0.1:8000/user/banList"
                         ? 'active' : ' '}}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Tables
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('product.index') }}" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/product" ? 'active' : ' ' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>product List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('category.index') }}" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/category" ? 'active' : ' ' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categories List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.list') }}" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/user" ? 'active' : ' ' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('orderProduct.index') }}" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/order" ? 'active' : ' ' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>order List</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('user.banList') }}" class="nav-link {{ url()->current() == "http://127.0.0.1:8000/user/banList" ? 'active' : ' ' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ban List</p>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>