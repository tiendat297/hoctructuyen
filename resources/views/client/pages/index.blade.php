<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="utf-8">
    <base href="{{ asset('') }}">
    <title>Bootshop online Shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="assets/client/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="assets/client/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->
	<link href="assets/client/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="assets/client/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->
	<link href="assets/client/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="assets/client/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/client/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/client/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/client/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/client/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
  </head>
<body>
<!-- Navbar =================Phần đầu================================= -->
<!-- Navbar ===============include đầu=================================== -->
@include('client.layouts.botton')
<!-- Header End==========================Hết phần đầu============================================ -->
<!-- Navbar ===============include slide=================================== -->
<div id="carouselBlk">
	<div id="myCarousel" class="carousel slide">
		<div class="carousel-inner">
		  <div class="item active">
		  <div class="container">
			<a><img style="width:100%" src="assets/client/themes/images/carousel/jY5KJsC.jpg" alt="special offers"/></a>

		  </div>
          </div>
@foreach ($banner as $item)


		  <div class="item ">
		  <div class="container">
			<a ><img style="width:100%" src="assets/client/themes/images/carousel/{{ $item -> name }}" alt=""/></a>

		  </div>
          </div>
          @endforeach
		</div>
		<a class="left carousel-control" href="myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="right carousel-control" href="myCarousel" data-slide="next">&rsaquo;</a>
	  </div>
</div>

<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<!-- Navbar ===============include left=================================== -->
    @include('client.layouts.leftcart')

<!-- Sidebar end=============================================== -->
		<div class="span9">
            <div class="well well-small">
                <h4>Mới và hot nhất<small class="pull-right"></small></h4>
                <div class="row-fluid">
                <div id="featured" class="carousel slide">
                <div class="carousel-inner">
                  <div class="item active">
                  <ul class="thumbnails">



                    @foreach ($data as $courses )
    <li class="span3">
      <div class="thumbnail">
        <a  href="{{ $courses-> id}}.html"><img src="assets\admin\images\courses\{{ $courses -> images }}" alt=""/></a>
        <div class="caption">
          <h5>
          {{ $courses -> name }}</h5>
          <p>
            GIẢNG VIÊN: {{ $courses -> hoten }}
          </p>
          <h4 style="text-align:center"> <a @if (Auth::check())  class="btn btn-primary" href="{{ url('addcart',['id'=>$courses ->id]) }}"
            @else class="btn btn-primary" href="#login" role="button" data-toggle="modal"@endif>MUA KHÓA HỌC<i class="icon-shopping-cart"></i></a>
               </h4>
        </div>
      </div>
    </li>
    @endforeach

                  </ul>
                  </div>



                  </div>
                  <a class="left carousel-control" href="#featured" data-slide="prev">‹</a>
                  <a class="right carousel-control" href="#featured" data-slide="next">›</a>
                  </div>
                  </div>
            </div>

<!-- Navbar ===============include mid=================================== -->
    <h2>CÁC KHÓA HỌC HÀNG ĐẦU CỦA BA ĐỜN GUITAR</h3>
    <style type="text/css">
    h2 {
		  text-align: center;
          color:#0097e6;
		}
    </style>
        <h4>Toàn bộ khóa học của Ba Đờn Guitar </h4>

<!-- Sidebar ==========================sản phẩm======================== -->
<!-- Sidebar ============include product====================================== -->
<ul class="thumbnails">
    @foreach ($data2 as $courses )
    <li class="span3">
      <div class="thumbnail">
        <a  href="{{ $courses-> id}}.html"><img src="assets\admin\images\courses\{{ $courses -> images }}" alt=""/></a>
        <div class="caption">
          <h5>
          {{ $courses -> name }}</h5>
          <p>
            GIẢNG VIÊN: {{ $courses -> hoten }}
          </p>
          <h4 style="text-align:center"> <a @if (Auth::check()) onclick="notify()" class="btn btn-primary" href="{{ url('addcart',['id'=>$courses ->id]) }}"
            @else class="btn btn-primary" href="#login" role="button" data-toggle="modal"@endif>MUA KHÓA HỌC<i class="icon-shopping-cart"></i></a>
            <a class="btn" ><strike>{{ number_format($courses->price_root, 0) }} đ </strike> </a>   <a class="btn" href="#">{{ number_format($courses->price_sale, 0) }} đ</a></h4>
        </div>
      </div>
    </li>
    @endforeach
    <div class="pagination modal-1 span9">

        <li>{!! $data2 -> render() !!}</li>


    </div>
		</div>
    </div>


</div>

<!-- Footer ================================================================== -->
	@include('client.layouts.footer')
<!-- Placed at the end of the document so the pages load faster ============================================= -->
	<script src="assets/client/themes/js/jquery.js" type="text/javascript"></script>
	<script src="assets/client/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/client/themes/js/google-code-prettify/prettify.js"></script>
    <script type="text/javascript" src="assets/client/themes/js/custom.js"></script>
    <script src="assets/client/themes/js/bootshop.js"></script>
    <script src="assets/client/themes/js/jquery.lightbox-0.5.js"></script>



	<!-- Themes switcher section ============================================================================================= -->
<span id="themesBtn"></span>
</body>
</html>
