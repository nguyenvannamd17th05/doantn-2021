<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.index')}}" class="nav-link">Trang tổng quan</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
                <a href="{{route('admin.logout')}}" class="nav-link">Đăng xuất</a>
        </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        @if(session()->has('success'))
            <div class="alert alert-default-primary" style="margin-top: 20px">
                <strong>Thành công! </strong>{{ session()->get('success') }}
            </div>
        @endif
        @if(session()->has('danger'))
                <div class="alert alert-danger" style="margin-top: 20px">
                    <strong>Thất bại! </strong>{{ session()->get('danger') }}
                </div>
            @endif
    </ul>
</nav>
<!-- /.navbar -->
