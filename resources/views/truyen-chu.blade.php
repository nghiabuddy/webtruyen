<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <link href="css/blog.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/star.css" rel="stylesheet" type="text/css" media="all">
    <title>{{$truyen->tentruyen}}</title>
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
                <li class="breadcrumb-item"><a href="{{route('danhmuc',[$truyen->danhmuctruyen->slug_danhmuc])}}"
                        style="text-decoration: none">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
                <li class="breadcrumb-item active">{{$truyen->tentruyen}}</a></li>

            </ol>
        </nav>
        {{-------- Info truyện --------}}
        <h5>THÔNG TIN TRUYỆN</h5>
        <br>
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-3">
                        <img class="card-img-top" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" alt="">
                        <ul class="list-unstyled">
                            <li><b>Tác giả:</b> <a href="">{{$truyen->tacgia}}</a></li>
                            <li><b>Thể loại:</b> <a
                                    href="{{route('theloai',[$truyen->theloai->slug_theloai])}}">{{$truyen->theloai->tentheloai}}</a>
                            </li>
                            <li><b>Danh mục:</b><a
                                    href="{{route('danhmuc',[$truyen->danhmuctruyen->slug_danhmuc])}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a>
                            </li>
                            <li><b>Trạng thái:</b> {{$truyen->trangthai}}</li>
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <h5 class="text-center text-uppercase" title="{{$truyen->tentruyen}}">{{$truyen->tentruyen}}
                        </h5>
                        <hr>
                        {{-- <p class="text-center">Đánh giá: 7.3/10 từ 11137 lượt</p> --}}
                        <div class="d-grid gap-2 col-3 mx-auto">
                            <a href="#danhsachchuong" class="btn btn-success btn-sm"> <i class="fas fa-list-ul"></i>
                                Danh sách
                                chương</a>
                            <a href="" class="btn btn-danger btn-sm"><i class="far fa-heart"></i> Truyện yêu thích</a>
                            @if($chapter_dau)
                            <a href="{{route('xemchapter',[$chapter_dau->slug_chapter])}}"
                                class="btn btn-success btn-sm"><i class="fas fa-book-open"></i> Đọc truyện</a>
                            @else
                            <a href="" class="btn btn-danger btn-sm disabled"><i class="fas fa-book-open"></i> Đọc
                                truyện</a>
                            @endif

                        </div>
                        <br>
                        <p>{!!$truyen->tomtat!!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    <h4>Thể loại truyện</h4>
                    @foreach ($theloai as $theloai)
                    <div class="col-sm-6">
                        <a href="{{route('theloai',[$theloai->slug_theloai])}}" title="{{$theloai->tentheloai}}"
                            class="nav-link"><i class="fas fa-tags"></i> {{$theloai->tentheloai}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{--------DANH SÁCH CHƯƠNG--------}}

        <div class="row">
            <div class="col-md-9">
                <h6 id="danhsachchuong">DANH SÁCH CHƯƠNG</h6>
                <hr>
                <ul>
                    @php
                    $count=count($chapter);
                    @endphp
                    @if ($count==0)
                    <p>Đang cập nhật chương</p>
                    @else
                    @foreach ($chapter as $chuong)
                    <li>
                        <a href="{{route('xemchapter',[$chuong->slug_chapter])}}" class="text-decoration-none link-dark"
                            title="{{$chuong->tieude}}">{{$chuong->tieude}}</a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
            <div class="col-md-3">
                <h6>TRUYỆN CÙNG DANH MỤC{{-- TÁC GIẢ --}}</h6>
                <ul>
                    @foreach ($cungdanhmuc as $cungdanhmuc )
                    <li>
                        {{$cungdanhmuc->tentruyen}}
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Trang kế</a></li>
            </ul>
        </nav>
        <h5>BÌNH LUẬN TRUYỆN</h5>
        <hr>
    </div>
    {{-------- Footer --------}}
    @include('./layouts/footer')
    <button type="button" class="btn btn-primary btn-floating btn-lg" id="btn-back-to-top" style="position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;">
        <i class="fas fa-arrow-up"></i>
    </button>
    <script>
        //Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
    </script>
    </div>
</body>

</html>
