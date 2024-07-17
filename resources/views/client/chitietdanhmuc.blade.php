@extends('client.main')

@section('page')
    {{ $categoryData->name }}
@endsection

@section('content')
    <div class="row ms-4 me-4 border-bottom">
        <div class="col-12 d-flex flex-row align-items-center gap-3 ">
            <h4 class="d-inline-flex" style='color:#DB4A2B;'>
                {{ $categoryData->name }}</h4>
            <div class="d-flex flex-wrap align-items-center gap-3">
                @if ($categoryData->children)
                    @foreach ($categoryData->children as $cate)
                        <a class="text-black text-decoration-none"
                            href="{{ route('views.loadOneCategory', $cate) }}">{{ $cate->name }}</a>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="row ms-4 me-4 mt-3">
        <div class="col-9 border-end border-bottom pe-3 pb-0">
            @foreach ($articles as $arti)
                @if ($loop->first)
                    <div class="post bg-light mb-4">
                        <a href="{{ route('views.loadArticle', $arti) }}"
                            class="text-black text-decoration-none d-flex flex-row gap-1">
                            <img src="{{ asset($arti->img_arti) }}" alt="" width="500px">
                            <div class="p-3">
                                <p class="h3 text-wrap">{{ $arti->title }}</p>
                                <p class="mt-3">{{ $arti->summary }} </p>
                            </div>
                        </a>
                    </div>
                @else
                    <hr class="mb-4">
                    <div class="post bg-light">
                        <a href="{{ route('views.loadArticle', $arti) }}"
                            class="text-black text-decoration-none d-flex flex-row gap-1">
                            <img src="{{ asset($arti->img_arti) }}" alt="" width="250px">
                            <div class="p-3">
                                <p class="h5 text-wrap">{{ $Arti->title }}</p>
                                <p class="mt-3">{{ $arti->summary }} </p>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        </div>

        <div class="col-3">
            @if ($articleAll != [])
                @foreach ($articleAll as $artiOne)
                    @foreach ($artiOne->children as $item)
                        <div>
                            <p class="h5 d-inline-flex border-2 border-bottom border-danger mt-3">{{ $item->name }}</p>
                            @foreach ($artiOne->articleCategory()->where('category_id',$item->id)->latest()->limit(4)->get() as $arti)
                                <div class="border-bottom pb-3 mt-1">
                                    <a href="{{ route('views.loadArticle', $item) }}"
                                        class="text-black text-decoration-none fw-medium d-flex flex-row">
                                        {{ $arti->title }}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                @endforeach
            @else
                <p class="h5 d-inline-flex border-2 border-bottom border-danger mt-3">Xem nhiều</p>
                @foreach ($articleViews as $articleView)
                    <div class="border-bottom pb-3 mt-1">
                        <a href="{{ route('views.loadArticle', $articleView) }}"
                            class="text-black text-decoration-none fw-medium d-flex flex-row">
                            {{ $articleView->title }}
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

@endsection
