@if (Auth::check())
<aside class="main-sidebar sidebar-dark-navy elevation-4" style="background-color: #001f3f;">
    <!-- Brand Logo -->
    <a href="{{ route('companies.index') }}" class="brand-link">
        <img src="{{ asset('dist/img/logo-gv.png') }}" alt="Logo Brand" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GV Asia</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/avatar/' . Auth::user()->staff->avatar) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('staffs.show', ['id' => Auth::user()->staff->id]) }}" class="d-block">{{  Auth::user()->name }}</a>
            </div>
        </div>
      <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>
      <!-- Sidebar Menu -->
        <nav class="mt-2 navbar avbar-expand-lg">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Trang thống kê</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('companies.index') }}" class="nav-link active">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Thông tin công ty</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('staffs.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Nhân viên</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('staffs.index') }}" class="nav-link">
                        <i class="fas fa-list"></i>
                        <p> Danh sách<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('positions.index') }}" class="nav-link">
                                <i class="fal fa-crosshairs"></i>
                                <p>Chức danh</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('diplomas.index') }}" class="nav-link">
                                <i class="far fa-file-certificate"></i>
                                <p>Bằng cấp</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('rewards.index') }}" class="nav-link">
                                <i class="fas fa-gifts"></i>
                                <p>Giải thưởng</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('departments.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-house-user"></i>
                                <p>Phòng ban</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('salaries.index') }}" class="nav-link">
                                <i class="fad fa-money-bill-alt"></i>
                                <p>Tiền lương</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('notifications.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Thông báo</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('staffs.show', ['id' => Auth::user()->staff->id]) }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Thông tin cá nhân</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('staffs.index') }}" class="nav-link">
                        <i class="fas fa-file-invoice"></i>
                        <p> Kế toán <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('timesheets.monthSelection') }}" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Bảng tính lương</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Danh sách tài khoản</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('leave.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Thông kê ngày phép</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('staffs.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Nhân sự <i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('organization.show') }}" class="nav-link">
                                <i class="fas fa-sitemap"></i>
                                <p>Tổ chức nhân sự</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-trophy"></i>
                                <p>Khen thưởng</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-trophy"></i>
                                <p>Tuyển dụng</p>
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
@endif