<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{url('/')}}">WEB TRUYỆN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('homeWeb')}}">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Danh mục
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (\App\Models\DanhMucTruyen::all() as $danhmuc )
                        <li>
                            {{-- <a class="dropdown-item"
                                href="{{url('/danh-muc/'.$danhmuc->slug_danhmuc)}}">{{$danhmuc->tendanhmuc}}</a> --}}
                            <a class="dropdown-item"
                                href="{{route('danhmuc',['slug'=>$danhmuc->slug_danhmuc])}}">{{$danhmuc->tendanhmuc}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Thể loại
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (\App\Models\TheLoai::all() as $theloai )
                        <li><a class="dropdown-item"
                                href="{{route('theloai',['slug'=>$theloai->slug_theloai])}}">{{$theloai->tentheloai}}</a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Phân loại theo Chương
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Thành viên</a>
                </li>
            </ul>
            <form class="form-inline" method="POST" action="{{route('timkiem')}}" style="width:200px">
                @csrf
                <input class="form-control mr-sm-2" autocomplete="off" type="search"
                    placeholder="Tìm truyện, tác giả,..." aria-label="Tìm" name="tukhoa" id="keywords">
                <button class="btn btn-outline-success form-control" type="submit">Tìm</button>
                <div id="search-ajax">
                </div>
            </form>
        </div>
    </div>
</nav>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js" text="text/javascript"></script>
<script type="text/javascript">
    $('#keywords').keyup(function(){
    var query = $(this).val();
    if(query !=''){
        var _token=$('input[name="_token"]').val();
        $.ajax({
            url:"{{route('timkiemajax')}}",
            method:"POST",
            data:{query:query, _token:_token},
            success:function(data){
                $('#search-ajax').fadeIn();
                $('#search-ajax').html(data);
            }
        });

    }else{
        $('#search-ajax').fadeOut();
    }
});
$(document).on('click','.li_search_ajax',function(){
    $('#keywords').val($(this).text());
    $('#search-ajax').fadeOut();
});
</script>
