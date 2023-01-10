@extends('client_layout')
@section('title', 'Nhân viên')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách nhân viên</h1>
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
                <div class="card-header d-flex" style="height: 65px;">
                    <a href="{{ route('staffs.create') }}" class="btn btn-block btn-info" style="position: absolute;width: 150px; right: 40px;">Thêm</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên nhân viên</th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Vị trí</th>
                                <th>Phòng ban</th>
                                <th>Bằng cấp</th>
                                <th>Kiểu nhân viên</th>
                                <th>Ngày bắt đầu</th>
                                <th>Trạng thái</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($staffs as $item)
                            <tr>
                                <td>{{ $item->code }}</td>
                                <td>{{ $item->last_name . ' ' . $item->first_name }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->date_of_birth)) }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->position->name }}</td>
                                <td>{{ $item->department->name }}</td>
                                <td>{{ $item->diploma->name }}</td>
                                <td>{{ $item->type }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->start_date)) }}</td>
                                <td>
                                    @if ($item->status == 'active') 
                                        <span style="background-color:#C6F6E4;color:#06C935;padding: 5px 10px;border-radius:15px;"><i class="fa fa-circle" aria-hidden="true" style="font-size: 8px;"></i>Đang làm việc</span>
                                    @else
                                        <span style="background-color:#F8B9B1;color:#E72108;padding: 5px 10px;border-radius:15px;"><i class="fa fa-circle" aria-hidden="true" style="font-size: 8px;"></i>Đã nghỉ việc</span>
                                    @endif
                                </td>
                                <td>
                                <div class="btn-group">
                                    <form action="{{ route('staffs.edit', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-warning" type="submit" value="Sửa" />
                                    </form>

                                    <form action="{{ route('staffs.destroy', ['id' => $item->id]) }}" method="POST">
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
                    {{ $staffs->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>
@endsection