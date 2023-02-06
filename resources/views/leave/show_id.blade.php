@extends('client_layout')
@section('title', 'Thống kê ngày phép')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thống kê ngày nghỉ phép</h1>
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
                                <th>Tên</th>
                                <th>Phòng ban</th>
                                <th>Số ngày phép</th>
                                <th>Thời gian làm việc</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{{ $leave[0]->staff->code }}</td>
                                <td>{{ $leave[0]->staff->last_name . ' ' . $leave[0]->staff->first_name }}</td>
                                <td>{{ $leave[0]->staff->department->name }}</td>
                                <td>{{ $leave[0]->number }}</td>
                                <td>{{ $leave[0]->working_time }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection