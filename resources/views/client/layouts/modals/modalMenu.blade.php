<!-- Modal -->
<div class="accordion-collapse collapse "
    style="margin-top: 50px; position: absolute; top: 0%; left: 0%; background-color: rgb(244, 244, 244)" id="modalMenu"
    data-bs-parent="#accordionExample">

    <div class="accordion-body">
        <div class="container m-auto border-bottom">
            <h1 class="modal-title fs-5 mb-2" id="exampleModalLabel">Tất cả chuyên mục</h1>
        </div>
        <div class="mt-3 container m-auto">
            <div class="row h-100">
                <div class="col-10 overflow-y-scroll" style="height: 500px">
                    <div class="d-flex flex-row gap-5 flex-wrap">
                        @foreach ($categorys as $cate)
                            <div class="nav-link text-black dropbtn w-25 ">
                                <a class="text-decoration-none " href="{{ route('views.loadCategory', $cate) }}">
                                    <p class="m-0 p-0 fs-5 text-danger fw-medium ">{{ $cate->name }}</p>
                                </a>
                                @foreach ($cate->children()->limit(4)->get() as $cateItem)
                                    <a class="text-decoration-none text-black d-flex flex-column mt-2"
                                        href="{{ route('views.loadCategory', $cateItem) }}">{{ $cateItem->name }}</a>
                                @endforeach
                                <div class="more-content" style="display: none">
                                    @foreach ($cate->children()->limit(10)->skip(4)->get() as $cateItem)
                                        <a class="text-decoration-none text-black d-flex flex-column mt-2"
                                            href="{{ route('views.loadCategory', $cateItem) }}">{{ $cateItem->name }}</a>
                                    @endforeach
                                </div>
                                @if ($cate->children()->count() > 4)
                                    <div class="load-more mt-2 border-top w-50 fw-medium"><a href="#"
                                            class="text-black text-decoration-none ">Xem thêm</a></div>
                                @endif
                            </div>
                            <div class="clear pt-2"></div>
                        @endforeach
                    </div>
                </div>
                <div class="col-2 border-start ps-3">
                    <ul class="d-flex flex-column p-0 gap-2">
                        <li class="d-inline-flex"><a href="{{ route('views.index') }}"
                                class="text-black text-decoration-none fw-medium">Trang chủ</a>
                        </li>
                        <li class="d-inline-flex"><a href=""
                                class="text-black text-decoration-none fw-medium">Video</a></li>
                        <li class="d-inline-flex"><a href=""
                                class="text-black text-decoration-none fw-medium">Podcasts</a>
                        </li>
                        <li class="d-inline-flex"><a href=""
                                class="text-black text-decoration-none fw-medium">Ảnh</a></li>
                        <li class="d-inline-flex"><a href=""
                                class="text-black text-decoration-none fw-medium pb-2">Infographics</a>
                        </li>
                        <hr class="mt-1 mb-2" style="width: 150px;">
                        <li class="d-inline-flex"><a href=""
                                class="text-black text-decoration-none fw-medium">Mới
                                nhất</a>
                        </li>
                        <li class="d-inline-flex"><a href=""
                                class="text-black text-decoration-none fw-medium">Xem
                                nhiều</a>
                        </li>
                        <li class="d-inline-flex"><a href=""
                                class="text-black text-decoration-none fw-medium">Tin
                                nóng</a>
                        </li>
                        <hr class="mt-1 mb-2" style="width: 150px;">
                    </ul>

                    <div class="col-12 mb-3">
                        <p class="fw-medium mb-1">Liên hệ</p>
                        <div class="d-flex flex-column">
                            <a href="" class="text-black text-decoration-none me-5"><i
                                    class="fa-solid fa-envelope pe-1"></i>Tòa soạn</a>
                            <a href="" class="text-black text-decoration-none"><i
                                    class="fa-solid fa-rectangle-ad pe-1"></i>Quảng cáo</a>
                        </div>
                    </div>

                    <div class="col-12">
                        <p class="fw-medium">Tải ứng dụng</p>
                        <div>
                            <button class="btn border w-100" type="button" data-bs-toggle="modal"
                                data-bs-target="#dowload-Tin-News"><img
                                    src="{{ asset('storage/Img/Logo-removebg-preview.png') }}" alt=""
                                    width="40px" class="me-1">Tin News</button>
                            <button class="btn border mt-2 w-100 p-0 pt-2 pb-2" type="button" data-bs-toggle="modal"
                                data-bs-target="#dowload-International"> <img
                                    src="{{ asset('storage/Img/Logo-removebg-preview.png') }}" alt=""
                                    width="40px" class="me-1">International</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
