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
                <div class="row">
                    <div class="col-md-6 offset-md-2">
                        <form action="#" id="search">
                            <div class="input-group mt-3">
                                <div class="col-md-2">
                                    <select name="option" class="custom-select custom-select-lg" id="validationDefault04" style="font-size:18px;" required>
                                      <option selected disabled value="">Chọn</option>
                                      <option value="code">Mã nhân viên</option>
                                      <option value="code">Tên</option>
                                      <option value="code">Trạng thái</option>
                                    </select>
                                </div>

                                <input name="keyword" type="search" class="form-control form-control-lg" placeholder="Tìm kiếm">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default"><i class="fa fa-search"></i></button>
                                    <input type="button" value="Đặt Lại" class="btn btn-lg btn-default mx-2" style="font-size:18px;" onClick="window.location.href='index'"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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
                                <th>Số ngày phép</th>
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
                                <td><a href="{{ route('leave.index', ['filter[staff_id]' => $item->id]) }}" class="btn btn-block btn-primary">Xem</a></td>
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
                    {{ $staffs->appends($_GET)->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>
@endsection