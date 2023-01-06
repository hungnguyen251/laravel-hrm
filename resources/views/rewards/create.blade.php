@extends('client_layout')
@section('title', 'Giải thưởng')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('rewards.index') }}" type="submit" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title">Thêm giải thưởng</h3>
                        </div>

                        <form method="post" action="{{ route('rewards.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputContent">Tên </label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name"  placeholder="Nhập vào tên giải thưởng">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif                                    
                                </div>

                                <div class="form-group">
                                    <label for="inputPrime">Tiền thưởng </label>
                                    <input type="text" class="form-control" value="{{ old('prime') }}" name="prime"  placeholder="Nhập vào tiền thưởng">
                                    @if ($errors->has('prime'))
                                        <span class="text-danger">{{ $errors->first('prime') }}</span>
                                    @endif                                    
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