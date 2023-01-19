@extends('client_layout')
@section('title', 'Bảng tính lương')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách lương nhân viên</h1>
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
                                        <option value="staff.code">Mã nhân viên</option>
                                        <option value="staff.first_name">Tên nhân viên</option>
                                    </select>
                                </div>

                                <input name="keyword" type="search" class="form-control form-control-lg" placeholder="Tìm kiếm">
                                <input name="route_name" type="hidden" value="salaries.index">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default"><i class="fa fa-search"></i></button>
                                    <input type="button" value="Đặt Lại" class="btn btn-lg btn-default mx-2" style="font-size:18px;" onClick="window.location.href='index'"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-header">
                    <button type="submit" class="btn btn-info float-right"><a href="{{ route('salaries.create') }}" style="width: 100px;color:white"><i class="fas fa-plus"></i></a></button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'staff_id', 'route' => 'salaries.index' ]) }}">
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
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'amount', 'route' => 'salaries.index' ]) }}">
                                    Tiền lương
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'amount' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'amount' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th>Mức đóng BHXH</th>
                                <th>Ghi chú</th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'created_at', 'route' => 'salaries.index' ]) }}">
                                    Ngày tạo
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'created_at' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'created_at' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($salaries as $item)
                            <tr>
                                <td>{{ isset($item->staff->code) ? $item->staff->code : 'ERROR' }}</td>
                                <td>{{ isset($item->staff->last_name) ? $item->staff->last_name . ' ' . $item->staff->first_name : 'ERROR' }}</td>
                                <td>{{ isset($item->staff->department->name) ? $item->staff->department->name : 'ERROR' }}</td>
                                <td>{{ number_format($item->amount, 0, ',', '.') }} đ</td>
                                <td>{{ number_format($item->insurance_amount, 0, ',', '.') }} đ</td>
                                <td>{{ $item->note }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i></button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('salaries.edit', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item" type="submit">Sửa</button>
                                            </form>
                                            <form action="{{ route('salaries.destroy', ['id' => $item->id]) }}" method="POST">
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
                    {{ $salaries->appends($_GET)->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>
@endsection