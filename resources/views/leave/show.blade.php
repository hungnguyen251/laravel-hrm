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
                                        <option value="staff.first_name">Tên</option>
                                        <option value="staff.code">Mã nhân viên</option>
                                    </select>
                                </div>

                                <input name="keyword" type="search" class="form-control form-control-lg" placeholder="Tìm kiếm">
                                <input name="route_name" type="hidden" value="leave.index">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default"><i class="fa fa-search"></i></button>
                                    <input type="button" value="Đặt Lại" class="btn btn-lg btn-default mx-2" style="font-size:18px;" onClick="window.location.href='index'"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-header d-flex" style="height: 65px;">
                    <a href="{{ route('leave.create') }}" class="btn btn-block btn-info" style="position: absolute;width: 150px; right: 40px;">Thêm</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'staff_id', 'route' => 'leave.index' ]) }}">
                                    Mã nhân viên
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'staff_id' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'staff_id' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th>Tên</th>
                                <th>Phòng ban</th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'number', 'route' => 'leave.index' ]) }}">
                                    Số ngày phép
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'number' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'number' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'working_time', 'route' => 'leave.index' ]) }}">
                                    Thời gian làm việc
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'working_time' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'working_time' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($leave as $item)
                                @if (!empty($item->staff->status) && 'active' == $item->staff->status)
                                    <tr>
                                        <td>{{ $item->staff->code }}</td>
                                        <td>{{ $item->staff->last_name . ' ' . $item->staff->first_name }}</td>
                                        <td>{{ $item->staff->department->name }}</td>
                                        <td>{{ $item->number }}</td>
                                        <td>{{ $item->working_time }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i></button>
                                                <div class="dropdown-menu">
                                                    <form action="{{ route('leave.edit', ['id' => $item->id]) }}" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Sửa</button>
                                                    </form>
                                                    <form action="{{ route('leave.destroy', ['id' => $item->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="dropdown-item">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $leave->appends($_GET)->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>
@endsection