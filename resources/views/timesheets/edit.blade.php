@extends('client_layout')
@section('title', 'Bảng tính lương')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('timesheets.index') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
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

                        <form method="post" action="{{ route('timesheets.update', [$timesheets->id]) }}" >
                            @csrf
                            @method('PUT')
                            <div class="card-body">

                                {{-- <input type="hidden" class="form-control" value="{{ $timesheets->staff->id }}" name="staff_id">
                                <input type="hidden" class="form-control" value="{{ $timesheets->salary->id }}" name="salary_id"> --}}

                                <div class="form-group">
                                    <label for="inputAllowance">Phụ cấp </label>
                                    <input type="text" class="form-control" value="{{ $timesheets->allowance }}" name="allowance" placeholder="Nhập vào số tiền phụ cấp">
                                </div>

                                <div class="form-group">
                                    <label for="inputWorkDay">Ngày chấm công </label>
                                    <input type="text" class="form-control" value="{{ $timesheets->work_day }}" name="work_day" placeholder="Nhập vào số ngày công">
                                </div>

                                <div class="form-group">
                                    <label for="inputAdvance">Ứng trước </label>
                                    <input type="text" class="form-control" value="{{ $timesheets->advance }}" name="advance" placeholder="Nhập vào số tiền ứng trước">
                                </div>

                                <div class="form-group">
                                    <label for="inputReceived">Thực nhận </label>
                                    <input type="text" class="form-control" value="{{ $timesheets->received }}" name="received" placeholder="Nhập vào lương thực nhận">
                                </div>

                                <div class="form-group">
                                    <label for="inputMonth">Lương tháng tính </label>
                                    <input type="text" class="form-control" value="{{ $timesheets->month }}" name="month" placeholder="Nhập vào tháng tính lương">
                                </div>

                                <div class="form-group">
                                    <label for="inputMonthLeave">Số ngày nghỉ </label>
                                    <input type="text" class="form-control" value="{{ $timesheets->month_leave }}" name="month_leave" placeholder="Nhập vào số ngày nghỉ trong tháng">
                                </div>

                                <div class="form-group">
                                    <label for="inputRemainingLeave">Số ngày phép còn </label>
                                    <input type="text" class="form-control" value="{{ $timesheets->remaining_leave }}" name="remaining_leave" placeholder="Nhập vào số ngày phép còn lại">
                                </div>

                                <div class="form-group">
                                    <label for="inputNote">Ghi chú </label>
                                    <input type="text" class="form-control" value="{{ $timesheets->note }}" name="note" placeholder="Nhập vào ghi chú">
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