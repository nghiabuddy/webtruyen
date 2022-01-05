@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Thêm danh mục truyện') }}</div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{route('danhmuc.store')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="tendanhmuc" class="form-label">Tên danh mục</label>
                            <input type="text" value="{{old('tendanhmuc')}}" class="form-control" id="slug"
                                name="tendanhmuc" placeholder="Nhập tên danh mục" onkeyup="ChangeToSlug();" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug_danhmuc" class="form-label">Slug danh mục</label>
                            <input type="text" value="{{old('slug_danhmuc')}}" class="form-control" id="convert_slug"
                                name="slug_danhmuc" placeholder="Slug danh mục" required>
                        </div>
                        <div class="mb-3">
                            <label for="mota" class="form-label">Mô tả danh mục</label>
                            <input type="text" value="{{old('mota')}}" class="form-control" id="mota" name="mota"
                                placeholder="Nhập mô tả danh mục" required>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Kích hoạt</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="themdanhmuc">Thêm</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
