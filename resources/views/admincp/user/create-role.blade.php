@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('layouts.menu')
            <div class="card">
                <div class="card-header">{{ __('Thêm vai trò') }}</div>
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
                    <form method="POST" action="{{route('user.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="tenuser" class="form-label">Tên vai trò</label>
                            <input type="text" value="{{old('name')}}" class="form-control" id="slug" name="name"
                                placeholder="Nhập tên vai trò" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="themuser">Thêm</button>
                        <button type="reset" class="btn btn-primary">Nhập lại</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
