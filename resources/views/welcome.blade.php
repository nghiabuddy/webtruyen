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
    <title>Web truyện</title>
</head>

<body>
    <div class="container">
        {{-------- Menu --------}}
        @include('./layouts/menu-home')

        {{-------- Slider --------}}
        <br>
        <a href="https://truyenfull.vn/danh-sach/truyen-hot/" title="Truyện hot" class="nav-link">TRUYỆN
            ĐỀ CỬ <i class="fas fa-book-open"></i></a>
        @include('./layouts/slider')
        {{--TRUYEN MOI CAP NHAT--}}
        <a href="https://truyenfull.vn/danh-sach/truyen-hot/" title="Truyện hot" class="nav-link">TRUYỆN
            MỚI CẬP NHẬT <i class="fas fa-angle-right"></i></a>
        <div class="row">
            <div class="col-sm-8">
                <a href="#" class="btn btn-outline-primary">Ngôn tình</a>
                <a href="#" class="btn btn-outline-primary">Kiếm
                    hiệp</a>
                <a href="#" class="btn btn-outline-primary">Xuyên không</a>
                <br>
                <table class="table">
                    <thead>
                        <tr>
                            <p></p>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($truyen as $truyen)
                        <tr>
                            <td><a href="{{route('xemtruyen',[$truyen->slug_truyen])}}"
                                    class="text-decoration-none link-dark">{{$truyen->tentruyen}}</a>
                            </td>
                            <td>Chương 310</td>
                            <td>17 giờ trước</td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- <center> <a class="btn btn-outline-primary" rel="nofollow" title="Truyện mới cập nhật"
                        href="https://dtruyen.com/all/">XEM
                        THÊM <i class="fa fa-angle-down"></i></a></center> --}}
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <h3>Thể loại truyện</h3>
                    @foreach ($theloai as $theloai)
                    <div class="col-sm-5">
                        <a href="{{route('theloai',[$theloai->slug_theloai])}}" title="{{$theloai->tentheloai}}"
                            class="nav-link"><i class="fas fa-tags"></i> {{$theloai->tentheloai}}</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{--TRUYENFULL--}}
        <a href="https://truyenfull.vn/danh-sach/truyen-hot/" title="Truyện hot" class="nav-link">TRUYỆN
            FULL <i class="fas fa-angle-right"></i></a>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @foreach (\App\Models\Truyen::all()->where('trangthai','Full') as $truyenfull)
            <div class="card" style="width: 14rem;">
                <a href="{{route('xemtruyen',[$truyenfull->slug_truyen])}}"> <img
                        src="public/uploads/truyen/{{$truyenfull->hinhanh}}" class="rounded mx-auto d-block" alt="..."
                        width="164px" height="245px"></a>
                <div class="card-body">
                    <h6 class="card-title" style="text-align:center;">
                        {{$truyenfull->tentruyen}}
                    </h6>
                    <center> <a href="{{route('xemtruyen',[$truyenfull->slug_truyen])}}" class="btn btn-primary">Full-87
                            Chương</a></center>
                </div>
            </div>
            @endforeach
            <br>
        </div>
        {{--REVIEW TRUYỆN--}}
        <a href="https://truyenfull.vn/danh-sach/truyen-hot/" title="Truyện hot" class="nav-link">TIN TỨC TRUYỆN <i
                class="fa fa-angle-right"></i></a>

        {{--BLOG--}}
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="container bootstrap snippets bootdey">
            <div class="row">
                <hr>
            </div>
            <div class="row">
                <!-- posts -->
                <div class="col-md-8">
                    <div class="panel blog-container">
                        <div class="panel-body">
                            <div class="image-wrapper">
                                <a class="image-wrapper image-zoom cboxElement" href="#">
                                    <img src="https://saigoncom.vn/wp-content/uploads/2020/01/truyen-ngon-tinh-sung-hay-nhat.jpg"
                                        alt="Photo of Blog" width="680px" height="290px">

                                </a>
                            </div>

                            <h4>Top 14 truyện ngôn tình mới được độc giả trông ngóng nhất 2020</h4>
                            <small class="text-muted">Bởi <a href="#"><strong> Khánh Ly</strong></a> | 29-04-2020 | 5
                                bình luận</small>

                            <p class="m-top-sm m-bottom-sm">
                                Nhắc đến truyện ngôn tình thì hẳn các bạn trẻ không còn xa lạ gì, thậm chí còn có thể kể
                                tên luôn các tác giả tiểu thuyết ngôn tình nổi tiếng nhất hiện nay, ...
                            </p>
                            <a href="single_post.html"><i class="fa fa-angle-double-right"></i> Đọc thêm</a>
                        </div>
                    </div>
                    <div class="panel blog-container">
                        <div class="panel-body">
                            <div class="image-wrapper">
                                <a class="image-wrapper image-zoom cboxElement" href="#">
                                    <img src="https://saigoncom.vn/wp-content/uploads/2020/01/truyen-ngon-tinh-sung-hay-nhat.jpg"
                                        alt="Photo of Blog" width="680px" height="290px">

                                </a>
                            </div>

                            <h4>Top 14 truyện ngôn tình mới được độc giả trông ngóng nhất 2020</h4>
                            <small class="text-muted">Bởi <a href="#"><strong> Khánh Ly</strong></a> | 29-04-2020 | 5
                                bình luận</small>

                            <p class="m-top-sm m-bottom-sm">
                                Nhắc đến truyện ngôn tình thì hẳn các bạn trẻ không còn xa lạ gì, thậm chí còn có thể kể
                                tên luôn các tác giả tiểu thuyết ngôn tình nổi tiếng nhất hiện nay, ...
                            </p>
                            <a href="single_post.html"><i class="fa fa-angle-double-right"></i> Đọc thêm</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <h4 class="headline text-muted">
                        TIN TỨC GẦN ĐÂY
                        <span class="line"></span>
                    </h4>
                    <div class="media popular-post">
                        <a class="pull-left" href="#">
                            <img src="https://toplist.vn/images/200px/truyen-ngon-tinh-moi-duoc-doc-gia-trong-ngong-nhat-2017-181141.jpg"
                                alt="Popular Post" width="60px" height="60px">
                        </a>
                        <div class="media-body">
                            Top 14 Truyện ngôn tình mới được độc giả trông ngóng nhất 2020
                        </div>
                    </div>
                    <div class="media popular-post">
                        <a class="pull-left" href="#">
                            <img src="https://toplist.vn/images/200px/truyen-ngon-tinh-moi-duoc-doc-gia-trong-ngong-nhat-2017-181141.jpg"
                                alt="Popular Post" width="60px" height="60px">
                        </a>
                        <div class="media-body">
                            Top 14 Truyện ngôn tình mới được độc giả trông ngóng nhất 2020
                        </div>
                    </div>
                    <div class="media popular-post">
                        <a class="pull-left" href="#">
                            <img src="https://toplist.vn/images/200px/truyen-ngon-tinh-moi-duoc-doc-gia-trong-ngong-nhat-2017-181141.jpg"
                                alt="Popular Post" width="60px" height="60px">
                        </a>
                        <div class="media-body">
                            Top 14 Truyện ngôn tình mới được độc giả trông ngóng nhất 2020
                        </div>
                    </div>
                    <div class="media popular-post">
                        <a class="pull-left" href="#">
                            <img src="https://toplist.vn/images/200px/truyen-ngon-tinh-moi-duoc-doc-gia-trong-ngong-nhat-2017-181141.jpg"
                                alt="Popular Post" width="60px" height="60px">
                        </a>
                        <div class="media-body">
                            Top 14 Truyện ngôn tình mới được độc giả trông ngóng nhất 2020
                        </div>
                    </div>
                </div>
            </div>
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
