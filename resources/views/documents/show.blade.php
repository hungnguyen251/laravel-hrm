@extends('client_layout')
@section('title', 'Quản lý hợp đồng')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách hợp đồng</h1>
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

        <section class="content-header">
            <div class="card">
                <div class="row">
                    <div class="col-md-6 offset-md-2">
                        <form action="{{ route('filter.search') }}" id="search">
                            <div class="input-group mt-3">
                                <div class="col-md-2">
                                    <select name="option" class="custom-select custom-select-lg" id="validationDefault04" style="font-size:18px;" required>
                                        <option selected disabled value="">Chọn</option>
                                        <option value="type">Loại hợp đồng</option>
                                    </select>
                                </div>

                                <input name="keyword" type="search" class="form-control form-control-lg" placeholder="Tìm kiếm">
                                <input name="route_name" type="hidden" value="documents.index">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default"><i class="fa fa-search"></i></button>
                                    <input type="button" value="Đặt Lại" class="btn btn-lg btn-default mx-2" style="font-size:18px;" onClick="window.location.href='index'"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-header">
                    <button type="submit" class="btn btn-info float-right"><a href="{{ route('documents.create') }}" style="width: 100px;color:white"><i class="fas fa-plus"></i></a></button>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'title', 'route' => 'documents.index' ]) }}">
                                    Tên hợp đồng
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'title' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'title' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th>File đính kèm</th>
                                <th>Ghi chú</th>
                                <th><a class="text-dark" href="{{ route('filter.sort', ['orderBy' => Request::input('orderBy') !== null ? Request::input('orderBy') : '', 'sortBy' => 'author_id', 'route' => 'documents.index' ]) }}">
                                    Người tạo
                                    @if(Request::input('sortBy') !== null && Request::input('sortBy') == 'author_id' && Request::input('orderBy') !== null && Request::input('orderBy') == '-') 
                                        <i class="fas fa-sort-amount-down-alt"></i> 
                                    @elseif(Request::input('sortBy') !== null && Request::input('sortBy') == 'author_id' && Request::input('orderBy') == null)
                                        <i class="fas fa-sort-amount-up-alt"></i> 
                                    @else
                                        <i class="fas fa-sort"></i>
                                    @endif
                                </a></th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($documents as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td><a href="{{ route('documents.download', ['file' => $item->file_name]) }}">{{ $item->file_name }}</a></td>
                                <td>{{ $item->note }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-wrench"></i></button>
                                        <div class="dropdown-menu">
                                            <form action="{{ route('documents.edit', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                <button class="dropdown-item" type="submit">Sửa</button>
                                            </form>
                                            <form action="{{ route('documents.destroy', ['id' => $item->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="dropdown-item">Xóa</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $documents->appends($_GET)->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>
@endsection