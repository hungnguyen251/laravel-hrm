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
                <div class="row">
                    <div class="col-md-6 offset-md-2">
                        <form action="{{ route('filter.search') }}" id="search">
                            <div class="input-group mt-3">
                                <div class="col-md-2">
                                    <select name="option" class="custom-select custom-select-lg" id="validationDefault04" style="font-size:18px;" required>
                                        <option selected disabled value="">Chọn</option>
                                        <option value="staff.code">Mã nhân viên</option>
                                        <option value="code">Mã phiếu lương</option>
                                        <option value="month">Tháng</option>
                                    </select>
                                </div>

                                <input name="keyword" type="search" class="form-control form-control-lg" placeholder="Tìm kiếm">
                                <input name="route_name" type="hidden" value="timesheets.index">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default"><i class="fa fa-search"></i></button>
                                    <input type="button" value="Đặt Lại" class="btn btn-lg btn-default mx-2" style="font-size:18px;" onClick="window.location.href='month_selection'"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-header" style="height: 65px;">
                    @if (!empty($_REQUEST['filter']['month']) && ltrim($_REQUEST['filter']['month'], 0) == ltrim(date('m', strtotime('last month')), 0)) 
                        @if(!empty($timesheets))
                            @foreach ($timesheets as $item) 
                                @if ('processing' == $item->status || empty($item->status))
                                    <button type="submit" onclick="return confirm('Bạn có muốn xóa dữ liệu hiện có và tính toán tự động ?')" class="btn btn-info"  data-toggle="modal" data-target="#modal-auto" style="color:white;">Tính tự động</button>
                                    <button type="submit" class="btn btn-info" onclick="showStaffList()"  data-toggle="modal" data-target="#modal-manual" style="color:white;">Tính thủ công</button>    
                                    <button type="submit" class="btn btn-info float-right"><a href="{{ route('timesheets.create') }}" style="color:white;">Thêm</a></button>
                                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn chốt sổ lương?')" class="btn btn-primary float-right"><a href="{{ route('timesheets.payrollConfirmation') }}" style="color:white;">Chốt sổ</a></button>
                                    @break
                                @endif
                            @endforeach
                        @else
                            <button type="submit" onclick="return confirm('Bạn có muốn xóa dữ liệu hiện có và tính toán tự động ?')" class="btn btn-info"  data-toggle="modal" data-target="#modal-auto" style="color:white;">Tính tự động</button>
                            <button type="submit" class="btn btn-info" onclick="showStaffList()"  data-toggle="modal" data-target="#modal-manual" style="color:white;">Tính thủ công</button>    
                            <button type="submit" class="btn btn-info float-right"><a href="{{ route('timesheets.create') }}" style="color:white;">Thêm</a></button>
                            <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn chốt sổ lương?')" class="btn btn-primary float-right"><a href="{{ route('timesheets.payrollConfirmation') }}" style="color:white;">Chốt sổ</a></button>
                        @endif
                    @endif
                    <button type="submit" class="btn btn-warning float-right"><a href="{{ route('timesheets.monthSelection') }}" style="color:white;">Quay lại</a></button>
                </div>
                
                @php
                    $queryString = !empty($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '';
                @endphp

                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>Mã nhân viên</th>
                                <th>Mã phiếu lương</th>
                                <th>Lương cứng</th>
                                <th>Phụ cấp</th>
                                <th>Ngày công</th>
                                <th>Ứng trước</th>
                                <th>Mức đóng BHXH</th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'received', 'route' => 'timesheets.index', 'query_default' => $queryString ]) }}">
                                    Thực nhận
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'received' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'received' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th>Tháng</th>
                                <th>Số ngày nghỉ</th>
                                <th>Ngày phép còn</th>
                                <th>Ghi chú</th>
                                <th>Trạng thái</th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'created_at', 'route' => 'timesheets.index', 'query_default' => $queryString ]) }}">
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
                            @foreach ($timesheets as $item)
                            @if('active' == $item->staff->status) 
                            <tr>
                                <td>{{ isset($item->staff->code) ? $item->staff->code : 'ERROR' }}</td>
                                <td>{{ $item->code }}</td>
                                <td>{{ isset($item->salary->amount) ? number_format($item->salary->amount, 0, ',', '.') : 'ERROR' }} đ</td>
                                <td>{{ number_format($item->allowance, 0, ',', '.') }} đ</td>
                                <td>{{ $item->work_day }}</td>
                                <td>{{ number_format($item->advance, 0) }} đ</td>
                                <td>{{ isset($item->salary->insurance_amount) ? number_format($item->salary->insurance_amount, 0, ',', '.') : 'ERROR' }} đ</td>
                                <td>{{ number_format($item->received, 0, ',', '.') }} đ</td>
                                <td>{{ $item->month }}</td>
                                <td>{{ number_format($item->month_leave, 1, ',', '.') }}</td>
                                <td>{{ number_format($item->remaining_leave, 1, ',', '.') }}</td>
                                <td>{{ $item->note }}</td>
                                <td>{{ $item->status == 'processing' ? 'Đang xử lý' : 'Chốt lương' }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        @if ('closed' != $item->status)
                                        <button type="button" class="btn btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i></button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('timesheets.edit', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item" type="submit">Sửa</button>
                                            </form>
                                            <form action="{{ route('timesheets.destroy', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="dropdown-item">Xóa</button>
                                            </form>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-2">
                        <b>Chú ý: </b> 
                        <i>Mức đóng BHXH kể trên là mức tối thiểu, NLĐ sẽ phải đóng BHXH + BHYT là 10.5%, công ty đóng là 21% theo quyết định 959/QĐ-BHXH </i>
                    </div>

                </div>

                <div class="card-footer clearfix">
                    {{ $timesheets->appends($_GET)->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>

    <div class="modal fade" id="modal-auto">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tạo tính lương tự động</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('timesheets.automatic') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group d-flex">
                                <div class="form-group col-sm-12 px-0">
                                    <label>Chọn tháng (*)</label>
                                    <select class="form-control" name="salary_month">
                                        <option>{{ date('m/Y', strtotime('last month')) }}</option>
                                        {{-- <option>{{ date('m/Y') }}</option> --}}
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <div class="modal-footer justify-content-between">
                            <button type="button" name="" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-manual">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tạo tính lương thủ công tháng {{ date('m/Y', strtotime('last month')) }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    {{-- <form method="" action="#"> --}}
                        <div class="card-body">
                            <div class="form-group d-flex">
                                <div class="form-group col-sm-12 px-0">
                                    <label>Chọn nhân viên (*)</label>
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="5%" style="text-align:center;">Mã nhân viên</th>
                                                <th width="6%" style="text-align:center;">Tên nhân viên</th>
                                                <th width="10%" style="text-align:center;">Phòng ban</th>
                                                <th width="10%" style="text-align:center;">Tháng</th>
                                                <th width="9%" style="text-align:center;">Tính lương</th>
                                            </tr>
                                        </thead>
        
                                        <tbody id="staff-list">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    
                        <div class="modal-footer justify-content-between">
                            <button type="button" name="" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            {{-- <button type="submit" class="btn btn-primary">Xác nhận</button> --}}
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>

    <script>
        function showStaffList() {
            $.ajax({
                type: "GET",
                url: '/ajax/staffs?filter[status]=active',
                success: function(data) {
                    let body = '';
                    var month = '{{ date('m/Y', strtotime('last month')) }}';

                    if(data !== null && data !== undefined) {

                        for (i = 0; i < data.length; i++) {
                            var route = '{{ route("timesheets.manualView", ":id") }}';
                            route = route.replace(':id', data[i].id);

                            body += `
                                        <tr class="gradeA">
                                            <td style="text-align:center;">`+data[i].code+`</td>
                                            <td style="text-align:center;">`+data[i].last_name+` `+data[i].first_name+`</td>
                                            <td style="text-align:center;">`+data[i].department.name+`</td>
                                            <td style="text-align:center;">`+month+`</td>
                                            <td style="text-align:center;"><a href="`+route+`">Chọn</a></td>
                                        </tr>
                                    `;
                        }
                    }

                    $('#staff-list').html(body);
                }
            });
        }
    </script>
@endsection