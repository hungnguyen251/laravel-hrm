@extends('client_layout')
@section('title', 'Tài khoản')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin tài khoản</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('users.index') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin tài khoản</h3>
                        </div>

                        <form method="post" action="{{ route('users.update', [$user->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên </label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Nhập vào tên nhân viên">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email </label>
                                    <input type="text" class="form-control" value="{{ $user->email }}" name="email"  placeholder="Nhập vào email">
                                </div>

                                <div class="form-group">
                                    <label for="inputPass">Mật khẩu </label>
                                    <input type="password" class="form-control" value="{{ $user->password }}" name="password"  placeholder="Nhập vào email">
                                </div>

                                <div class="form-group">
                                    <label for="inputPhone">Số điện thoại </label>
                                    <input type="text" class="form-control" value="{{ $user->phone }}" name="phone"  placeholder="Nhập vào số điện thoại">
                                </div>

                                <div class="form-group">
                                    <label for="inputDecentralization">Phân quyền </label>
                                    <select class="form-control" name="decentralization">
                                        <option {{ $user->decentralization == 'staff' ? 'selected' : ''}} value="staff">Nhân viên</option>
                                        <option {{ $user->decentralization == 'accountant' ? 'selected' : ''}} value="accountant">Kế toán</option>
                                        <option {{ $user->decentralization == 'admin' ? 'selected' : ''}} value="admin">Quản trị viên</option>
                                        <option {{ $user->decentralization == 'super_admin' ? 'selected' : ''}} value="super_admin">Trùm</option>
                                    </select>
                                </div>

                                <div class="form-group d-flex flex-column">
                                    <label>Trạng thái</label>
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;">
                                        <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                                            <input type="checkbox" name="status" {{ $user->status == "inactive" ? "" : "checked" }} data-bootstrap-switch="">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" value="{{ date('Y-m-d H:i:s') }}" name="updated_at"  placeholder="">
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection