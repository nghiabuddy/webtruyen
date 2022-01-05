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
    <title>{{$chapter->tieude}}</title>
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
                <li class="breadcrumb-item"><a
                        href="{{route('xemtruyen',[$truyen_breadcrumb->danhmuctruyen->slug_danhmuc])}}"
                        style="text-decoration: none">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
                <li class="breadcrumb-item active">{{$chapter->truyen->tentruyen}}</a></li>

            </ol>
        </nav>
        <a href="" class="text-decoration-none link-dark" title="Tên truyện">
            <center>
                <h5 class="text-center text-uppercase" title="{{$chapter->truyen->tentruyen}}">
                    {{$chapter->truyen->tentruyen}} </h5>
            </center>
        </a>
        <a href="" class="text-decoration-none link-dark" title="Tên chương">
            <center>
                <h5>{{$chapter->tieude}}</h5>
            </center>
        </a>
        <hr>
        <center>
            {{-- Chương trước --}}
            <a href="{{url('xem-truyen/'.$previous_chapter)}}"
                class="btn btn-success {{$chapter->id==$min_id->id ? 'disabled' : ''}}"><i
                    class="fas fa-angle-left"></i>
                Chương trước</a>

            <select class="btn btn-success" id="select-chapter">
                @foreach ($all_chapter as $key=>$chap)
                <option value="{{route('xemchapter',[$chap->slug_chapter])}}">Chương {{$chap->id}}</option>
                @endforeach
            </select>
            {{-- Chương sau --}}
            <a href="{{url('xem-truyen/'.$next_chapter)}}"
                class="btn btn-success {{$chapter->id==$max_id->id ? 'disabled' : ''}}">Chương sau <i
                    class="fas fa-angle-right"></i></a>

        </center>
        <br>
        {{-- Nội dung--}}
        <div class="noidung" style="font-size: 24px; font-family: Palatino Linotype, Arial, Times New
            Roman, sans-serif;">
            {!!$chapter->noidung!!}
        </div>
        <center>
            {{-- Chương trước --}}
            <a href="{{url('xem-truyen/'.$previous_chapter)}}"
                class="btn btn-success {{$chapter->id==$min_id->id ? 'disabled' : ''}}"><i
                    class="fas fa-angle-left"></i>
                Chương trước</a>

            <select class="btn btn-success" id="select-chapter2">
                @foreach ($all_chapter as $key=>$chap)
                <option value="{{route('xemchapter',[$chap->slug_chapter])}}">Chương {{$chap->id}}</option>
                @endforeach
            </select>
            {{-- Chương sau --}}
            <a href="{{url('xem-truyen/'.$next_chapter)}}"
                class="btn btn-success {{$chapter->id==$max_id->id ? 'disabled' : ''}}">Chương sau <i
                    class="fas fa-angle-right"></i></a>

        </center>
        <br>
        <br>
        <h5>BÌNH LUẬN TRUYỆN</h5>
        <hr>
        @include('layouts.footer')
        <button type="button" class="btn btn-primary btn-floating btn-lg" id="btn-back-to-top" style="position: fixed;
        bottom: 20px;
        right: 20px;
        display: none;">
            <i class="fas fa-arrow-up"></i>
        </button>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" text="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" text="text/javascript">
    </script>
    <script type="text/javascript">
        $('#select-chapter').on('change',function(){
    var url=$(this).val();
    if(url){
        window.location=url;
    }
    return false;
});
 current_chapter();
function current_chapter(){
    var url = window.location.href;
    $('#select-chapter').find('option[value="'+url+'"]').attr("selected",true);
}

$('#select-chapter2').on('change',function(){
    var url=$(this).val();
    if(url){
        window.location=url;
    }
    return false;
});
 current_chapter2();
function current_chapter2(){
    var url = window.location.href;
    $('#select-chapter2').find('option[value="'+url+'"]').attr("selected",true);
}
    </script>
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
</body>

</html>
