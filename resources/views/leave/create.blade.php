@extends('client_layout')
@section('title', 'Thống kê ngày phép')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tạo thống kê ngày phép</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('leave.index') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title"></h3>
                        </div>

                        <form method="post" action="{{ route('leave.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputContent">Mã nhân viên </label>
                                    <input type="text" class="form-control" value="{{ old('staff_id') }}" name="staff_id"  placeholder="Nhập vào mã nhân viên">
                                    @if ($errors->has('staff_id'))
                                        <span class="text-danger">{{ $errors->first('staff_id') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputContent">Ngày bắt đầu chính thức </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="working_time"  value="{{ old('working_time') }}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
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
    <!-- /.content-wrapper -->
</div>
@endsection