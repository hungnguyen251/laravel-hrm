@extends('client_layout')
@section('title', 'Hợp đồng')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm hợp đồng</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('documents.index') }}" type="submit" name="back" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title"></h3>
                        </div>

                        <form method="post" action="{{ route('documents.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputContent">Tên hợp đồng</label>
                                    <input type="text" class="form-control" value="{{ old('title') }}" name="title"  placeholder="Nhập vào tên hợp đồng">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputAvatar">File đính kèm </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputAvatar" name="file_name">
                                            <label class="custom-file-label" for="inputFile">Tải lên</label>
                                        </div>
                                    </div>
                                    @if ($errors->has('file_name'))
                                        <span class="text-danger">{{ $errors->first('file_name') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputNote">Ghi chú</label>
                                    <input type="text" class="form-control" value="{{ old('note') }}" name="note"  placeholder="Nhập vào ghi chú">                                  
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