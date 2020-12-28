@include('client.layouts.botton')


<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->

<!-- Sidebar end=============================================== -->
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
	<h3> Registration</h3>
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
	<form class="form-horizontal" action="{{ url('register') }}" method="post">
        @csrf
		<h4>THÔNG TIN CÁ NHÂN</h4>
		<div class="control-group">


		</div>
		<div class="control-group">
			<label class="control-label" for="inputFname1">Họ và tên<sup>*</sup></label>
			<div class="controls">
			  <input type="text" id="inputFname1" placeholder=" Name" name="name">
			</div>
		 </div>

		<div class="control-group">
		<label class="control-label" for="input_email">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" id="input_email" placeholder="Email" name="email">
		</div>
	  </div>
	<div class="control-group">
		<label class="control-label" for="inputPassword1">Mật khẩu <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="inputPassword1" placeholder="Password" name="password">
		</div>
      </div>
      <div class="control-group">
		<label class="control-label" for="inputPassword1">Nhập lại mật khẩu <sup>*</sup></label>
		<div class="controls">
		  <input type="password" id="inputPassword1" placeholder="repassword" name="repassword">
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
			  <input type="text" id="company" placeholder="Địa chỉ" name="address">
			</div>
        </div>
        <div class="control-group">
			<label class="control-label" for="company">Số điện thoại</label>
			<div class="controls">
			  <input type="text" id="company" placeholder="Số điện thoại" name="phone">
			</div>
        </div>
        <div class="control-group">
			<div class="controls">
				<input type="hidden" name="email_create" value="1">
				<input type="hidden" name="is_new_customer" value="1">
				<input class="btn btn-large btn-success" type="submit" value="Register" />
			</div>
		</div>
	</form>
</div>

</div>
</div>
</div>
</div>
@include('client.layouts.footer')
