@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Sửa chapter') }}</div>
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
                    <form method="POST" action="{{route('chapter.update',[$chapter->id])}}">
                        @method('PATCH')
                        @csrf
                        <div class="mb-3">
                            <label for="tieude" class="form-label">Tiêu đề</label>
                            <input type="text" value="{{$chapter->tieude}}" class="form-control" id="slug" name="tieude"
                                placeholder="Nhập tiêu đề" onkeyup="ChangeToSlug();" required>
                        </div>
                        <div class="mb-3">
                            <label for="slug_chapter" class="form-label">Slug chapter</label>
                            <input type="text" value="{{$chapter->slug_chapter}}" class="form-control" id="convert_slug"
                                name="slug_chapter" placeholder="Slug chapter" required>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Thuộc truyện</label>
                            <select class="form-select" aria-label="Default select example" name="truyen_id">
                                @foreach ($truyen as $key =>$truyen )
                                <option {{ $truyen->id==$chapter->truyen_id ? 'selected' : '' }}
                                    value="{{$truyen->id}}">{{$truyen->tentruyen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="floatingTextarea">Nội dung</label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Nhập nội dung" id="noidung_chapter" rows="5"
                                    name="noidung">{{$chapter->noidung}}</textarea>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="active" class="form-label">Kích hoạt</label>
                            <select class="form-select" aria-label="Default select example" name="kichhoat">
                                @if ($chapter->kichhoat==0)
                                <option selected value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                                @else
                                <option value="0">Kích hoạt</option>
                                <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="capnhatchapter">Cập nhật</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
