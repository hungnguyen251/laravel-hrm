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
                        <form action="{{ route('filter.search') }}" id="search">
                            <div class="input-group mt-3">
                                <div class="col-md-2">
                                    <select name="option" class="custom-select custom-select-lg" id="validationDefault04" style="font-size:18px;" required>
                                        <option selected disabled value="">Chọn</option>
                                        <option value="code">Mã nhân viên</option>
                                        <option value="first_name">Tên</option>
                                    </select>
                                </div>

                                <input name="keyword" type="search" class="form-control form-control-lg" placeholder="Tìm kiếm">
                                <input name="route_name" type="hidden" value="staffs.index">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default"><i class="fa fa-search"></i></button>
                                    <input type="button" value="Đặt Lại" class="btn btn-lg btn-default mx-2" style="font-size:18px;" onClick="window.location.href='index'"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-header">
                    <button type="submit" class="btn btn-info float-right"><a href="{{ route('staffs.create') }}" style="width: 100px;color:white"><i class="fas fa-plus"></i></a></button>
                </div>
                
                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'code', 'route' => 'staffs.index' ]) }}">
                                    Mã NV 
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'code' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'code' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'first_name', 'route' => 'staffs.index' ]) }}">
                                    Tên 
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'first_name' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'first_name' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th>Ngày sinh</th>
                                <th>Địa chỉ</th>
                                <th>Vị trí</th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'department_id', 'route' => 'staffs.index' ]) }}">
                                    Phòng ban 
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'department_id' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                    <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'department_id' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th>Bằng cấp</th>
                                <th>Kiểu nhân viên</th>
                                <th>Ngày bắt đầu</th>
                                <th>Số ngày phép</th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'status', 'route' => 'staffs.index' ]) }}">
                                    Trạng thái 
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'status' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'status' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
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
                                <td>{{ isset($item->position->name) ? $item->position->name : '' }}</td>
                                <td>{{ isset($item->department->name) ? $item->department->name : '' }}</td>
                                <td>{{ isset($item->diploma->name) ? $item->diploma->name : '' }}</td>
                                <td>
                                    @if($item->type == '0')
                                        {{ 'Thử việc' }}
                                    @elseif($item->type == '1')
                                        {{ 'Nhân viên toàn thời gian' }}
                                    @elseif($item->type == '2')
                                        {{ 'Nhân viên part-time' }}
                                    @else
                                        {{ 'Thực tập sinh' }}
                                    @endif
                                </td>
                                <td>{{ date('d/m/Y', strtotime($item->start_date)) }}</td>
                                <td><a href="{{ route('leave.index', ['filter[staff_id]' => $item->id]) }}" class="btn btn-block btn-primary">Xem</a></td>
                                <td>
                                    @if ($item->status == 'active') 
                                        <span style="background-color:#C6F6E4;color:#06C935;padding: 5px 10px;border-radius:15px;">Đang làm việc</span>
                                    @else
                                        <span style="background-color:#F8B9B1;color:#E72108;padding: 5px 10px;border-radius:15px;">Đã nghỉ việc</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i></button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('staffs.edit', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item" type="submit">Sửa</button>
                                            </form>
                                            <form action="{{ route('staffs.destroy', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="dropdown-item">Xóa</button>
                                            </form>
                                        </div>
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