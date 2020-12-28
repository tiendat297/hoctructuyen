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
	<h3>THÔNG TIN KHÓA HỌC [ <small>{{ Cart::count() }} KHÓA HỌC </small>]<a href="products.html" class="btn btn-large pull-right"><i class="icon-arrow-left"></i> Continue Shopping </a></h3>
	<hr class="soft"/>


	<table class="table table-bordered">
              <thead>



                <tr>
                  <th>KHÓA HỌC</th>
                  <th>TÊN KHÓA HỌC</th>

                  <th>GÍA GỐC</th>
				  <th>GIÁ BÁN</th>


                </tr>

              </thead>
              <tbody>
@foreach ( $data as  $courses)


                <tr>
                  <td> <img width="60" src="assets\admin\images\courses\{{$courses -> images }}"/></td>
                  <td>{{ $courses -> name }}</td>

                  <td >{{ number_format($courses->price_root, 0) }} VNĐ</td>
                  <td class="label label-important" style="display:block"> <strong>{{ number_format($courses->price_sale, 0) }} VNĐ </strong></td>


                </tr>
                @endforeach





				</tbody>
            </table>



              <table class="table table-bordered">
               <tr><th type="submit" name="submit" class="btn btn-large pull-right" style="color: #b33939">CẢM ƠN QUÝ KHÁCH ĐÃ MUA KHÓA HỌC, QUÝ KHÁCH SẼ NHẬN ĐƯỢC CUỘC GỌI CỦA GUITAR BA ĐỜN ĐỂ LẤY MÃ KÍCH HOẠT CHO KHÓA HỌC!</th></tr>

                @csrf
               <tr>
               <td>


                </td>

                </tr>


                    </table>




</form>
</div>
</div></div>
</div>
@include('client.layouts.footer')
