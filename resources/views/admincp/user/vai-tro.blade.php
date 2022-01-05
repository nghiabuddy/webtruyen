@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Liệt kêvai trò') }}</div>
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
                                <th scope="col">Tên người dùng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Vai trò hiện tại</th>
                                <th scope="col">Quyền dựa vào vai trò</th>
                                <th scope="col">Quản lý</th>
                                <th scope="col">
                                    <a href="#" class="btn btn-success">Thêm</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($user as $key=> $users)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$users->users->name}}</td>
                                <td>{{$users->users->email}}</td>
                                <td>{{$users->roles->name}}</td>
                                <td>{{$users->permissions->name}}</td>
                                <td>
                                    <a href="{{route('user.edit',[$users->id])}}" class="btn btn-primary">Sửa</a>
                                    <form method="POST" action="{{route('user.destroy',[$users->id])}}">
                                        @csrf
                                        @method('Delete')
                                        <button onclick="return confirm('Bạn có muốn xóa truyện này không?');"
                                            class="btn btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
