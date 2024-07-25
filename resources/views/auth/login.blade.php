@extends('client.main')
@section('page')
    Đăng nhập
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div id="login-form" class="form-container active">
                            <div class="d-flex flex-row">
                                <form class="w-50 border-end pe-3" action="{{ route('login') }}" method="post">
                                    @csrf
                                    <p class="text-center">Đăng nhập với email</p>
                                    <div class="form-group">
                                        <label for="login-email">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}"  autocomplete="email" autofocus
                                            placeholder="Hãy nhập email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="login-password">Mật khẩu</label>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                             autocomplete="current-password" placeholder="Mật khẩu">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-danger w-100" type="submit">Đăng nhập</button>
                                    @if (Route::has('password.request'))
                                        <a class="btn d-flex justify-content-center" href="{{ route('password.request') }}">
                                            {{ __('Lấy lại mật khẩu?') }}
                                        </a>
                                    @endif
                                </form>

                                <div class="social-login ps-3 d-flex flex-column w-50 m-0">
                                    <p class="text-center mb-4">Đăng nhập với</p>
                                    <div class="border w-100 p-3 mb-3 mt-3 text-center">
                                        <a href="" id="myvne_facebook_login"
                                            class="social_log face_log text-black text-decoration-none ">
                                            <span>
                                                <img class="float-start"
                                                    src="https://s1.vnecdn.net/myvne/i/v290/ls/icons/facebook_ico.svg"
                                                    alt="">Facebook</span>
                                        </a>
                                    </div>
                                    <div class="border w-100 p-3 mb-3 text-center">
                                        <a href="" id="myvne_facebook_login"
                                            class="social_log face_log text-black text-decoration-none">
                                            <span><img class="float-start"
                                                    src="https://s1.vnecdn.net/myvne/i/v290/ls/icons/google_ico.svg"
                                                    alt="">Google</span>
                                        </a>
                                    </div>
                                    <div class="border w-100 p-3 text-center">
                                        <a href="" id="myvne_facebook_login"
                                            class="social_log face_log text-black text-decoration-none">
                                            <span><img class="float-start"
                                                    src="https://s1.vnecdn.net/myvne/i/v290/ls/icons/app_ico.svg"
                                                    alt="">Apple</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex justify-content-center">
                                <p>Bạn chưa có tài khoản<a href="{{ route('register') }}"> đăng ký ngay !</a></p>
                            </div>
                            <div class="mt-3 w-75 m-auto">
                                <p class="text-center">Bạn đăng nhập là đồng ý với điều khoản sử dụng và chính sách bảo mật
                                    của TinNews & được bảo vệ bởi reCAPTCHA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
