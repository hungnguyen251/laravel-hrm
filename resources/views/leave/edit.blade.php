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
                        <h1>Sửa thông tin ngày phép</h1>
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
                            <h3 class="card-title">Sửa thông tin</h3>
                        </div>

                        <form method="post" action="{{ route('leave.update', [$leave->id]) }}" >
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Số ngày phép </label>
                                    <input type="text" class="form-control" value="{{ $leave->number }}" name="number" placeholder="Nhập vào số ngày phép">
                                </div>

                                <div class="form-group">
                                    <label for="inputTime">Số ngày làm việc </label>
                                    <input type="text" class="form-control" value="{{ $leave->working_time }}" name="working_time" placeholder="Nhập vào số ngày làm việc">
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