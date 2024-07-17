<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.ingredient.head')
</head>

<body>
    <div id="main-wrapper">
        @include('admin.layouts.ingredient.header')
        @include('admin.layouts.ingredient.aside')
        @yield('content')
    </div>
    @include('admin.layouts.ingredient.food')
</body>

</html>
