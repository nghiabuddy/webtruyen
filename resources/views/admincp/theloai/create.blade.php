@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Thêm thể loại') }}</div>
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
                    <form method="POST" action="{{route('theloai.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="tentheloai" class="form-label">Tên thể loại</label>
                            <input type="text" value="{{old('tentheloai')}}" class="form-control" id="slug"
                                name="tentheloai" placeholder="Nhập tên thể loại" onkeyup="ChangeToSlug();" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug_theloai" class="form-label">Slug thể loại</label>
                            <input type="text" value="{{old('slug_theloai')}}" class="form-control" id="convert_slug"
                                name="slug_theloai" placeholder="Slug thể loại" required>
                        </div>
                        <div class="mb-3">
                            <label for="floatingTextarea">Mô tả</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Nhập mô tả" id="noidung_chapter" rows="5"
                                    name="mota"></textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Kích hoạt</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="themtheloai">Thêm</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
