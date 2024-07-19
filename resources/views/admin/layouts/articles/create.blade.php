@extends('admin.main')

@section('page')
    Thêm mới bài viết
@endsection

@section('content')
    <div>
        <div class="page-wrapper">
            <div class="card">
                <form class="form-horizontal" action="{{ route('article.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body" style="width: 1000px;">
                        <h4 class="card-title">Thêm mới bài viết</h4>
                        <div style="font-weight: 400; font-size: 20px; ; color: red;">
                            {{-- content --}}
                        </div><br>
                        <div class="form-group row">
                            <label for="tieu_de" class="col-sm-3 text-right control-label col-form-label"> Tiêu đề</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="title" id="tieu_de" autocomplete="off"
                                    placeholder="Tiêu đề bài viết">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mo_ta" class="col-sm-3 text-right control-label col-form-label"> Mô tả</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="summary" id="mo_ta" autocomplete="off"
                                    placeholder="Mô tả ngắn">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anh" class="col-sm-3 text-right control-label col-form-label">Ảnh bìa</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="img_arti" id="anh">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="editor1" class="col-sm-3 text-right control-label col-form-label">Nội dung</label>
                            <div class="col-sm-9">
                                <textarea name="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <input type="hidden" class="form-control" name="user_id" value="1">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="danh_muc" class="col-sm-3 text-right control-label col-form-label">Danh mục</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="category_id" id="danh_muc">
                                    <option value="" hidden>Danh mục</option>
                                    @foreach ($category as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_featured" class="col-sm-3 text-right control-label col-form-label">Tin nổi
                                bật</label>
                            <div class="col-sm-9 mt-2 ps-5 form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="is_featured"
                                    name="is_featured" value="1">
                            </div>
                        </div>
                    </div>
                    <div class="border-top">
                        <div class="card-body" style="margin-bottom: 50px;">
                            <input type="submit" class="btn btn-primary" value="Gửi dữ liệu">
                            <a href="{{ route('article.index') }}" class="btn btn-success">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
