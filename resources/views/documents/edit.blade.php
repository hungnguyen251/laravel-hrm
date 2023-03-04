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
                        <h1>Sửa thông tin hợp đồng</h1>
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

                        <form method="post" enctype="multipart/form-data" action="{{ route('documents.update', [$document->id]) }}" >
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputTitle">Tiêu đề </label>
                                    <input type="text" class="form-control" value="{{ $document->title }}" name="title" placeholder="Nhập vào tên tài liệu">
                                </div>

                                <div class="form-group">
                                    <label for="inputFile">File đính kèm </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputFile" name="file_name">
                                            <label class="custom-file-label" for="inputFile">{{ $document->file_name }}</label>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="form-group">
                                    <label for="inputNote">Ghi chú</label>
                                    <input type="text" class="form-control" value="{{ $document->note }}" name="note"  placeholder="Nhập vào ghi chú">                                  
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