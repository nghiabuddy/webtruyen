@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Thêm truyện') }}</div>
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
                    <form method="POST" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="tentruyen" class="form-label">Tên truyện</label>
                            <input type="text" value="{{old('tentruyen')}}" class="form-control" id="slug"
                                name="tentruyen" placeholder="Nhập tên truyện" onkeyup="ChangeToSlug();" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug_truyen" class="form-label">Slug truyện</label>
                            <input type="text" value="{{old('slug_truyen')}}" class="form-control" id="convert_slug"
                                name="slug_truyen" placeholder="Slug truyện" required>
                        </div>
                        <div class="mb-3">
                            <label for="tacgia" class="form-label">Tác giả</label>
                            <input type="text" value="{{old('tacgia')}}" class="form-control" name="tacgia"
                                placeholder="Nhập tên tác giả" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Nhập tóm tắt truyện" id="noidung_chapter"
                                    rows="5" name="tomtat"></textarea>
                                <label for="floatingTextarea">Tóm tắt truyện</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Danh mục truyện</label>
                            <select class="form-select" aria-label="Default select example" name="danhmuc_id">
                                @foreach ($danhmuc as $key =>$muc )
                                <option value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Thể loại truyện</label>
                            <select class="form-select" aria-label="Default select example" name="theloai_id">
                                @foreach ($theloai as $key =>$theloai )
                                <option value="{{$theloai->id}}">{{$theloai->tentheloai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hinhanh" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control" name="hinhanh" style="width:50%" required>
                        </div>
                        <div class="mb-3">
                            <label for="trangthai" class="form-label">Trạng thái</label>
                            <input type="text" value="{{old('trangthai')}}" class="form-control" name="trangthai"
                                placeholder="Nhập trạng thái" required>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Kích hoạt</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="themtruyen">Thêm</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
