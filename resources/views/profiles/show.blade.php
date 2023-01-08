@extends('client_layout')
@section('title', 'Thông tin cá nhân')

@section('content')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-11">
                        <h1>Thông tin cá nhân</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('images/avatar/' . $staff->avatar) }}" alt="User profile picture">
                                </div>
            
                                <h3 class="profile-username text-center">{{ $staff->last_name . ' ' . $staff->first_name }}</h3>
                                <p class="text-muted text-center">PHP Developer</p>
            
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Ngày sinh</b> <a class="float-right">{{date('d-m-Y', strtotime( $staff["date_of_birth"]))}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Tình trạng hôn nhân</b> <a class="float-right">{{ $staff->marriage_status }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Thời gian làm việc</b> <a class="float-right">{{date('d/m/Y', strtotime( $staff->start_date ))}} <i>({{floor(abs(strtotime( $staff["start_date"]) - strtotime(date('d-m-Y')))/(60*60*24))}} day)</i></a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Giải thưởng</b> <a class="float-right">...</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Trạng thái</b> <a class="float-right">{{ $staff->status }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Về tôi</h3>
                            </div>
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Học vấn</strong>
                                <p class="text-muted">{{ $staff->diploma->name }}</p>
                                <hr>
            
                                <strong><i class="fas fa-map-marker-alt mr-1"></i> Địa chỉ</strong>
                                <p class="text-muted">{{ $staff->address }}</p>
                                <hr>
            
                                <strong><i class="far fa-file-alt mr-1"></i> Vị trí</strong>
                                <p class="text-muted">{{ $staff->position->name }}</p>
                                <hr>
            
                                <strong><i class="far fa-file-alt mr-1"></i> Phòng Ban</strong>
                                <p class="text-muted">{{ $staff->department->name }}</p>
                                <hr>
            
                                <strong><i class="far fa-file-alt mr-1"></i> Sở thích</strong>
                                <p class="text-muted">None.</p>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
  