@extends('client_layout')
@section('title', 'Nhân viên ')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm nhân viên</h1>
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
                            <h3 class="card-title">Thêm nhân viên</h3>
                        </div>

                        <form method="post"  enctype="multipart/form-data" action="{{ route('staffs.store') }}">
                            @csrf
                            @method('POST')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Họ </label>
                                    <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" placeholder="Nhập vào họ và tên nhân viên">
                                    @if ($errors->has('last_name'))
                                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputContent">Tên đệm và tên </label>
                                    <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name"  placeholder="Nhập vào tên đệm và tên nhân viên">
                                    @if ($errors->has('first_name'))
                                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputDOB">Ngày sinh (*)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="date_of_birth" id="date_of_birth"  value="{{ old('date_of_birth') }}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                    @if ($errors->has('date_of_birth'))
                                        <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputAvatar">Ảnh đại diện </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputAvatar" name="avatar" accept=".jpg, .png, .jpeg">
                                            <label class="custom-file-label" for="inputFile">Chọn ảnh</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('avatar'))
                                        <span class="text-danger">{{ $errors->first('avatar') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputType">Kiểu nhân viên </label>
                                    <select class="form-control" name="type">
                                        <option></option>
                                        <option {{ old('type') == 'Toàn thời gian' ? 'selected' : ''}} value="1">Toàn thời gian</option>
                                        <option {{ old('type') == 'Bán thời gian' ? 'selected' : ''}} value="2">Bán thời gian</option>
                                        <option {{ old('type') == 'Thực tập sinh' ? 'selected' : ''}} value="3">Thực tập sinh</option>
                                        <option {{ old('type') == 'Thử việc' ? 'selected' : ''}} value="0">Thử việc</option>
                                    </select>
                                    @if ($errors->has('type'))
                                        <span class="text-danger">{{ $errors->first('type') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputName">Địa chỉ </label>
                                    <input type="text" class="form-control" value="{{ old('address') }}" name="address" placeholder="Nhập vào địa chỉ">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputDecentralization">Giới tính </label>
                                    <select class="form-control" name="gender">
                                        <option {{ old('gender') == 'Nam' ? 'selected' : ''}} value="0">Nam</option>
                                        <option {{ old('gender') == 'Nữ' ? 'selected' : ''}} value="1">Nữ</option>
                                    </select>
                                    @if ($errors->has('gender'))
                                        <span class="text-danger">{{ $errors->first('gender') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputPosition">Vị trí</label>
                                    <select class="form-control" name="position_id">
                                        <option></option>
                                        @foreach ($infoClassification['positions'] as $position)
                                            <option {{ old('position_id') == $position->name ? 'selected' : ''}}>{{ $position->name }}</option>
                                        @endforeach
                                    </select> 
                                    @if ($errors->has('position_id'))
                                        <span class="text-danger">{{ $errors->first('position_id') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputPosition">Phòng ban</label>
                                    <select class="form-control" name="department_id">
                                        <option></option>
                                        @foreach ($infoClassification['departments'] as $department)
                                            <option {{ old('department_id') == $department->name ? 'selected' : ''}}>{{ $department->name }}</option>
                                        @endforeach
                                    </select> 
                                    @if ($errors->has('department_id'))
                                        <span class="text-danger">{{ $errors->first('department_id') }}</span>
                                    @endif                                    
                                </div>
                                <div class="form-group">
                                    <label for="inputPosition">Bằng cấp</label>
                                    <select class="form-control" name="diploma_id">
                                        <option></option>
                                        @foreach ($infoClassification['diplomas'] as $diploma)
                                            <option {{ old('diploma_id') == $diploma->name ? 'selected' : ''}}>{{ $diploma->name }}</option>
                                        @endforeach
                                    </select> 
                                    @if ($errors->has('diploma_id'))
                                        <span class="text-danger">{{ $errors->first('diploma_id') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputCategoryId">Tình trạng hôn nhân </label>
                                    <select class="form-control" name="marriage_status">
                                        <option {{ old('marriage_status') == 'Độc thân' ? 'selected' : ''}} value="0">Độc thân</option>
                                        <option {{ old('marriage_status') == 'Đã kết hôn' ? 'selected' : ''}} value="1">Đã kết hôn</option>
                                    </select>
                                    @if ($errors->has('marriage_status'))
                                        <span class="text-danger">{{ $errors->first('marriage_status') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputStartDate">Ngày bắt đầu (*)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="start_date" id="start_date"  value="{{ old('start_date') }}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                    @if ($errors->has('start_date'))
                                        <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputContent">Tiền lương </label>
                                    <input type="text" class="form-control" value="{{ old('amount') }}" name="amount"  placeholder="Nhập vào tiền lương mỗi tháng" required>                                 
                                </div>

                                <div class="form-group d-flex flex-column">
                                    <label>Trạng thái</label>
                                    <div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;">
                                        <div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;">
                                            <input type="checkbox" name="status" checked data-bootstrap-switch="">
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