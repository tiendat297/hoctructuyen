
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
		<div class="span9">
            @if (session('thongbao'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Well done!</strong> {{ session('thongbao') }}
      </div>
                @endif


                <div class="span9">
                    <table class="table table-bordered">
                    <thead>
                      <tr>

                        <th>Khóa học</th>
                        <th>Hoàn thành bài giảng</th>
                        <th>Danh mục khóa học</th>
                        <th>Xem thêm</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $courses)


                      <tr>

                        <td><div class="thumbnail">
                            <a href="{{ url('learning',['id'=>$courses ->course_id]) }}" ><img style="width:240px; height:150px;" src="assets\admin\images\courses\{{ $courses -> images }}" alt=""/></a>
                            <div class="caption">
                              <h5>{{ $courses -> name }}</h5>


                            </div>
                          </div>
                        </td>
                        <td>{{ $courses -> dahoc }} bài học</td>
                        <td>Guitar cơ bản</td>
                        <td>8 bình luận</td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                    </div>
		</div>
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
