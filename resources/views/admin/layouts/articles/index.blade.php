@extends('admin.main')

@section('page')
    Danh sách bài viết
@endsection

@section('content')
    <div>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Bảng quản lý bài viết</h5>
                                <div class="btn_dieuhuong btn btn-success mt-1 mb-3">
                                    <a href="{{ route('article.create') }}" style="color: white;">Thêm bài viết</a>
                                </div>
                                <div class="table-responsive">
                                    {{-- <form class="search_phim" action="" method="post">
                                        <input type="text" name="kyw" placeholder="Tra cứu Thể loại">
                                        <input class="btn btn-primary" type="submit" name="listseacher" value="Gửi">
                                    </form> --}}
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 30px">STT</th>
                                                <th style="width: 150px">Tiêu đề</th>
                                                <th style="width: 100px">Ảnh bìa</th>
                                                <th style="width: 300px">Tóm tắt</th>
                                                <th style="width: 100px">Người đăng</th>
                                                <th style="width: 100px">Danh mục</th>
                                                <th style="width: 100px">Tin hot</th>
                                                <th style="width: 100px">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($article as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->title }}</td>
                                                    <td><img src="{{ asset($item->img_arti) }}" alt=""
                                                            width="150px"></td>
                                                    <td>{{ $item->summary }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->category->name }}</td>
                                                    <td>{{ $item->is_featured == 1 ? 'Tin nổi bật' : 'Tin thường' }}</td>
                                                    <td>
                                                        <a href="{{ route('article.show', $item) }}"
                                                            class="btn btn-success w-100">Show</a>
                                                        <a href="{{ route('article.edit', $item) }}"
                                                            class="btn btn-info w-100 mt-1">Edit</a>
                                                        <form action="{{ route('article.destroy', $item) }}" class="mt-1"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger w-100">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="p-1">{{ $article->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
