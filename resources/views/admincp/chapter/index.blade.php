@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Liệt kê chapter') }}</div>
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
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Slug chapter</th>
                                <th scope="col">Thuộc truyện</th>
                                <th scope="col">Kích hoạt</th>
                                <th scope="col">Quản lý</th>
                                <th scope="col">
                                    <a href="{{route('chapter.create')}}" class="btn btn-success">Thêm</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($chapter as $key=> $chapter)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$chapter->tieude}}</td>
                                <td>{{$chapter->slug_chapter}}</td>
                                <td>{{$chapter->truyen->tentruyen}}</td>
                                <td>
                                    @if($chapter->kichhoat==0)
                                    <span class="text text-success">Kích hoạt</span>
                                    @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('chapter.edit',[$chapter->id])}}" class="btn btn-primary">Sửa</a>
                                    <form method="POST" action="{{route('chapter.destroy',[$chapter->id])}}">
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
