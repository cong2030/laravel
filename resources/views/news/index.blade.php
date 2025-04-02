@extends('layout')
@section('title', 'Danh sách tin tức')
@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">DANH SÁCH TIN</h1>
        <a href="{{ url('/tin/them') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>Thêm tin mới
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach ($data as $tin)
    <div class="row mb-3 p-3 bg-light rounded shadow-sm">
        <div class="left col-md-8">
            <h4>{{ $tin->tieu_de }}</h4>
            <p>{{ $tin->mo_ta }}</p>
            <p><strong>Loại tin:</strong> {{ $tin->category->ten_loai ?? 'Chưa có loại' }}</p>
        </div>
        <div class="right col-md-4 d-flex justify-content-end align-items-center">
            <a href="{{ url('/tin/chi-tiet/' . $tin->id) }}" class="btn btn-sm btn-info me-2">
                <i class="fas fa-eye"></i> Chi tiết
            </a>
            <a href="{{ url('/tin/sua/' . $tin->id) }}" class="btn btn-sm btn-warning me-2">
                <i class="fas fa-edit"></i> Sửa
            </a>
            <form action="{{ url('/tin/xoa/' . $tin->id) }}" method="POST" class="d-inline"
                  onsubmit="return confirm('Bạn có chắc muốn xóa tin này?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i> Xóa
                </button>
            </form>
        </div>
    </div>
    <hr>
    @endforeach
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection