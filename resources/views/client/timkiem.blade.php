@extends('client.main')

@section('page')
    Tìm kiếm
@endsection

@section('content')
    <div class="row border-bottom pb-3">
        <div class="col-12">
            <h3>Tìm kiếm</h3>
            <form action="{{ route('views.search') }}" method="post">
                @csrf
                <div class="d-flex flex-row border rounded-2 ps-2">
                    <input class="border-0 me-2 w-100 rounded-2 ps-3 input-outline" name="nameArticle" type="search"
                        aria-label="Search" placeholder="Tiêu đề" required value="{{ old('nameArticle', $inputValue) }}"
                        autocomplete="off">
                    <button class="btn text-danger" type="submit"><i class="fa-light fa-magnifying-glass"></i></button>
                </div>
                <div class="mt-3 row">
                    <div class="col-3">
                        <p class="h5">Chuyên mục</p>
                        <select name="category" class="form-select">
                            <option value="">Tất cả</option>
                            @foreach ($categorys as $item)
                                <option value="{{ $item->id }}" @if (old('category', $inputCate) == $item->id) selected @endif>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                        <p class="h5">Thời gian</p>
                        <select name="time" class="form-select">
                            <option value="">Tất cả</option>
                            <option value="day" @if (old('time', $inputTime) == 'day') selected @endif>1 ngày trước</option>
                            <option value="week" @if (old('time', $inputTime) == 'week') selected @endif>1 tuần trước</option>
                            <option value="month" @if (old('time', $inputTime) == 'month') selected @endif>1 tháng trước</option>
                            <option value="year"@if (old('time', $inputTime) == 'year') selected @endif>1 năm trước</option>
                        </select>
                    </div>

                </div>
            </form>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-12">
            @foreach ($article as $item)
                <div class="post bg-light mb-3">
                    <a href="{{ route('views.loadArticle', $item) }}"
                        class="text-black text-decoration-none d-flex flex-row gap-1">
                        <img src="{{ asset($item->img_arti) }}" alt="" width="250px">
                        <div class="p-3">
                            <p class="h5 text-wrap">{{ $item->title }}</p>
                            <p class="mt-3">{{ $item->summary }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
