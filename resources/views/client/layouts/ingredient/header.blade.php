@php
    use Carbon\Carbon;
    $now = Carbon::now();
    $day = $now->day;
    $month = $now->month;
    $year = $now->year;
    $currentDay = $now->locale('vi')->dayName;
@endphp
<div class="container m-auto row bg-light">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="d-flex flex-row align-items-center gap-1">
                <a href="{{ route('views.index') }}" class="navbar-brand "><img
                        src="{{ asset('storage/Img/Logo-removebg-preview.png') }}" alt="" width="150px"></a>
                <div class="border-start ps-4 text-capitalize">{{ $currentDay }},
                    {{ $day }}/{{ $month }}/{{ $year }}</div>
            </div>
            <div class="d-flex flex-row align-items-center gap-3">

                <form class="d-flex rounded-5" style="background-color: white" role="search" method="POST"
                    action="{{ route('views.search') }}">
                    @csrf
                    <div class="d-flex flex-row border rounded-5 ps-2">
                        <input class="border-0 me-2 w-100 rounded-5 ps-3 input-outline" name="nameArticle"
                            type="search" placeholder="Tìm kiếm" aria-label="Search" autocomplete="off" required>
                        <button class="btn text-danger" type="submit"><i
                                class="fa-light fa-magnifying-glass"></i></button>
                    </div>
                </form>

                <div class="Login">
                    <button type="button" class="btn icon-link icon-link-hover text-decoration-none text-black"
                        style="--bs-icon-link-transform: translate3d(0, -.125rem, 0);" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        <i class="fa-light fa-user fs-6 bi" aria-hidden="true"></i>
                        Đăng nhập
                    </button>
                </div>

                <button class="btn m-0 p-0"><i class="fa-light fa-bell "></i></button>
            </div>
        </div>
    </nav>
    <hr class="w-100 mb-2">
    <nav class="d-flex flex-row mb-2 gap-3 align-items-center" style="position: relative">
        <a class="nav-link active text-black" aria-current="page" href="{{ route('views.index') }}">
            <i class="fa-solid fa-house"></i></a>
        @for ($i = 0; $i < $categorys->count(); $i++)
            @if ($i < 15)
                <div class="dropdown">
                    <a class="nav-link text-black dropbtn" href="{{ route('views.loadCategory', $categorys[$i]) }}">
                        <p class="m-0 p-0">{{ $categorys[$i]->name }}</p>
                    </a>
                    <div class="dropdown-content " style="width: 200px">
                        @foreach ($categorys[$i]->children as $cateItem)
                            <a href="{{ route('views.loadOneCategory', $cateItem) }}">{{ $cateItem->name }}</a>
                        @endforeach
                    </div>
                </div>
            @endif
        @endfor

        <div class="ms-auto m-0 p-0">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item border-0 bg-light">
                    <h2 class="accordion-header">
                        <button class="btn " type="button" data-bs-toggle="collapse" data-bs-target="#modalMenu"
                            aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            <i class="fa-regular fa-bars"></i>
                        </button>
                    </h2>
                    @include('client.layouts.modals.modalMenu')
                </div>
            </div>
        </div>
    </nav>
    <hr class="w-100">
</div>
