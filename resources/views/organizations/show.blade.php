@extends('client_layout')
@section('title', 'Tổ chức')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tổ chức nhân sự</h1>
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
                                <th>Tên phòng ban</th>
                                <th>Số lượng nhân sự</th>
                                <th>Trưởng phòng</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->staffs }}</td>
                                <td>{{ $item->leaderName }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $data->appends($_GET)->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>
@endsection