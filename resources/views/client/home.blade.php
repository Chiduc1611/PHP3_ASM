@extends('client.main')

@section('page')
    Trang chủ
@endsection

@section('content')
    <div class="row d-flex flex-row border-bottom pb-2">
        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <p class="h5 text-uppercase">Tin mới nhất</p>
                </div>
            </div>
            <div class="col-12 pe-4 border-end">
                {{-- Post --}}
                @foreach ($article as $item)
                    <div class="row mb-3 border-bottom pb-3">
                        <div class="col-12">
                            <div class="d-flex flex-column gap-2">
                                <a href="{{ route('views.loadArticle', $item) }}"
                                    class="fw-semibold text-wrap text-black text-decoration-none">
                                    <img src="{{ asset($item->img_arti) }}" alt="post-1.png" class="img-fluid">
                                    <div class="w-100">
                                        {{ $item->title }}
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="col-6">
            <div class="row">
                <div class="col-12">
                    <p class="h5 text-uppercase">Tin nổi bật</p>
                </div>
            </div>
            <div class="col-12 ">
                <div class="row mb-3">
                    <div class="col-12">
                        <div class="d-flex flex-column  gap-2">
                            <img src="{{ asset('storage/Img/img-post/ZQt57XfKySVvPxzdHDGeFRLcgaL9SwtokiRrwICH.jpg') }}" alt="">
                            <div class="w-100 d-flex flex-column ">
                                <a href="" class="fw-semibold h4 text-wrap text-decoration-none text-black">Nga xây
                                    mạng
                                    lưới chặn UAV Ukraine tấn công thọc sâu vào lãnh
                                    thổ </a>
                                <span class="">Nga có kế hoạch xây dựng một mạng lưới khinh khí cầu lấy cảm hứng từ
                                    Thế chiến I và II để ngăn chặn các cuộc tấn công bằng UAV tầm xa của Ukraine</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-3">
            <div class="row">
                <div class="col-12">
                    <p class="h5 ps-4 text-uppercase">Tin xem nhiều</p>
                </div>
            </div>

            <div class="col-12 ps-4 border-start">
                @foreach ($articleViews as $item)
                    <div class="row mb-3 border-bottom pb-3">
                        <div class="col-12">
                            <a href="{{ route('views.loadArticle', $item) }}"
                                class="d-flex flex-row  gap-2 fs-6 text-wrap text-decoration-none text-black">
                                <div class="w-100">
                                    {{ $item->title }}
                                </div>
                                <img src="{{ asset($item->img_arti) }}" alt="post-1.png" width="130px"
                                    height="80px">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="row mt-3">
        <div class="col-4 border-end pe-3">
            @foreach ($articleRandom->shuffle() as $item)
                <div class="border-bottom pb-2 mb-3">
                    <a href="{{ route('views.loadArticle', $item) }}" class="text-decoration-none text-black  ">
                        <p class="fw-bold h5">{{ $item->title }}</p>
                        <div class="d-flex h-25 gap-2">
                            <div><img src="{{ asset($item->img_arti) }}" alt="" class="mt-2" width="160px"></div>
                            <p class="m-0">{{ $item->summary }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <div class="col-8">
            @foreach ($categorys->shuffle() as $cate)
                @if ($loop->remaining > 10)
                    <div class="row">
                        <div class="row ms-3">
                            <div class="col-12 p-1 d-flex flex-row align-items-center gap-3 bg-light">
                                <a href="{{ route('views.loadCategory', $cate) }}"
                                    class="text-decoration-none text-black h4 d-inline-flex border-2 border-bottom border-danger ms-2 ">
                                    {{ $cate->name }}</a>
                                <div class="d-flex flex-row align-items-center gap-3">
                                    @foreach ($cate->children()->limit(5)->get() as $item)
                                        <a class="text-black text-decoration-none"
                                            href="{{ route('views.loadCategory', $item) }}">{{ $item->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row ms-2 mt-3">
                            <div class="col-12 d-flex flex-row flex-wrap w-100">
                                @foreach ($cate->articles()->orderByDesc('created_at')->limit(6)->get() as $item)
                                    @if ($loop->first)
                                        <div class="post border-end w-75 border-bottom pe-2">
                                            <a href="{{ route('views.loadArticle', $item) }}"
                                                class="text-black text-decoration-none d-flex gap-3">
                                                <div class="w-50">
                                                    <img src="{{ asset($item->img_arti) }}" alt=""
                                                        class="img-fluid mt-2 w-100">
                                                </div>
                                                <div class="d-flex flex-column w-50">
                                                    <p class="m-0 fw-bold fs-6">{{ $item->title }}</p>
                                                    <p>{{ $item->summary }} </p>
                                                </div>
                                            </a>
                                        </div>
                                    @elseif ($loop->remaining > 3)
                                        <div class="post ps-3 w-25 border-bottom pe-2">
                                            <a href="{{ route('views.loadArticle', $item) }}"
                                                class="text-black text-decoration-none d-flex">
                                                <div class="d-flex flex-column">
                                                    <p class="m-0 fw-bold fs-6">{{ $item->title }}</p>
                                                    <p> {{ $item->summary }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @else
                                        <div class="post ps-3 w-25 pe-2 mt-3">
                                            <a href="{{ route('views.loadArticle', $item) }}"
                                                class="text-black text-decoration-none d-flex">
                                                <div class="d-flex flex-column">
                                                    <p class="m-0 fw-bold fs-6">{{ $item->title }}</p>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <hr class="ms-3">
                @endif
            @endforeach
        </div>
    </div>
@endsection
