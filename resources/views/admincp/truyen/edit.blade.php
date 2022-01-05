@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Cập nhật truyện') }}</div>
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
                    <form method="POST" action="{{route('truyen.update',[$truyen->id])}}" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label for="tentruyen" class="form-label">Tên truyện</label>
                            <input type="text" value="{{$truyen->tentruyen}}" class="form-control" id="slug"
                                name="tentruyen" placeholder="Nhập tên truyện" onkeyup="ChangeToSlug();" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug_truyen" class="form-label">Slug truyện</label>
                            <input type="text" value="{{$truyen->slug_truyen}}" class="form-control" id="convert_slug"
                                name="slug_truyen" placeholder="Slug truyện" required>
                        </div>
                        <div class="mb-3">
                            <label for="tacgia" class="form-label">Tên tác giả</label>
                            <input type="text" value="{{$truyen->tacgia}}" class="form-control" name="tacgia"
                                placeholder="Nhập tên tác giả" required>
                        </div>
                        <div class="mb-3">
                            <label for="floatingTextarea">Tóm tắt truyện</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Nhập tóm tắt truyện" id="noidung_chapter"
                                    rows="5" name="tomtat">{{$truyen->tomtat}}</textarea>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Danh mục truyện</label>
                            <select class="form-select" name="danhmuc_id">
                                @foreach ($danhmuc as $key =>$muc )
                                <option {{ $muc->id==$truyen->danhmuc_id ? 'selected' : '' }}
                                    value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Thể loại truyện</label>
                            <select class="form-select" name="theloai_id">
                                @foreach ($theloai as $key =>$theloai )
                                <option {{ $theloai->id==$truyen->theloai_id ? 'selected' : '' }}
                                    value="{{$theloai->id}}">{{$theloai->tentheloai}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hinhanh" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control" name="hinhanh" style="width:50%" required>
                            <br>
                            <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="" height="100"
                                width="100">
                        </div>
                        <div class="mb-3">
                            <label for="trangthai" class="form-label">Trạng thái</label>
                            <input type="text" value="{{$truyen->trangthai}}" class="form-control" name="trangthai"
                                placeholder="Nhập trạng thái" required>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Kích hoạt</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                                @if ($truyen->kichhoat==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="capnhattruyen">Cập nhật</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
