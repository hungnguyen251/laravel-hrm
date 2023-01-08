@if (Auth::check())
<aside class="main-sidebar sidebar-dark-navy elevation-4" style="background-color: #001f3f;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Trang thống kê</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{ route('companies.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i>
                        <p>Thông tin công ty</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{ route('staffs.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Nhân viên<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('staffs.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Toàn thời gian</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bán thời gian</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thực tập sinh</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{ route('notifications.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>Thông báo</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{ route('staffs.show', ['id' => Auth::user()->staff->id]) }}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Thông tin cá nhân</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{ route('departments.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>Danh sách phòng ban</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{ route('positions.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>Danh sách chức danh</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{ route('diplomas.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>Danh sách bằng cấp</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="{{ route('rewards.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Danh sách giải thưởng</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href={{ route('users.index') }} class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Danh sách tài khoản</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Bảng chấm công</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-trophy"></i>
                        <p>Khen thưởng</p>
                    </a>
                </li>

                <li class="nav-item menu-open">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>Tài chính</p>
                    </a>
                </li>
                
                <li class="nav-item menu-open">
                    <a href="{{ route('organization.show') }}" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>Tổ chức nhân sự</p>
                    </a>
                </li>
            </ul>
        </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@endif