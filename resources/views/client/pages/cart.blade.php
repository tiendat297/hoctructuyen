@include('client.layouts.botton')
<div id="mainBody">
	<div class="container">
	<div class="row">
<!-- Sidebar ================================================== -->


<!-- Sidebar end=============================================== -->
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active"> SHOPPING CART</li>
    </ul>

	<h3> GIỎ HÀNG CỦA TÔI [ <small >{{ Cart::count() }} KHÓA HỌC </small>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
	<hr class="soft"/>


	<table class="table table-bordered">
              <thead>



                <tr>
                  <th>KHÓA HỌC</th>
                  <th>TÊN KHÓA HỌC</th>
				          <th>GIÁ</th>
                  <th>TỔNG</th>
                  <th>THAO TÁC</th>
                </tr>

              </thead>
              <tbody>
      @foreach ($cart as $ttcart )
                <tr>
                  <td> <img width="60" src="assets\admin\images\courses\{{$ttcart -> options-> img }}"/></td>
                  <td>{{ $ttcart ->name }} </td>

                  <td>{{number_format($ttcart->price, 0) }}</td>
                  <td>{{number_format($ttcart->price, 0) }}</td>
                  <td><a class="button2" href="{{ url('delete',['rowId' => $ttcart ->rowId]) }} " onclick="return confirm('Bạn có muốn xóa khóa học này');">XÓA</a></td>
                </tr>
@endforeach


                <tr>
                  <td colspan="6" style="text-align:right">Total Price:	</td>
                  <td> {{ Cart::total() }} vnđ</td>
                </tr>
                <tr>
                    <td colspan="6" style="text-align:right">Discount:	</td>
                    <td> 0</td>
                </tr>
				 <tr>
                  <td colspan="6" style="text-align:right"><strong>TOTAL ({{ Cart::total()  }} - 0 ) =</strong></td>
                  <td class="label label-important" style="display:block"> <strong> {{ Cart::total() }} vnđ </strong></td>
                </tr>
				</tbody>
            </table>



              <table class="table table-bordered">
               <tr><th>CHỌN HÌNH THỨC THANH TOÁN</th></tr>
               <form action="{{  url('muakhoahoc') }}" method="post">
                @csrf
               <tr>

                <td>
                    <div id="main" >
                        <div class="container" colspan="6">

                          <div class="styled-select green" colspan="6">
                            <select name="payments">
                              <option value="home">THANH TOÁN TRỰC TIẾP TẠI VĂN PHÒNG</option>
                              <option value="bank">THANH TOÁN BẰNG CHUYỂN KHOẢN NGÂN HÀNG</option>
                              <option value="cart">THANH TOÁN BẰNG THẺ CÀO</option>
                            </select>
                          </div>

                        </div>

                      </div>

                    </td>

                </tr>


                    </table>


	<a href="products.html" class="btn btn-large"><i class="icon-arrow-left"></i> Continue Shopping </a>
	<button type="submit" name="submit" class="btn btn-large pull-right" style="color: #b33939">ĐĂNG KÍ MUA <i class="icon-arrow-right"></i></button>
</form>
</div>
</div></div>
</div>
@include('client.layouts.footer')
