@extends('admin.main')

@section('page')
    Danh sách danh mục
@endsection

@section('content')
    <div>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Bảng quản lý danh mục</h5>
                                <div class="btn_dieuhuong btn btn-success mt-1 mb-3">
                                    <a href="{{ route('category.create') }}" style="color: white;">Thêm danh mục</a>
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
                                                <th style="width: 100px">Tên danh mục</th>
                                                <th style="width: 100px">Danh mục cha</th>
                                                <th style="width: 100px">Thời gian tạo</th>
                                                <th style="width: 100px">Thời gian cập nhật</th>
                                                <th style="width: 100px">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($category as $key => $item)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>{{ $item->parent?->name }}</td>
                                                    <td>{{ $item->created_at }}</td>
                                                    <td>{{ $item->updated_at }}</td>
                                                    <td class="d-flex flex-row " style="gap: 10px">
                                                        <a href="{{ route('category.edit', $item) }}"
                                                            class="btn btn-info">Edit</a>
                                                        <form action="{{ route('category.destroy', $item) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="p-1">{{ $category->links() }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
