@extends('client_layout')
@section('title', 'Bảng lương')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('salaries.index') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title">Thêm tiền lương nhân viên</h3>
                        </div>

                        <form method="post" action="{{ route('salaries.store') }}">
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
                                    <label for="inputContent">Số tiền </label>
                                    <input type="text" class="form-control" value="{{ old('amount') }}" name="amount"  placeholder="Nhập vào số tiền">
                                    @if ($errors->has('amount'))
                                        <span class="text-danger">{{ $errors->first('amount') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputContent">Số tiền </label>
                                    <input type="text" class="form-control" value="{{ old('note') }}" name="note"  placeholder="Ghi chú nếu có quyết định tăng lương ngày/tháng/năm">                                  
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