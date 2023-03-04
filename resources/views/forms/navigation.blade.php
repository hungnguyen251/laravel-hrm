<!-- Main navigation -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css?v=3.2.0') }}">

<header>
    <div class="view grey lighten-3">
        <div class="mask">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-6">
                        <h1 class="mb-4">Vui lòng <span class="text-warning">đăng nhập</span>để sử dụng dịch vụ.</h1>
                        <a href="{{ route('auth.login') }}" class="btn btn-block btn-outline-primary btn-lg" style="width: 120px;border-radius: 25px;">Signin</a>
                    </div>

                    <div class="col-md-6">
                        <img src="https://thumbs.dreamstime.com/b/oops-words-reflective-white-background-concept-error-screens-49260938.jpg" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
