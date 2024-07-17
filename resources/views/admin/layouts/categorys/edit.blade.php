@extends('admin.main')

@section('page')
    Chỉnh sửa danh mục
@endsection

@section('content')
    <div>
        <div class="page-wrapper">
            <div class="card">
                <form class="form-horizontal" action="{{ route('category.update', $category) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body" style="width: 1000px;">
                        <h4 class="card-title">Chỉnh sửa danh mục</h4>
                        <div style="font-weight: 400; font-size: 20px; ; color: red;">
                            {{-- content --}}
                        </div><br>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 text-right control-label col-form-label">Tên danh
                                mục</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="name" id="name" autocomplete="off"
                                    placeholder="Tên danh mục" value="{{ $category->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="danh_muc" class="col-sm-3 text-right control-label col-form-label">Danh mục</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="parent_id" id="danh_muc">
                                    <option value="" >Trống</option>
                                    @foreach ($parentCategory as $item)
                                        <option value="{{ $item->id }}" @if($item->id == $category->parent_id )
                                                selected
                                        @endif>{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body" style="margin-bottom: 50px;">
                            <input type="submit" class="btn btn-primary" value="Gửi dữ liệu">
                            <a href="{{ route('category.index') }}" class="btn btn-success">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
