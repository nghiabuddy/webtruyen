@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Liệt kê truyện') }}</div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên truyện</th>
                                <th scope="col">Slug truyện</th>
                                <th scope="col">Tên tác giả</th>
                                <th scope="col">Tóm tắt</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Thể loại</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Kích hoạt</th>
                                <th scope="col">Quản lý</th>
                                <th scope="col">
                                    <a href="{{route('truyen.create')}}" class="btn btn-success">Thêm</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($truyen as $key=> $truyen)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$truyen->tentruyen}}</td>
                                <td>{{$truyen->slug_truyen}}</td>
                                <td>{{$truyen->tacgia}}</td>
                                <td>{{$truyen->tomtat}}</td>
                                <td>
                                    <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="" height="100"
                                        width="100">
                                </td>
                                <td>{{$truyen->danhmuctruyen->tendanhmuc}}</td>
                                <td>{{$truyen->theloai->tentheloai}}</td>

                                <td>{{$truyen->trangthai}}</td>
                                <td>
                                    @if($truyen->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                    @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('truyen.edit',[$truyen->id])}}" class="btn btn-primary">Sửa</a>
                                    <form method="POST" action="{{route('truyen.destroy',[$truyen->id])}}">
                                        @csrf
                                        @method('Delete')
                                        <button onclick="return confirm('Bạn có muốn xóa truyện này không?');"
                                            class="btn btn-danger">Xóa</button>
                                    </form>
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
@endsection
