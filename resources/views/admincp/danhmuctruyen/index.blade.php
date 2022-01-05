@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Liệt kê danh mục truyện') }}</div>
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
                                <th scope="col">Tên danh mục truyện</th>
                                <th scope="col">Slug danh mục truyện</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Kích hoạt</th>
                                <th scope="col">Quản lý</th>
                                <th scope="col">
                                    <a href="{{route('danhmuc.create')}}" class="btn btn-success">Thêm</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (\App\Models\DanhMucTruyen::all() as $key=> $danhmuc)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$danhmuc->tendanhmuc}}</td>
                                <td>{{$danhmuc->slug_danhmuc}}</td>
                                <td>{{$danhmuc->mota}}</td>
                                <td>
                                    @if($danhmuc->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                    @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('danhmuc.edit',[$danhmuc->id])}}" class="btn btn-primary">Sửa</a>
                                    <form method="POST" action="{{route('danhmuc.destroy',[$danhmuc->id])}}">
                                        @csrf
                                        @method('Delete')
                                        <button onclick="return confirm('Bạn có muốn xóa danh mục truyện này không?');"
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
