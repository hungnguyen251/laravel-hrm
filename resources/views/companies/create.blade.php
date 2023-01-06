@extends('client_layout')
@section('title', 'Công ty')

@section('content')
<div class="wrapper">
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm công ty</h1>
                    </div>
                    <div class="col-sm-6" style="text-align:right;">
                        <form action="" method="post">
                            <a href="{{ route('companies.index') }}" type="submit" class="btn btn-info">Quay lại</a>
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
                            <h3 class="card-title">Thêm công ty</h3>
                        </div>

                        <form method="post" enctype="multipart/form-data" action="{{ route('companies.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên </label>
                                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Nhập vào tên công ty">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif 
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email </label>
                                    <input type="text" class="form-control" value="{{ old('email') }}" name="email"  placeholder="Nhập vào email">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif 
                                </div>

                                <div class="form-group">
                                    <label for="inputPhone">Số điện thoại </label>
                                    <input type="text" class="form-control" value="{{ old('phone') }}" name="phone"  placeholder="Nhập vào số điện thoại">
                                    @if ($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif 
                                </div>

                                <div class="form-group">
                                    <label for="inputAddess">Địa chỉ </label>
                                    <input type="text" class="form-control" value="{{ old('address') }}" name="address"  placeholder="Nhập vào địa chỉ">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif 
                                </div>

                                <div class="form-group">
                                    <label for="inputMST">Mã số thuế </label>
                                    <input type="text" class="form-control" value="{{ old('tax_code') }}" name="tax_code"  placeholder="Nhập vào MST">
                                    @if ($errors->has('tax_code'))
                                        <span class="text-danger">{{ $errors->first('tax_code') }}</span>
                                    @endif 
                                </div>

                                <div class="form-group">
                                    <label for="inputDate">Ngày thành lập (*)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="founding_date" id="founding_date"  value="{{ old('founding_date') }}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                    @if ($errors->has('founding_date'))
                                        <span class="text-danger">{{ $errors->first('founding_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputAvatar">Logo </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputLogo" name="logo" value="{{ old('logo') }}" accept=".jpg, .png, .jpeg">
                                            <label class="custom-file-label" for="inputFile">Chọn ảnh</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputWeb">Website </label>
                                    <input type="text" class="form-control" value="{{ old('website') }}" name="website"  placeholder="Nhập vào website công ty">
                                </div>                                    
                                @if ($errors->has('website'))
                                    <span class="text-danger">{{ $errors->first('website') }}</span>
                                @endif 

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
</div>
@endsection