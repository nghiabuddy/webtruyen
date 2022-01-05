@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Liệt kê thể loại') }}</div>
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
                                <th scope="col">Tên thể loại</th>
                                <th scope="col">Slug thể loại</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Kích hoạt</th>
                                <th scope="col">Quản lý</th>
                                <th scope="col">
                                    <a href="{{route('theloai.create')}}" class="btn btn-success">Thêm</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($theloai as $key=> $theloai)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$theloai->tentheloai}}</td>
                                <td>{{$theloai->slug_theloai}}</td>
                                <td>{!!$theloai->mota!!}</td>
                                <td>
                                    @if($theloai->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                    @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('theloai.edit',[$theloai->id])}}" class="btn btn-primary">Sửa</a>
                                    <form method="POST" action="{{route('theloai.destroy',[$theloai->id])}}">
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
