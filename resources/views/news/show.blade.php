@extends('layout')
@section('title', 'Chi tiết tin tức')
@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h2 class="mb-0">Chi tiết tin tức</h2>
        </div>
        <div class="card-body">
            <h4>{{ $news->tieu_de }}</h4>
            <p><strong>Mô tả:</strong> {{ $news->mo_ta }}</p>
            <p><strong>Loại tin:</strong> {{ $news->category->ten_loai ?? 'Chưa có loại' }}</p>
            <p><strong>Hình ảnh:</strong> 
                @if ($news->hinh_anh)
                    <img src="{{ $news->hinh_anh }}" alt="Hình ảnh tin tức" style="max-width: 200px;">
                @else
                    Không có hình ảnh
                @endif
            </p>
            <p><strong>Lượt xem:</strong> {{ $news->luot_xem }}</p>
            <p><strong>Trạng thái:</strong> 
                <span class="badge {{ $news->an_hien ? 'bg-danger' : 'bg-success' }}">
                    {{ $news->an_hien ? 'Ẩn' : 'Hiện' }}
                </span>
            </p>
            <p><strong>Nổi bật:</strong> 
                <span class="badge {{ $news->noi_bat ? 'bg-warning' : 'bg-secondary' }}">
                    {{ $news->noi_bat ? 'Có' : 'Không' }}
                </span>
            </p>
            <p><strong>Ngày tạo:</strong> {{ $news->created_at }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $news->updated_at }}</p>
            <div class="d-flex justify-content-end">
                <a href="{{ url('/') }}" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</div>
@endsection