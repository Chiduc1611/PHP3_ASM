@php
    $dateStr = $conten->created_at;
    $dateObj = new DateTime($dateStr);
    $formattedDate = $dateObj->format('d/m/Y - H:m:s');

@endphp
@extends('client.main')

@section('page')
    Bài viết
@endsection

@section('content')
    <div class="row">
        <div class="col-8 ps-4 pe-4 border-end">
            <div class="d-flex justify-content-between">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                    aria-label="breadcrumb">
                    <ol class="breadcrumb d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{ route('views.loadCategory', $category->id) }}"
                                class="text-black text-decoration-none fw-bold fs-6">{{ $category->name }}</a></li>
                        <li class="breadcrumb-item  text-black active" aria-current="page">{{ $conten->category->name }}
                        </li>
                    </ol>
                </nav>
                <div class="text-capitalize">
                    {{ $formattedDate }}
                </div>
            </div>
            <div class="post lh-lg m-0">
                {!! $conten->content !!}
            </div>
            <div class="fw-bold h5 d-flex justify-content-end ">
                {{ $conten->user->name }}
            </div>
            <div class="share mt-3 d-flex flex-row justify-content-between align-items-center border-bottom pb-3">
                <a href="{{ route('views.loadCategory', $conten->category_id) }}" class="btn border"
                    data-bs-toggle="tooltip" data-bs-placement="top"
                    data-bs-title="Trở về {{ $conten->category->name }}"><i class="fa-solid fa-arrow-left"></i>
                </a>
                <div class="item-share ">
                    <a href="" class="btn border rounded-5"><i class="fa-brands fa-facebook"></i></a>
                    <a href="" class="btn border rounded-5"><i class="fa-solid fa-envelope"></i></a>
                    <a href="" class="btn border rounded-5"><i class="fa-solid fa-link"></i></a>
                </div>
            </div>

            <div class="comment mt-3">
                <h4>Ý kiến</h4>
                <div class="border rounded-4">
                    <form action="" method="post" class="input-group p-2 bg-light rounded-4">
                        <input type="text" class="form-control border-0 bg-light fw-bold rounded-3"
                            placeholder="Chia sẻ ý kiến của bạn">
                        <input type="button" class="input-group-text border-0 fw-bold" value="Gửi"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                    </form>
                </div>
            </div>

            <div class="tags mt-4 border-bottom">
                <p class="fw-bold mb-2">Tags: </p>
            </div>

        </div>
        <div class="col-4">
            <p class="h5 d-inline-flex border-2 border-bottom border-danger ">Bài viết liên quan</p>
            <div class="mt-3">
                @foreach ($relatedArticles as $rArticles)
                    <div class="border-bottom pb-3 mt-1">
                        <a href="{{ route('views.loadArticle', $rArticles) }}"
                            class="m-0 p-0 text-black text-decoration-none fw-medium  d-flex flex-row gap-2">
                            <img src="{{ asset($rArticles->img_arti) }}" alt="" width="120px">
                            <div class="m-0 d-flex flex-column">
                                {{ $rArticles->title }}
                                <div class="gap-1 align-items-center">
                                    <i class="fa-regular fa-eye"></i>
                                    {{ $rArticles->views }} view
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
