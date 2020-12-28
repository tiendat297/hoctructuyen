@include('admin.layouts.header')

        <!-- Begin page content -->
        <div id="wrapper">


            <!-- Topbar Start  phía bên trên-->
@include('admin.layouts.botton')
            <!-- end Topbar --> <!-- ========== Left Sidebar Start bên trái ========== -->

@include('admin.layouts.left')


<!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->

                        <!-- end page title -->


                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- <div class="panel-heading">
                                                    <h4>Invoice</h4>
                                                </div> -->
                                    <div class="card-body">
                                        <div class="clearfix">
                                            <div class="float-left">
                                                <h4 class="text-right"><img src="assets\admin\images\Capture.PNG" height="40" alt="moltran"></h4>

                                            </div>
                                            <div class="float-right">
                                                <h5>Ba Đờn guitar # <br>
                                                                <strong>09677-234-26</strong>
                                                            </h5>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                        @foreach ($data as $hoadon)


                                                <div class="float-left mt-4">
                                                    <address>
                                                                <strong>Anh/Chị: {{ $hoadon -> name }}</strong><br>
                                                                {{ $hoadon -> address }}<br>
                                                                {{ $hoadon -> email }}<br>
                                                                <abbr title="Phone">P:</abbr> {{ $hoadon -> phone }}
                                                                </address>
                                                </div>
                                                <div class="float-right mt-4">
                                                    <p><strong>Order Date: </strong>{{ $hoadon -> created_at }}</p>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table mt-4">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Tên khóa học</th>
                                                                <th>Mã kích hoạt</th>
                                                                <th>Giá</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>{{ $hoadon -> courses_name }}</td>
                                                                <td>{{ $hoadon -> cod }}</td>
                                                                <td>{{ number_format($hoadon->price, 0) }}</td>


                                                            </tr>


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px">
                                            <div class="col-md-3 offset-md-9">
                                                <p class="text-right"><b>Tổng:</b> {{ number_format($hoadon->price, 0) }}</p>

                                                <hr>
                                                <h4 class="text-right">{{ number_format($hoadon->price, 0) }} vnđ</h4>
                                            </div>
                                        </div>
                                        @endforeach
                                        <hr>
                                        <div class="d-print-none">
                                            <div class="float-right">
                                                <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>


                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->



                <!-- Footer Start -->

                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>

        <!-- END wrapper -->


        <!-- Right bar overlay-->


        <!-- Vendor js -->
        @include('admin.layouts.footer')

    </body>

</html>
