@extends('client_layout')
@section('title', 'Thông báo')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách thông báo</h1>
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

                <div class="card-header">
                    <button type="submit" class="btn btn-info float-right mx-2" data-toggle="modal" data-target="#modal-lg">Đơn xin nghỉ phép</button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th width="30%">Nội dung</th>
                                <th>Tên người tạo</th>
                                <th>Phòng ban</th>
                                <th>Trạng thái</th>
                                <th>Ngày tạo</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($notifications as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->content }}</td>
                                <td>{{ !empty($item->user->name) ? $item->user->name : 'ERROR' }}</td>
                                <td>{{ !empty($item->user->staff->department->name) ? $item->user->staff->department->name : 'ERROR' }}</td>
                                <td>
                                    @if('waiting' == $item->status)
                                    <span style="background-color:#e4e0b3fd;color:#efad04;padding: 5px 10px;border-radius:15px;">Chờ duyệt</span>
                                    @elseif('approve' == $item->status)
                                    <span style="background-color:#C6F6E4;color:#06C935;padding: 5px 10px;border-radius:15px;">Đã duyệt</span>
                                    @else
                                    <span style="background-color:#F8B9B1;color:#E72108;padding: 5px 10px;border-radius:15px;">Từ chối</span>
                                    @endif
                                </td>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <div class="btn-group">
                                            @if('waiting' == $item->status)
                                                <button type="button" class="btn btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i></button>
                                                <div class="dropdown-menu">
                                                    <form action="{{ route('notifications.edit', ['id' => $item->id]) }}" method="POST">
                                                        @csrf
                                                        <button class="dropdown-item" type="submit">Sửa</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $notifications->appends($_GET)->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tạo đơn xin nghỉ phép</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('notifications.leave') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group d-flex">
                                <div class="form-group col-sm-12 px-0">
                                    <label for="inputTitle">Tiêu đề (*)</label><br>
                                    <input type="text" class="form-control" name="title" value="Đơn xin nghỉ phép" placeholder="Nhập vào tiêu đề" list="title">
                                    <datalist id="title">
                                        <option value="Đơn xin nghỉ phép">
                                    </datalist>
                                </div>
                            </div>
    
                            <div class="form-group d-flex">
                                <div class="form-group col-sm-12 px-0">
                                    <label for="inputNumber">Số ngày nghỉ (*)</label>
                                    <input type="text" class="form-control" value="" name="number_leave" id="inputNumber" placeholder="Nhập vào số ngày nghỉ">
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="inputStartTime">Nghỉ từ ngày (*)</label>
                                <div class="form-group px-0 d-flex">
                                    <div class="form-group col-sm-5 px-0 px-0">
                                        <select class="form-control" name="start_time">
                                            <option>Sáng</option>
                                            <option>Chiều</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-5 d-flex">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="start_date" id="start_date" value="" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group">
                                <label for="inputEndTime">Đến ngày (*)</label>
                                <div class="form-group px-0 d-flex">
                                    <div class="form-group col-sm-5 px-0 px-0">
                                        <select class="form-control" name="end_time">
                                            <option>Chiều</option>
                                            <option>Sáng</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-5 d-flex">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="end_date" id="end_date"  value="" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group d-flex">
                                <div class="form-group col-sm-12 px-0">
                                    <label>Chế độ nghỉ (*)</label>
                                    <select class="form-control" name="reason">
                                        <option>Nghỉ phép năm</option>
                                        <option>Nghỉ ốm đau</option>
                                        <option>Nghỉ thai</option>
                                        <option>Nghỉ do tai nạn lao động hoặc bệnh nghề nghiệp</option>
                                        <option>Nghỉ kết hôn hoặc con kết hôn</option>
                                        <option>Bố mẹ vợ chồng hoặc con chết</option>
                                        <option>Nghỉ việc riêng không hưởng lương</option>
                                        <option>Nguyên nhân khác</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="form-group d-flex">
                                <div class="form-group col-sm-12 px-0">
                                    <label>Đề nghị bàn giao công việc đang làm cho (Tên + Phòng ban) (*)</label>
                                    <input type="text" class="form-control" id="note" name="note" placeholder="">
                                </div>
                            </div>
                        </div>
    
                        <div class="modal-footer justify-content-between">
                            <button type="button" name="" class="btn btn-default" data-dismiss="modal">Đóng</button>
                            <button type="submit" onclick="myFunction()" class="btn btn-primary">Lưu thay đổi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
            $("#inputNumber").prop('required',true);
            $("#note").prop('required',true);
            $("#end_date").prop('required',true);
            $("#start_date").prop('required',true);
        }
    </script>
@endsection