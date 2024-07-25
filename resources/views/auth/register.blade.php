@extends('client.main')
@section('page')
    Đăng ký
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row">
                            <form action="{{ route('register') }}" class="w-50 border-end pe-3" method="post">
                                @csrf
                                <p class="text-center mb-4">Tạo tài khoản với</p>
                                <div class="form-group">
                                    <label for="name">Tên tài khoản</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}"  autocomplete="name" autofocus
                                        placeholder="Hãy nhập tên tài khoản">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}"  autocomplete="email"
                                        placeholder="Hãy nhập email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Mật khẩu</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                         autocomplete="new-password" placeholder="Tạo mật khẩu">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm">Nhập lại mật khẩu</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation"  autocomplete="new-password"
                                        placeholder="Nhập lại mật khẩu">
                                </div>
                                <button class="btn btn-danger w-100">Tạo tài khoản</button>
                            </form>
                            <div class="social-login ps-3 d-flex flex-column w-50 m-0">
                                <p class="text-center pb-2">Tạo tài khoản với</p>
                                <div class="border w-100 mt-4  p-3 mb-3 text-center">
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
                                <div class="mt-3 w-100 m-auto">
                                    <p class="text-center">Bạn tạo tài khoản là đồng ý với quy định, điều khoản sử dụng và
                                        chính sách bảo mật của VnExpress
                                        & được bảo vệ bởi reCAPTCHA</p>
                                </div>
                                <div class="mt-3 d-flex justify-content-center">
                                    <p>Bạn đã có tài khoản<a href="{{ route('login') }}"> đăng nhập ngay !</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
