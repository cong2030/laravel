@extends('layout')
@section('title', 'Thêm tin tức')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-success text-white d-flex align-items-center">
                    <i class="fas fa-plus-circle me-2"></i>
                    <h3 class="mb-0">Thêm tin tức</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('/tin/them') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="tieu_de" class="form-label fw-bold">
                                <i class="fas fa-heading me-1"></i> Tiêu đề
                            </label>
                            <input type="text" 
                                   class="form-control @error('tieu_de') is-invalid @enderror" 
                                   id="tieu_de" 
                                   name="tieu_de" 
                                   value="{{ old('tieu_de') }}" 
                                   placeholder="Nhập tiêu đề tin tức">
                            @error('tieu_de')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="mo_ta" class="form-label fw-bold">
                                <i class="fas fa-align-left me-1"></i> Mô tả
                            </label>
                            <textarea class="form-control @error('mo_ta') is-invalid @enderror" 
                                      id="mo_ta" 
                                      name="mo_ta" 
                                      rows="4" 
                                      placeholder="Nhập mô tả tin tức">{{ old('mo_ta') }}</textarea>
                            @error('mo_ta')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="hinh_anh" class="form-label fw-bold">
                                <i class="fas fa-image me-1"></i> URL Hình ảnh
                            </label>
                            <input type="text" 
                                   class="form-control @error('hinh_anh') is-invalid @enderror" 
                                   id="hinh_anh" 
                                   name="hinh_anh" 
                                   value="{{ old('hinh_anh') }}" 
                                   placeholder="Nhập URL hình ảnh">
                            @error('hinh_anh')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-bold">
                                <i class="fas fa-list me-1"></i> Loại tin
                            </label>
                            <select class="form-select @error('category_id') is-invalid @enderror" 
                                    id="category_id" 
                                    name="category_id">
                                <option value="">Chọn loại tin</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->ten_loai }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-eye-slash me-1"></i> Trạng thái
                            </label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" 
                                       type="radio" 
                                       name="an_hien" 
                                       id="hien" 
                                       value="0" 
                                       checked>
                                <label class="form-check-label" for="hien">Hiện</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" 
                                       type="radio" 
                                       name="an_hien" 
                                       id="an" 
                                       value="1">
                                <label class="form-check-label" for="an">Ẩn</label>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="fas fa-star me-1"></i> Nổi bật
                            </label>
                            <div class="form-check">
                                <input class="form-check-input" 
                                       type="checkbox" 
                                       name="noi_bat" 
                                       id="noi_bat" 
                                       value="1">
                                <label class="form-check-label" for="noi_bat">Tin nổi bật</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary me-2">
                                <i class="fas fa-arrow-left me-1"></i> Hủy
                            </a>
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save me-1"></i> Thêm tin tức
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
