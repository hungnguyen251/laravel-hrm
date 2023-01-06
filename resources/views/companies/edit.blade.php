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
                        <h1>Sửa thông tin công ty</h1>
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
                            <h3 class="card-title">Sửa thông tin công ty</h3>
                        </div>

                        <form action="{{ route('companies.update', [$company->id]) }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputName">Tên </label>
                                    <input type="text" class="form-control" value="{{ $company->name }}" name="name" placeholder="Nhập vào tên công ty">
                                </div>

                                <div class="form-group">
                                    <label for="inputEmail">Email </label>
                                    <input type="text" class="form-control" value="{{ $company->email }}" name="email"  placeholder="Nhập vào email">
                                </div>

                                <div class="form-group">
                                    <label for="inputPhone">Số điện thoại </label>
                                    <input type="text" class="form-control" value="{{ $company->phone }}" name="phone"  placeholder="Nhập vào số điện thoại">
                                </div>

                                <div class="form-group">
                                    <label for="inputAddess">Địa chỉ </label>
                                    <input type="text" class="form-control" value="{{ $company->address }}" name="address"  placeholder="Nhập vào địa chỉ">
                                </div>

                                <div class="form-group">
                                    <label for="inputMST">Mã số thuế </label>
                                    <input type="text" class="form-control" value="{{ $company->tax_code }}" name="tax_code"  placeholder="Nhập vào MST">
                                </div>

                                <div class="form-group">
                                    <label for="inputDate">Ngày thành lập (*)</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control"><i class="far fa-calendar-alt"></i></span>
                                        </div>
                                        <input type="text" name="founding_date" id="founding_date"  value="{{ date('d/m/Y', strtotime($company->founding_date)) }}" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" inputmode="numeric">
                                    </div>
                                    @if ($errors->has('founding_date'))
                                        <span class="text-danger">{{ $errors->first('founding_date') }}</span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="inputAvatar">Logo </label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inputLogo" name="logo" value="{{ $company->logo }}" accept=".jpg, .png, .jpeg">
                                            <label class="custom-file-label" for="inputFile">{{ $company->logo }}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="inputWeb">Website </label>
                                    <input type="text" class="form-control" value="{{ $company->website }}" name="website"  placeholder="Nhập vào website công ty">
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
</div>

@endsection