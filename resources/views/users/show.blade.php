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
                    <h1>Danh sách tài khoản</h1>
                </div>
                </div>
            </div><!-- /.container-fluid -->
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
                <div class="card-header d-flex" style="height: 65px;">
                    <a href="{{ route('users.create') }}" class="btn btn-block btn-info" style="position: absolute;width: 150px; right: 40px;">Thêm</a>
                </div>
                <!-- /.card-header -->
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
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ isset($item->staff->code) ? $item->staff->code : 'ERROR' }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>
                                    @if ('super_admin' == $item->decentralization)
                                        {{ 'Trùm cuối' }}
                                    @elseif ('admin' == $item->decentralization)
                                        {{ 'Quản trị viên' }}
                                    @elseif ('accountant' == $item->decentralization)
                                        {{ 'Kế toán' }}
                                    @else
                                        {{ 'Nhân viên' }}
                                    @endif
                                </td>
                                <td>{{ $item->status == 'active' ? 'Đang hoạt đông' : 'Đã xóa' }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                <div class="btn-group">
                                    <form action="{{ route('users.edit', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-warning" type="submit" value="Sửa" />
                                    </form>

                                    <form action="{{ route('users.destroy', ['id' => $item->id]) }}" method="POST">
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
                <!-- /.card-footer -->

                <div class="card-footer clearfix">
                    {{ $users->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>
            </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
<!-- /.content-wrapper -->
@endsection