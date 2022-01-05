<div class="container">
    <div class="owl-carousel owl-theme mt-5">
        @foreach ( $truyen as $value )
        <div class="item">
            <a href="{{route('xemtruyen',[$value->slug_truyen])}}"> <img src="public/uploads/truyen/{{$value->hinhanh}}"
                    alt="" style="width:50%" class="rounded mx-auto d-block"></a>
            <center>
                <h6>{{$value->tentruyen}}</h6>
            </center>
            <center>
                <h6>{{$value->trangthai}}</h6>
            </center>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" text="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" text="text/javascript">
</script>
<script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
</script>
