@extends('client_layout')
@section('title', 'Bảng tính lương')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Bảng tính lương nhân viên</h1>
                </div>
                </div>
            </div>
        </section>


        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
                {{ Session::get('success') }}
            </div>
        @endif

        @if (Session::has('failed'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
                {{ Session::get('failed') }}
            </div>
        @endif

        <section class="content-header">
            <div class="card">
                <div class="card-header" style="height: 65px;">
                    <button type="submit" onclick="return confirm('Bạn có muốn xóa dữ liệu hiện có và tính toán tự động ?')"class="btn btn-info"  data-toggle="modal" data-target="#modal-auto" style="color:white;">Tính tự động</button>
                    <button type="submit" class="btn btn-info"><a href="{{ route('timesheets.create') }}" style="color:white;">Tính thủ công</a></button>
                    <button type="submit" class="btn btn-info float-right"><a href="{{ route('timesheets.create') }}" style="color:white;">Thêm</a></button>
                    <button type="submit" class="btn btn-warning float-right"><a href="{{ route('timesheets.monthSelection') }}" style="color:white;">Quay lại</a></button>
                </div>

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
                                <th>BHXH (Nhân viên)</th>
                                <th>BHXH (Công ty)</th>
                                <th>Thực nhận</th>
                                <th>Tháng</th>
                                <th>Số ngày nghỉ</th>
                                <th>Ngày phép còn</th>
                                <th>Ghi chú</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($timesheets as $item)
                            @php
                                $issuranceStaff = isset($item->salary->amount) ? 0.105 * $item->salary->amount : 0;
                                $issuranceCompany = isset($item->salary->amount) ? 0.205 * $item->salary->amount : 0;
                            @endphp
                            <tr>
                                <td>{{ isset($item->staff->code) ? $item->staff->code : 'ERROR' }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ isset($item->salary->amount) ? number_format($item->salary->amount, 0) : 'ERROR' }} đ</td>
                                <td>{{ number_format($item->allowance, 0) }} đ</td>
                                <td>{{ $item->work_day }}</td>
                                <td>{{ number_format($item->advance, 0) }} đ</td>
                                <td>{{ number_format($issuranceStaff, 0) }} đ</td>
                                <td>{{ number_format($issuranceCompany, 0) }} đ</td>
                                <td>{{ number_format($item->received, 0) }} đ</td>
                                <td>{{ $item->month }}</td>
                                <td>{{ number_format($item->month_leave, 1) }}</td>
                                <td>{{ number_format($item->remaining_leave, 1) }}</td>
                                <td>{{ $item->note }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>
                                <div class="btn-group">
                                    <form action="{{ route('timesheets.edit', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-warning" type="submit" value="Sửa" />
                                    </form>

                                    <form action="{{ route('timesheets.destroy', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger" type="submit" value="Xóa" />
                                    </form>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $timesheets->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>

    <div class="modal fade" id="modal-auto">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tạo tính lương tự động</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('timesheets.automatic') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group d-flex">
                                <div class="form-group col-sm-12 px-0">
                                    <label>Chọn tháng (*)</label>
                                    <select class="form-control" name="salary_month">
                                        <option>{{ date('m/Y', strtotime('last month')) }}</option>
                                        <option>{{ date('m/Y') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <div class="modal-footer justify-content-between">
                            <button type="button" name="" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection