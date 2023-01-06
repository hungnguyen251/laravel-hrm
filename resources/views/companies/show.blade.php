@extends('client_layout')
@section('title', 'Công ty')

@section('content')
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-11">
                        <h1>Thông tin công ty</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        {{-- <div class="card-header d-flex" style="height: 65px;">
            <a href="{{ route('companies.create') }}" class="btn btn-block btn-info" style="position: absolute;width: 150px; right: 40px;">Thêm</a>
        </div> --}}
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-green">
                            <div class="card-header">
                                <form action="{{ url('/companies/edit', ['id' => $companies[0]->id]) }}" method="POST">
                                    @csrf
                                    <input class="btn btn-warning float-right" type="submit" value="Sửa" />
                                </form>
                                <h3 class="card-title">{{ $companies[0]->name }}</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Mã số thuế</strong>
                                <p class="text-muted">{{ $companies[0]->tax_code }}</p>
                                <hr>

                                <strong><i class="fas fa-pencil-alt mr-1"></i> Ngày thành lập</strong>
                                <p class="text-muted">{{ $companies[0]->founding_date }}</p>
                                <hr>

                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>
                                <p class="text-muted">Địa chỉ HN: {{ $companies[0]->address }}</p>
                                <p class="text-muted">Địa chỉ HCM: 106A Cư Xá Nguyễn Văn Trổi, Phường 17, Phú Nhuận, Hồ Chí Minh 70000</p>
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Email</strong>
                                <p class="text-muted">{{ $companies[0]->email }}</p>
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Hotline</strong>
                                <p class="text-muted">{{ $companies[0]->phone }}</p>
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Website</strong>
                                </br>
                                <a href="{{ $companies[0]->website }}">{{ $companies[0]->website }}</a>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection