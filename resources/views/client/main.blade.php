<!DOCTYPE html>
<html lang="en">

<head>
    @include('client.layouts.ingredient.head')
</head>

<body>
    <div class="container ">
        {{-- Header --}}
        <div class="row ">
            <div class="col-12 fixed-top">
                @include('client.layouts.ingredient.header')
            </div>
        </div>
        {{-- Content --}}
        <div class="row" style="margin-top: 180px">
            <div class="col-12">
                @yield('content')
            </div>
        </div>
        {{-- Footer --}}
        <div class="row">
            <div class="col-12">
                @include('client.layouts.ingredient.footer')
            </div>
        </div>
        @include('client.layouts.modals.modal')
    </div>
</body>
@include('client.layouts.ingredient.foot')

</html>
