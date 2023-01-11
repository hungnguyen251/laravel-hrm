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
                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>Năm/Tháng</th>
                                <th>Loại chi trả</th>
                                <th>Tên sổ lương</th>
                                <th>Ngày thanh toán</th>
                                <th>Liệt kê chi tiết</th>
                            </tr>
                        </thead>
                        @php
                            $month =  $start = explode('-', Config::get('app.month_start_calculation'));
                        @endphp
                        <tbody>
                            
                            @for($i = 0; $i <= $times; $i++)
                            <tr>
                                <td>{{ date('m/Y', mktime(0, 0, 0, date($month[1])+$i  , date($month[2]), date($month[0]))) }}</td>
                                <td>Hàng tháng</td>
                                <td>Bảng lương {{ date('m/Y', mktime(0, 0, 0, date($month[1])+$i  , date($month[2]), date($month[0]))) }}</td>
                                <td>{{ date('d/m/Y', mktime(0, 0, 0, date($month[1])+$i  , date('15'), date($month[0]))) }}</td>
                                <td><a href="{{ route('timesheets.index') }}" class="btn btn-info">Xem</a></td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                {{-- <div class="card-footer clearfix">
                    {{ $times->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style> --}}

            </div>
        </section>
    </div>
@endsection