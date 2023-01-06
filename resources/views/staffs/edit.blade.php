@extends('client_layout')
@section('title', 'Nhân viên')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông tin cá nhân</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('staffs.index') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin</h3>
                        </div>

                        <form method="post" enctype="multipart/form-data" action="{{ route('staffs.update', [$staff->id]) }}" >
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Họ </label>
                                    <input type="text" class="form-control" value="{{ $staff->last_name }}" name="last_name" placeholder="Nhập vào họ của nhân viên">
                                </div>

                                <div class="form-group">
                                    <label for="inputContent">Tên đệm và tên </label>
                                    <input type="text" class="form-control" value="{{ $staff->first_name }}" name="first_name"  placeholder="Nhập vào tên đệm và tên nhân viên">
                                </div>

                                <div class="form-group">
                                    <label for="inputDOB">Ngày sinh (*)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="date_of_birth" id="date_of_birth"  value="{{date('d/m/Y', strtotime($staff->date_of_birth))}}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputAvatar">Ảnh đại diện </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputAvatar" name="avatar" accept=".jpg, .png, .jpeg">
                                            <label class="custom-file-label" for="inputFile">{{ $staff->avatar }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputType">Kiểu nhân viên </label>
                                    <select class="form-control" name="type">
                                        <option {{ $staff->type == 'Toàn thời gian' ? 'selected' : ''}}>Toàn thời gian</option>
                                        <option {{ $staff->type == 'Bán thời gian' ? 'selected' : ''}}>Bán thời gian</option>
                                        <option {{ $staff->type == 'Thực tập sinh' ? 'selected' : ''}}>Thực tập sinh</option>
                                        <option {{ $staff->type == 'Thử việc' ? 'selected' : ''}}>Thử việc</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Địa chỉ </label>
                                    <input type="text" class="form-control" value="{{ $staff->address }}" name="address" placeholder="Nhập vào địa chỉ">
                                </div>

                                <div class="form-group">
                                    <label for="inputDecentralization">Giới tính </label>
                                    <select class="form-control" name="gender">
                                        <option {{ $staff->gender == 'Nam' ? 'selected' : ''}}>Nam</option>
                                        <option {{ $staff->gender == 'Nữ' ? 'selected' : ''}}>Nữ</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputPosition">Vị trí</label>
                                    <select class="form-control" name="position_id" value="{{  $staff->position->name }}">
                                        @foreach ($infoClassification['positions'] as $position)
                                            <option {{ $staff->position->id == $position->id ? 'selected' : ''}}>{{ $position->name }}</option>
                                        @endforeach
                                    </select> 
                                </div>

                                <div class="form-group">
                                    <label for="inputPosition">Phòng ban</label>
                                    <select class="form-control" name="department_id" value="{{  $staff->department->name }}">
                                        @foreach ($infoClassification['departments'] as $department)
                                            <option {{ $staff->department->id == $department->id ? 'selected' : ''}}>{{ $department->name }}</option>
                                        @endforeach
                                    </select> 
                                </div>

                                <div class="form-group">
                                    <label for="inputPosition">Bằng cấp</label>
                                    <select class="form-control" name="diploma_id" value="{{  $staff->diploma->name }}">
                                        @foreach ($infoClassification['diplomas'] as $diploma)
                                            <option {{ $staff->diploma->id == $diploma->id ? 'selected' : ''}}>{{ $diploma->name }}</option>
                                        @endforeach
                                    </select> 
                                </div>

                                <div class="form-group">
                                    <label for="inputCategoryId">Tình trạng hôn nhân </label>
                                    <select class="form-control" name="marriage_status">
                                        <option {{ $staff->marriage_status == 'Độc thân' ? 'selected' : ''}}>Độc thân</option>
                                        <option {{ $staff->marriage_status == 'Đã kết hôn' ? 'selected' : ''}}>Đã kết hôn</option>
                                    </select>
                                </div>

                                <div class="form-group d-flex flex-column">
                                    <label>Trạng thái</label>
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;">
                                        <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                                            <input type="checkbox" name="status" {{ $staff->status == "inactive" ? "" : "checked" }} data-bootstrap-switch="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
</div>
@endsection