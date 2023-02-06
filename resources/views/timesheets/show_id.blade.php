@extends('client_layout')
@section('title', 'Bảng tính lương')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bảng lương</h1>
                </div>
                </div>
            </div>
        </section>

        <section class="content-header">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>Mã nhân viên</th>
                                <th>Mã phiếu lương</th>
                                <th>Lương cứng</th>
                                <th>Phụ cấp</th>
                                <th>Ngày công</th>
                                <th>Ứng trước</th>
                                <th>Mức đóng BHXH</th>
                                <th>Thực nhận</th>
                                <th>Tháng</th>
                                <th>Số ngày nghỉ</th>
                                <th>Ngày phép còn</th>
                                <th>Ghi chú</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($timesheets as $item)
                            <tr>
                                <td>{{ isset($item->staff->code) ? $item->staff->code : 'ERROR' }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ isset($item->salary->amount) ? number_format($item->salary->amount, 0, ',', '.') : 'ERROR' }} đ</td>
                                <td>{{ number_format($item->allowance, 0, ',', '.') }} đ</td>
                                <td>{{ $item->work_day }}</td>
                                <td>{{ number_format($item->advance, 0) }} đ</td>
                                <td>{{ isset($item->salary->insurance_amount) ? number_format($item->salary->insurance_amount, 0, ',', '.') : 'ERROR' }} đ</td>
                                <td>{{ number_format($item->received, 0, ',', '.') }} đ</td>
                                <td>{{ $item->month }}</td>
                                <td>{{ number_format($item->month_leave, 1, ',', '.') }}</td>
                                <td>{{ number_format($item->remaining_leave, 1, ',', '.') }}</td>
                                <td>{{ $item->note }}</td>
                                <td>{{ $item->status == 'processing' ? 'Đang xử lý' : 'Chốt lương' }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-2">
                        <b>Chú ý: </b> 
                        <i>Mức đóng BHXH kể trên là mức tối thiểu, NLĐ sẽ phải đóng BHXH + BHYT là 10.5%, công ty đóng là 21% theo quyết định 959/QĐ-BHXH </i>
                    </div>

                </div>

                <div class="card-footer clearfix">
                    {{ $timesheets->appends($_GET)->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>
@endsection