<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Tìm truyện với từ khóa</title>
</head>

<body>
    <div class="container">
        {{-------- Menu --------}}
        @include('./layouts/menu-home')
        {{-------- Breadcrumb --------}}
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('homeWeb')}}" style="text-decoration: none"><i
                            class="fas fa-home"></i>Truyện</a></li>
                <li class="breadcrumb-item active">Tìm truyện với từ khóa:
                    {{$tukhoa}}
                </li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-md-8">
                <a href="" title="" class="nav-link">TÌM TRUYỆN VỚI TỪ KHÓA: {{$tukhoa}}</a>
                <br>
                @php
                $countTruyen = count($truyen);
                @endphp
                @if($countTruyen==0)
                <p>Không tìm thấy truyện...</p>
                @else
                @foreach ($truyen as $value)
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" alt="" width="50%">
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('xemtruyen',[$value->slug_truyen])}}" class="text-decoration-none link-dark"><i
                                class="fas fa-book"></i>
                            {{$value->tentruyen}}</a>
                        <p><i class="fas fa-pen"></i> {{$value->tacgia}}</p>
                    </div>
                    <div class="col-md-3">
                        <p>Chương 39</p>
                    </div>
                </div>
                <hr>
                @endforeach
                @endif
            </div>
            <div class="col-md-4">
                <div class="noidung" style="font-size: 13px; font-family: Arial, Helvetica, sans-serif;">
                    Danh sách truyện có liên quan tới từ khoá '{{$tukhoa}}'
                </div>
                <div class="row">
                    <h3>Thể loại truyện</h3>
                    @foreach ($theloai as $theloai )
                    <div class="col-sm-5">
                        <a href="{{route('theloai',[$theloai->slug_theloai])}}" title="{{$theloai->tentheloai}}"
                            class="nav-link"><i class="fas fa-tags"></i> {{$theloai->tentheloai}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item disabled">
                        <a class="page-link">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item active" aria-current="page">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
        {{-------- Footer --------}}
        @include('./layouts/footer')
    </div>
</body>

</html>
