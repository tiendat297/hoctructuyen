
<!-- Navbar =================Phần đầu================================= -->
<!-- Navbar ===============include đầu=================================== -->
@include('client.layouts.botton')
<!-- Header End==========================Hết phần đầu============================================ -->
<!-- Navbar ===============include slide=================================== -->

<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->
<!-- Navbar ===============include left=================================== -->
    @include('client.layouts.leftcart')

<!-- Sidebar end=============================================== -->
		<div class="span6">
            @if (session('profile'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Well done!</strong> {{ session('profile') }}
              </div>
                        @endif
            <div class="well">
                <!--
                <div class="alert alert-info fade in">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                 </div>
                <div class="alert fade in">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Lorem Ipsum is simply dummy</strong> text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                 </div>
                 <div class="alert alert-block alert-error fade in">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Lorem Ipsum is simply</strong> dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                 </div> -->
                <form class="form-horizontal" action="{{ url('update_profile') }}" method="post">
                    @csrf
                    <h4>THÔNG TIN CÁ NHÂN</h4>
                    <div class="control-group">


                    </div>
                    @foreach ($data as $profile )


                    <div class="control-group">
                        <label class="control-label" for="inputFname1">Họ và tên<sup>*</sup></label>
                        <div class="controls">
                          <input type="text" id="inputFname1" placeholder="  Name" required="" value="{{ $profile -> name }}" name="name">
                        </div>
                     </div>

                    <div class="control-group">
                    <label class="control-label" for="input_email">Email <sup>*</sup></label>
                    <div class="controls">
                      <input type="text" required="" id="input_email" placeholder="Email" value="{{ $profile -> email }}" name="email">
                    </div>
                  </div>



                  @if (count($errors)>0)
                  @foreach($errors->all() as $error)



                <div class="alert alert-block alert-error fade in">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Cảnh báo:  {{ $error }}</strong>
                 </div>
                 @endforeach

                 @endif
                    <h4>ĐỊA CHỈ CỦA BẠN</h4>


                    <div class="control-group">
                        <label class="control-label" for="company">Địa chỉ</label>
                        <div class="controls">
                          <input type="text" required="" id="company" value="{{ $profile -> address }}" placeholder="Địa chỉ" name="address">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="company">Số điện thoại</label>
                        <div class="controls">
                          <input type="text" id="company" required="" value="{{ $profile -> phone }}" placeholder="Số điện thoại" name="phone">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="email_create" value="1">
                            <input type="hidden" name="is_new_customer" value="1">
                            <input class="btn btn-large btn-success" type="submit" value="Cập nhật" />
                            <input class="btn btn-large btn-success" href="#pass" role="button" data-toggle="modal" style="padding-right:0" value="Thay đổi mật khẩu" />
                        </div>
                    </div>

            </div>
        </div>


        <div class="span3">
            <div class="well">
                <img style="width:250px; height:250px;" src="assets\admin\images\users\avatar-1.jpg" alt=""/>
            </div>
            <div class="control-group">
                <label class="control-label" for="company">Thay ảnh đại diện</label>
                <div class="controls">
                  <input type="file" id="company"  name="images">
                </div>
            </div>
        </div>
        @endforeach
    </form>
    </div>


</div>
<div id="pass" class="modal hide fade in" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="false" >

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      <h3>THAY ĐỔI MẬT KHẨU</h3>
    </div>
    <div class="modal-body">
      <form class="form-horizontal loginFrm" action="{{ 'update_password' }}" method="post">
          @csrf
        <div class="control-group">
          <input type="password" id="inputEmail" placeholder="Mật khẩu hiện tại" name="password">
        </div>
        <div class="control-group">
          <input type="password" id="inputPassword" placeholder="Mật khẩu mới" name="newpassword">
        </div><div class="control-group">
            <input type="password" id="inputPassword" placeholder="Nhập lại mật khẩu mới" name="renewpassword">
          </div>

        <div class="control-group">
      <button type="submit" class="btn btn-large btn-success" name="submit">Đổi mật khẩu</button>




        </div>
  </form>
    </div>
</div>
<!-- Footer ================================================================== -->
	@include('client.layouts.footer')
    <script src="assets/client/themes/js/jquery.js" type="text/javascript"></script>
	<script src="assets/client/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/client/themes/js/google-code-prettify/prettify.js"></script>
    <script type="text/javascript" src="assets/client/themes/js/custom.js"></script>
    <script src="assets/client/themes/js/bootshop.js"></script>

    <script src="assets/client/themes/js/jquery.lightbox-0.5.js"></script>
