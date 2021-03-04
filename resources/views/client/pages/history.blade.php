
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


                <div class="span8">
                    <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Ngày</th>
                        <th>Bài học</th>
                        <th>Khóa học</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($data as $history)


                      <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $history -> created_at }}</td>
                        <td>{{ $history -> name_baihoc }}</td>
                        <td ><a href="{{ url('learning',['id'=>$history ->id]) }}" id = "courses">{{ $history -> name }} </a></td>

                      </tr>
                      <?php $i++ ;?>
                      @endforeach

                    </tbody>

                  </table>
                </div>
                <div class="pagination modal-1 span9">

                    <li>{!! $data -> render() !!}</li>


                </div>
		</div>
    </div>


</div>
<style type="text/css">
    #courses {

          color:#0097e6;
        }
    </style>

<!-- Footer ================================================================== -->
	@include('client.layouts.footer')
    <script src="assets/client/themes/js/jquery.js" type="text/javascript"></script>
	<script src="assets/client/themes/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/client/themes/js/google-code-prettify/prettify.js"></script>
    <script type="text/javascript" src="assets/client/themes/js/custom.js"></script>
    <script src="assets/client/themes/js/bootshop.js"></script>

    <script src="assets/client/themes/js/jquery.lightbox-0.5.js"></script>
