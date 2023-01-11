@extends('client_layout')
@section('title', 'Bằng cấp')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Danh sách bằng cấp</h1>
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
                <div class="card-header d-flex" style="height: 65px;">
                    <a href="{{ route('diplomas.create') }}" class="btn btn-block btn-info" style="position: absolute;width: 150px; right: 40px;">Thêm</a>
                </div>

                <div class="card-body">
                    <table class="table table-bordered" style="text-align: center;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên bằng cấp</th>
                                <th>Ngày tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($diplomas as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ date('d/m/Y', strtotime($item->created_at)) }}</td>
                                <td>
                                <div class="btn-group">
                                    <form action="{{ route('diplomas.edit', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        <input class="btn btn-warning" type="submit" value="Sửa" />
                                    </form>

                                    <form action="{{ route('diplomas.destroy', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input onclick="return confirm('Bạn có chắc chắn muốn xóa ?')" class="btn btn-danger" type="submit" value="Xóa" />
                                    </form>
                                </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer clearfix">
                    {{ $diplomas->appends($_GET)->links() }}
                </div>
                <style>
                    .card-footer ul {float: right;}
                </style>

            </div>
        </section>
    </div>
@endsection