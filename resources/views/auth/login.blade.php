<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Login')</title>
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('blocks.header')

        <section class="vh-100" style="background-color: #bedb9f;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
                        <div class="card" style="border-radius: 1rem;">
                            <div class="row g-0">
                                <div class="col-md-6 col-lg-5 d-none d-md-block">
                                    <img src="{{ asset('images/slogan/slogan-min.png') }}"
                                      alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
                                </div>
                                <div class="col-md-6 col-lg-7 d-flex align-items-center">
                                    <div class="card-body p-4 p-lg-5 text-black">
                      
                                        <form class="form-horizontal"  method="POST" action="{{ route('auth.authenticateUser') }}">
                                            @csrf
                                            <div class="d-flex align-items-center mb-3 pb-1">
                                                <img class="" src="https://g-v.asia/wp-content/uploads/2020/02/LOGO.png" style="width:50px;height:50px">
                                                <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;font-size: 30px;margin-top: 20px;">Đăng nhập tài khoản</h5>
                                            </div>
                                  
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example17">Địa chỉ email</label>
                                                <input type="email" id="form2Example17" name="email" class="form-control form-control-lg" required="" />
                                            </div>
                          
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="form2Example27">Mật khẩu</label>
                                                <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" required="" />
                                            </div>

                                            @if (!empty($errors->has('failed')))
                                                <div class="form-outline mb-4">
                                                    <span class="text-danger" name="authFailed">{{ $errors->first('failed') }}</span>
                                                </div>
                                            @endif

                                            <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="pt-1 mb-4">
                                                    <button class="btn btn-dark btn-lg btn-block" type="submit" style="width:100%;">Đăng nhập</button>
                                                </div>
                                            </div>
                        
                                            {{-- <a class="small text-muted" href="#!">Forgot password?</a>
                                            <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!"
                                                style="color: #393f81;">Register here</a></p> --}}
                                            <a href="#!" class="small text-muted">Terms of use.</a>
                                            <a href="#!" class="small text-muted">Privacy policy</a>
                                        </form>
                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>