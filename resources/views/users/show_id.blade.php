@extends('client_layout')
@section('title', 'Tài khoản')

@section('content')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin tài khoản</h1>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content-header">
            <div class="card">
                <!-- /.card-body -->
                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>Mã nhân viên</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Phân quyền</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{{ isset($user->staff->code) ? $user->staff->code : 'ERROR' }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>
                                    @if ('super_admin' == $user->decentralization)
                                        {{ 'Trùm cuối' }}
                                    @elseif ('admin' == $user->decentralization)
                                        {{ 'Quản trị viên' }}
                                    @elseif ('accountant' == $user->decentralization)
                                        {{ 'Kế toán' }}
                                    @else
                                        {{ 'Nhân viên' }}
                                    @endif
                                </td>
                                <td>{{ $user->status == 'active' ? 'Đang hoạt đông' : 'Đã xóa' }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-footer -->
            </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
<!-- /.content-wrapper -->
@endsection