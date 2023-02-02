@extends('client_layout')
@section('title', 'Email')

@section('content')
<div class="content-wrapper" style="min-height: 1302.12px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Gửi email</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Email</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
            {{ Session::get('success') }}
        </div>
    @endif

    @if (Session::has('failed'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Thông báo!</h5>
            {{ Session::get('failed') }}
        </div>
    @endif
    
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mail</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        
                        <div class="card-body p-0">
                            <ul class="nav nav-pills flex-column">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-envelope"></i> Soạn email
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>       
                </div>
                
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Soạn tin nhắn mới</h3>
                        </div>
                        
                        <form method="post" action="{{ route('mail.send') }}" >
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control" name="to" placeholder="Đến:">
                                </div>

                                <div class="form-group">
                                    <input class="form-control"name="subject"  placeholder="Tiêu đề:">
                                </div>

                                <div class="form-group">
                                    <textarea id="compose-textarea" name="message" class="form-control" style="height: 300px; display: none;">
                                        &lt;h2&gt;Tiêu đề&lt;/h2&gt;
                                        &lt;p&gt;Nội dung tin nhắn&lt;/p&gt;
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="card-footer">
                                <div class="float-right">
                                    {{-- <button type="button" class="btn btn-default"><i class="fas fa-pencil-alt"></i> Draft</button> --}}
                                    <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Gửi</button>
                                </div>

                                {{-- <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>     
        </div>
    </section>
</div>
@endsection