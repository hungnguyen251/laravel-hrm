@extends('client_layout')
@section('title', 'Thông báo')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Sửa thông báo</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('notifications.index') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title">Sửa</h3>
                        </div>

                        <form method="post" action="{{ route('notifications.update', [$notification->id]) }}" >
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputTitle">Tiêu đề </label>
                                    <input type="text" class="form-control" value="{{ $notification->title }}" name="title" placeholder="Nhập vào tiêu đề">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif  
                                </div>

                                <div class="form-group">
                                    <label for="inputContent">Tên </label>
                                    <input type="text" class="form-control" value="{{ $notification->content }}" name="content" placeholder="Nhập vào nội dung">
                                    @if ($errors->has('content'))
                                        <span class="text-danger">{{ $errors->first('content') }}</span>
                                    @endif  
                                </div>

                                <div class="form-group">
                                    <label for="inputType">Trạng thái </label>
                                    <select class="form-control" name="status">
                                        <option {{ $notification->status == 'waiting' ? 'selected' : ''}}>Chờ phê duyệt</option>
                                        <option {{ $notification->status == 'approve' ? 'selected' : ''}}>Phê duyệt</option>
                                        <option {{ $notification->status == 'refuse' ? 'selected' : ''}}>Từ chối</option>
                                    </select>
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