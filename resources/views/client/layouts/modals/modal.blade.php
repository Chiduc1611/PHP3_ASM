<style>
    /* Đăng nhập và đăng ký */

    .noidung {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 100%;
    }

    .tab {
        display: flex;
        justify-content: space-around;
        margin-bottom: 20px;
    }

    .tab button {
        background: none;
        border: none;
        padding: 10px;
        cursor: pointer;
        font-size: 16px;
        border-bottom: 2px solid transparent;
    }

    .tab button.active {
        border-bottom: 2px solid #ff0000;
        color: #ff0000;
    }

    .form-container {
        display: none;
    }

    .form-container.active {
        display: block;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
    }

    .social-login button {
        background: none;
        border: 1px solid #ddd;
        padding: 10px;
        cursor: pointer;
        flex: 1;
        margin: 0 5px;
    }

    .social-login button img {
        width: 20px;
        height: 20px;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-start">
                <h1 class="modal-title fs-5 w-100" id="exampleModalLabel">
                    <div class="tab">
                        <button id="login-tab" class="active" onclick="showForm('login')">
                            <p class="h4">Đăng nhập</p>
                        </button>
                        <button id="signup-tab" onclick="showForm('signup')">
                            <p class="h4">Tạo tài khoản</p>
                        </button>
                    </div>
                </h1>
                <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="noidung">
                    <div id="login-form" class="form-container active">
                        <div class="d-flex flex-row">
                            <form class="w-50 border-end pe-3" action="{{ route('users.login') }}" method="post">
                                @csrf
                                <p class="text-center">Đăng nhập với email</p>
                                <div class="form-group">
                                    <label for="login-email">Email</label>
                                    <input type="email" id="login-email" name="email" placeholder="Hãy nhập email">
                                </div>
                                <div class="form-group">
                                    <label for="login-password">Mật khẩu</label>
                                    <input type="password" id="login-password" name="password" placeholder="Mật khẩu">
                                </div>
                                <button class="btn btn-danger w-100" type="submit">Đăng nhập</button>
                                <p class="mt-2 btn d-flex justify-content-center" data-bs-target="#forgot_pasword"
                                    data-bs-toggle="modal">Lấy lại mật khẩu</p>
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
                        <div class="mt-3 w-75 m-auto">
                            <p class="text-center">Bạn đăng nhập là đồng ý với điều khoản sử dụng và chính sách bảo mật
                                của TinNews & được bảo vệ bởi reCAPTCHA</p>
                        </div>
                    </div>
                    <div id="signup-form" class="form-container">
                        <div class="d-flex flex-row">
                            <form action="{{ route('users.register') }}" class="w-50 border-end pe-3" method="post">
                                @csrf
                                <p class="text-center mb-4">Tạo tài khoản với</p>
                                <div class="form-group">
                                    <label for="signup-name">Tên tài khoản</label>
                                    <input type="text" id="signup-name" name="name"
                                        placeholder="Hãy nhập tên tài khoản">
                                </div>
                                <div class="form-group">
                                    <label for="signup-email">Email</label>
                                    <input type="email" id="signup-email" name="email" placeholder="Hãy nhập email">
                                </div>
                                <div class="form-group">
                                    <label for="signup-password">Mật khẩu</label>
                                    <input type="password" id="signup-password" name="password"
                                        placeholder="Tạo mật khẩu">
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
                            </div>
                        </div>
                        <div class="mt-3 w-75 m-auto">
                            <p class="text-center">Bạn tạo tài khoản là đồng ý với quy định, điều khoản sử dụng và
                                chính sách bảo mật của VnExpress
                                & được bảo vệ bởi reCAPTCHA</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="forgot_pasword" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center w-100 ps-4" id="exampleModalToggleLabel2">Lấy lại mật khẩu
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @csrf
                    <div class="form-group">
                        <p class="text-center mb-4">Nhập email của bạn để lấy lại mật khẩu</p>
                        <input type="email" name="email" placeholder="Nhập email">
                    </div>
                    <button class="btn btn-danger w-100 mt-1 ">Lấy lại mật khẩu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Đăng nhập và đăng ký
    function showForm(form) {
        document.getElementById('login-form').classList.remove('active');
        document.getElementById('signup-form').classList.remove('active');
        document.getElementById('login-tab').classList.remove('active');
        document.getElementById('signup-tab').classList.remove('active');

        if (form === 'login') {
            document.getElementById('login-form').classList.add('active');
            document.getElementById('login-tab').classList.add('active');
        } else {
            document.getElementById('signup-form').classList.add('active');
            document.getElementById('signup-tab').classList.add('active');
        }
    }

</script>
