@extends('admin.main')

@section('page')
    Bài viết
@endsection

@section('content')
    <div>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chi tiết Bài viết</h5>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Tên</th>
                                                <th>Giá trị</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($article->toArray() as $key => $item)
                                                <tr>
                                                    <td>{{ Str::ucfirst($key) }}</td>
                                                    <td>
                                                        @if ($key == 'img_arti')
                                                            <img src="{{ asset($item) }}"
                                                                alt="" width="150px">
                                                        @elseif ($key == 'category_id')
                                                            {{ $article->category->name }}
                                                        @elseif ($key == 'user_id')
                                                            {{ $article->user->name }}
                                                        @elseif ($key == 'created_at' || $key == 'updated_at')
                                                            @php
                                                                $dateString = $item;
                                                                $date = new DateTime($dateString);
                                                                $formattedDate = $date->format('d-m-Y H:i:s');
                                                            @endphp
                                                            {{ $formattedDate }}
                                                        @else
                                                            {!! $item !!}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn_dieuhuong btn btn-success">
                    <a href="{{ route('article.index') }}" style="color: white;">Quay lại</a>
                </div>
                <div class="btn_dieuhuong btn btn-info">
                    <a href="{{ route('article.edit', $article) }}" style="color: white;">Sửa bài viết</a>
                </div>
            </div>
        </div>
    </div>
@endsection
