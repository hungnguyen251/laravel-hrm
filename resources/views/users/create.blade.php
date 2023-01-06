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
                        <h1>Thêm người dùng</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('users.index') }}" type="submit" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title">Thêm người dùng</h3>
                        </div>

                        <form method="post" action="{{ route('users.store') }}">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputCode">Mã nhân viên </label>
                                    <input type="text" class="form-control" value="{{old('staff_id')}}" name="staff_id" placeholder="Nhập vào tên người dùng">
                                    <span><i class="text-warning">Lưu ý tạo nhân viên trước để lấy mã nhân viên *</i></span>
                                    <br>
                                    @if ($errors->has('staff_id'))
                                        <span class="text-danger">{{ $errors->first('staff_id') }}</span>
                                    @endif    
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Tên </label>
                                    <input type="text" class="form-control" value="{{old('name')}}" name="name" placeholder="Nhập vào tên người dùng">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif                                        
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email </label>
                                    <input type="text" class="form-control" value="{{old('email')}}" name="email"  placeholder="Nhập vào email người dùng">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif    
                                </div>

                                <div class="form-group">
                                    <label for="inputPassword">Mật khẩu </label>
                                    <input type="password" class="form-control" value="{{old('password')}}" name="password"  placeholder="Nhập vào mật khẩu">
                                    @if ($errors->has('password'))
                                        <span class="text-danger">{{ $errors->first('password') }}</span>
                                    @endif    
                                </div>

                                <div class="form-group">
                                    <label for="inputPhone">Số điện thoại </label>
                                    <input type="text" class="form-control" value="{{old('phone')}}" name="phone"  placeholder="Nhập vào số điện thoại">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif    
                                </div>

                                <div class="form-group">
                                    <label for="inputDecentralization">Phân quyền </label>
                                    <select class="form-control" name="decentralization">
                                        <option {{ old('decentralization') == 'Nhân viên' ? 'selected' : ''}}>Nhân viên</option>
                                        <option {{ old('decentralization') == 'Kế toán' ? 'selected' : ''}}>Kế toán</option>
                                        <option {{ old('decentralization') == 'Quản trị viên' ? 'selected' : ''}}>Quản trị viên</option>
                                        <option {{ old('decentralization') == 'Trùm' ? 'selected' : ''}}>Trùm</option>
                                    </select>
                                    @if ($errors->has('decentralization'))
                                        <span class="text-danger">{{ $errors->first('decentralization') }}</span>
                                    @endif                                        
                                </div>

                                <div class="form-group d-flex flex-column">
                                    <label>Trạng thái</label>
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;">
                                        <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                                            <input type="checkbox" name="status" checked data-bootstrap-switch="">
                                        </div>
                                    </div>
                                </div>

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