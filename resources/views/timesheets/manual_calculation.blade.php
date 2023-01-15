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
                        <h1>Phiếu lương nhân viên {{ $staff->last_name . ' ' . $staff->first_name }} tháng {{ date('m/Y', strtotime('last month')) }}</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('timesheets.monthSelection') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title">Tạo phiếu lương</h3>
                        </div>

                        <form method="post" action="{{ route('timesheets.manualSalaryCalculation') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputCode">Mã nhân viên </label>
                                    <input type="text" class="form-control" value="{{ $staff->code }}" id="staff-code" placeholder="Nhập vào mã nhân viên">                                   
                                </div>

                                <div class="form-group">
                                    <label for="inputAllowance">Phụ cấp <i style="font-size:12px;">(Không bắt buộc)</i></label>
                                    <input type="text" class="form-control" value="{{ old('allowance') }}" name="allowance"  placeholder="Nhập vào phụ cấp trong tháng">                                  
                                </div>

                                <div class="form-group">
                                    <label for="inputAdvance">Ứng trước <i style="font-size:12px;">(Không bắt buộc)</i></label>
                                    <input type="text" class="form-control" value="{{ old('advance') }}" name="advance"  placeholder="Nhập vào số tiền đã ứng nếu có">                                  
                                </div>

                                <div class="form-group">
                                    <label for="inputLeave">Ngày nghỉ phép <i style="font-size:12px;">(Không bắt buộc)</i></label>
                                    <input type="text" class="form-control" value="{{ old('month_leave') }}" name="month_leave"  placeholder="Nhập vào số ngày nghỉ phép">                                   
                                </div>

                                <div class="form-group">
                                    <label for="inputInsurance">Mức đóng bảo hiểm xã hội <i style="font-size:12px;">(Không bắt buộc)</i></label>
                                    <input type="text" class="form-control" value="{{ old('insurance_amount') }}" name="insurance_amount"  placeholder="Nhập vào mức đóng bảo hiểm xã hội">                                  
                                </div>

                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="staff_id" value="{{ $staff->id }}">                                   
                                    <input type="hidden" class="form-control" name="month_salary" value="{{ date('m/Y', strtotime('last month')) }}">  
                                    <input type="hidden" class="form-control" value="{{ $staff->code }}" name="staff_code">                                                                    
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" onclick="return confirm('Vui lòng kiểm tra dữ liệu và xác nhận ?')" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
</div>

<script>
    $("#staff-code").attr('disabled','disabled');
</script>
@endsection