<div class="row mt-3 border-top pt-3 border-3">
    <div class="col-8 d-flex flex-row border-end pb-2" >
        <ul class="d-flex flex-column p-0 gap-2 ">
            <li class="d-inline-flex"><a href="{{ route('views.index') }}"
                    class="text-black text-decoration-none fw-medium">Trang chủ</a>
            </li>
            <li class="d-inline-flex"><a href="" class="text-black text-decoration-none fw-medium">Video</a></li>
            <li class="d-inline-flex"><a href="" class="text-black text-decoration-none fw-medium">Podcasts</a>
            </li>
            <li class="d-inline-flex"><a href="" class="text-black text-decoration-none fw-medium">Ảnh</a></li>
            <li class="d-inline-flex"><a href=""
                    class="text-black text-decoration-none fw-medium pb-2">Infographics</a>
            </li>
            <hr class="mt-1 mb-2" style="width: 150px;">
            <li class="d-inline-flex"><a href="" class="text-black text-decoration-none fw-medium">Mới nhất</a>
            </li>
            <li class="d-inline-flex"><a href="" class="text-black text-decoration-none fw-medium">Xem nhiều</a>
            </li>
            <li class="d-inline-flex"><a href="" class="text-black text-decoration-none fw-medium">Tin nóng</a>
            </li>
        </ul>

        <div class="d-flex flex-column ms-4 gap-3 flex-wrap" style="height: 250px;">
            @for ($i = 0; $i < $categorys->count(); $i++)
                <div class="w-50"><a class="nav-link text-black "
                        href="{{ route('views.loadCategory', $categorys[$i]) }}">
                        <p class="m-0 p-0">{{ $categorys[$i]->name }}</p>
                    </a>
                </div>
            @endfor
        </div>

    </div>

    <div class="col-4 ps-4">
        <div class="row">
            <div class="col-12">
                <p class="fw-medium">Tải ứng dụng</p>
                <div>
                    <button class="btn border" type="button" data-bs-toggle="modal"
                        data-bs-target="#dowload-Tin-News"><img src="{{ asset('storage/Img/Logo-removebg-preview.png') }}"
                            alt="" width="40px" class="me-1">Tin News</button>
                    <button class="btn border" type="button" data-bs-toggle="modal"
                        data-bs-target="#dowload-International"> <img src="{{ asset('storage/Img/Logo-removebg-preview.png') }}"
                            alt="" width="40px" class="me-1">International</button>

                    <div class="modal fade" id="dowload-Tin-News" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-center w-100" id="exampleModalLabel">Tải ứng dụng
                                        Tin News</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    <img src="{{ asset('storage/Img/dowTinNew.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="dowload-International" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-center w-100" id="exampleModalLabel">Tải ứng dụng
                                        Tin News
                                        International</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body d-flex justify-content-center">
                                    <img src="{{ asset('storage/Img/dowTinNew.png') }}" alt="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3 border-bottom pb-3">
            <div class="col-12">
                <p class="fw-medium mb-1">Liên hệ</p>
                <div>
                    <a href="" class="text-black text-decoration-none me-5"><i
                            class="fa-solid fa-envelope pe-1"></i>Tòa soạn</a>
                    <a href="" class="text-black text-decoration-none"><i
                            class="fa-solid fa-rectangle-ad pe-1"></i>Quảng cáo</a>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12 ">
                <p class="fw-medium mb-1">Đường dây nóng</p>
                <div class="row">
                    <div class="col-6">
                        <h5>083.888.0123</h5>
                        <span>(Hà nội)</span>
                    </div>
                    <div class="col-6">
                        <h5>082.233.3555</h5>
                        <span>(TP. Hồ Chí Minh)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row d-flex flex-row align-items-center mt-3">
    <hr class="w-100 mb-1">

    <div class="col-4 d-flex flex-row align-items-center gap-1">
        <p class="pt-2">Báo điện tử</p>
        <a href=""><img src="{{ asset('storage/Img/Logo-removebg-preview.png') }}" alt="" width="80px"></a>
    </div>

    <div class="col-8 ">
        <nav class="d-flex flex-row gap-3 align-items-center float-end">
            <a class="nav-link active text-black border-end pe-3" aria-current="page" href="#">Điều khoản sử
                dụng</a>
            <a class="nav-link text-black border-end pe-3" href="#">Chính sách bảo mật</a>
            <a class="nav-link text-black border-end pe-3" href="#">Cookies</a>
            <a class="nav-link text-black border-end pe-3" href="#">RSS</a>
            <p class="m-0">Theo dõi Tin News trên
            <div class="d-flex gap-3">
                <a href="" type="button" class="btn p-0" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>
                <a href="" type="button" class="btn p-0" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Twitter">
                    <i class="fa-brands fa-twitter"></i>
                </a>
                <a href="" type="button" class="btn p-0" data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Youtube">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>
            </p>
        </nav>
    </div>
    <hr class="w-100 mt-1">

</div>

<div class="row ">
    <div class="col-4">
        <p class="fw-bold p-0">Báo tiếng Việt nhiều người xem nhất</p>
        <p>Thuộc Bộ Khoa học và Công nghệ</p>
        <p>Số giấy phép: 548/GP-BTTTT ngày 24/08/2021</p>
    </div>
    <div class="col-4">
        <p>Tổng biên tập: Nguyễn Chí Đức</p>
        <p>Địa chỉ: Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
        <p>Điện thoại: 0876422120</p>
    </div>
    <div class="col-4">
        <p>© 2004 - 2024. Toàn bộ bản quyền thuộc Nguyễn Chí Đức</p>
    </div>
</div>
