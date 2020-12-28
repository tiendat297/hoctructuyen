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
    <link href="assets/client/themes/css/costum.css" rel="stylesheet" media="screen"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!-- Bootstrap style responsive -->

    <link href="assets/client/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="assets/client/themes/css/base.css" rel="stylesheet"/>
	<link href="assets/client/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->
    <link href="assets/client/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <link href="assets/client/themes/js/bootshop.js" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="assets/client/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/client/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/client/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/client/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="assets/client/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <style type="text/css" id="enject"></style>
    <script type="text/javascript" src="assets\admin\js\pages\ckd\ckeditor.js"></script>
  </head>
<body>

<div id="header">
    <div class="container">
    <div id="welcomeLine" class="row">
        <div class="span6">Welcome!<strong>@if(Auth::check()) {{ Auth::user() -> name }}  @endif</strong></div>

        <div class="span6">


        <div class="pull-right">
            <a href="{{ 'cart' }}"><span class="btn btn-mini btn-primary"><i class="icon-shopping-cart icon-white"></i> [ {{ Cart::count() }} ] Khóa học trong giỏ hàng </span> </a>
        </div>
        </div>
    </div>
    @if (session('thongbao'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Well done!</strong> {{ session('thongbao') }}
      </div>
                @endif



    <!-- Navbar ================================================== -->
    <div id="logoArea" class="navbar">
    <a id="smallScreen" data-target="#topMenu" data-toggle="collapse" class="btn btn-navbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
      <div class="navbar-inner">
        <a class="brand" href="{{ 'home' }}"><img src="assets/client/themes/images/Đen_và_Nâu_Hình_vuông_Cộng_đồng_và_Tổ_chức_phi_lợi_nhuận_Biểu_trưng-removebg-preview.PNG" alt="GuitarVN"/></a>
        <form class="form-inline navbar-search" method="post" action="products.html" >
            <input id="srchFld" class="srchTxt" type="text" />

              <button type="submit" id="submitButton" class="btn btn-primary">Go</button>
        </form>
        <ul id="topMenu" class="nav pull-right">
         <li class=""><a href="special_offer.html">Hướng dẫn</a></li>
         <li class=""><a @if (Auth::check()) href="#kichhoat" data-toggle="modal" @else href="#login" role="button" data-toggle="modal"@endif style="padding-right:0">Kích hoạt khóa học</a></li>
         <li class=""><a href="contact.html">Liên lạc</a></li>
         <li class="">
            @if (Auth::check())
         <a href="{{ 'logout' }}" role="button"  style="padding-right:0"><span class="btn btn-large btn-success">Đăng xuất</span></a>
         @else
         <a href="#login" role="button" data-toggle="modal" style="padding-right:0"><span class="btn btn-large btn-success">Đăng nhập</span></a>
         @endif
        <div id="login" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >

              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3>ĐĂNG NHẬP TÀI KHOẢN</h3>
              </div>
              <div class="modal-body">
                <form class="form-horizontal loginFrm" action="{{ url('login') }}" method="post">
                    @csrf
                  <div class="control-group">
                    <input type="text" id="inputEmail" placeholder="Email" name="username">
                  </div>
                  <div class="control-group">
                    <input type="password" id="inputPassword" placeholder="password" name="password">
                  </div>

                  <div class="control-group">
                <button type="submit" class="btn btn-large btn-success" name="submit">Đăng nhập</button>


                <a href="{{ 'dangki' }}" role="button"  style="padding-right:0"><span class="btn btn-large btn-success">Đăng kí</span></a>

                  </div>
            </form>
              </div>
        </div>


        <div id="kichhoat" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h3>Kích hoạt khóa học</h3>
            </div>
            <div class="modal-body">
              <form class="form-horizontal loginFrm" action="{{ url('kichhoat') }}" method="POST">
                  @csrf
                <div class="control-group">
                  <input type="text" id="inputEmail" placeholder="Nhập mã kích hoạt tại đây" parsley-trigger="change" required="" name="cod">
                </div>


                <div class="control-group">
              <button type="submit" class="btn btn-success">Kích hoạt</button>
              <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                </div>
            </form>

            </div>
      </div>
        </li>
        </ul>
      </div>
    </div>
    </div>
    </div>

</body>
</html>
