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

                <!-- end content -->

                <div class="row">
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4 header-title text-danger">Thông tin chương trình</h4>

                                @if (session('admin_thongbao'))
                                <div class="alert alert-icon alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="mdi mdi-check-all mr-2"></i>
                                    <strong>Well done!</strong>{{ session('admin_thongbao') }}
                                </div>
                                            @endif
                                <form action="{{ "suacourses" }}" method="POST" enctype="multipart/form-data">
                                    @csrf


                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Tên chương trình khuyến</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="name" value="" parsley-trigger="change" required="" >
                                        </div>
                                    </div>





                            </div>
                            <div class="card-body">
                                <h4 class="mb-4 header-title text-danger">Thời gian khuyến mãi</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity" class="col-form-label">Thời gian bắt đầu </label>
                                        <input type="datetime-local" class="form-control" id="inputCity" name="price_root" value="" parsley-trigger="change" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity" class="col-form-label">Thời gian kết thúc</label>
                                        <input type="datetime-local" class="form-control" id="inputCity" name="price_sale" value="" parsley-trigger="change" required="">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">

                                    <label  for="example-date">Áp dụng với</label>
                                    <select class="form-control col-md-9" name="status">
                                        <option value="">
                                        </option>
                                        <option value="1">Tất cả</option>
                                        <option value="0">Nhóm khóa học</option>
                                        <option value="0">Từng khóa học</option>


                                    </select>
                                </div>
                                <div class="form-group row">

                                    <label  for="example-date">Loại khuyến mãi</label>
                                    <select class="form-control col-lg-10" name="free">
                                        <option value="">
                                        </option>
                                        <option value="1">Giảm theo phần trăm</option>
                                        <option value="0">Giảm giá trị</option>

                                    </select>
                                </div>
                                    <label class="control-label">Giá trị khuyến mãi</label>
                                    <div class="form-group row">

                                        <input type="fload" class="form-control" id="inputCity" name="price_root" value="" parsley-trigger="change" required="">
                                     </div>


                        </div>
                    </div>









                    </div>

                    <button type="submit" class="btn btn-icon waves-effect waves-light btn-warning" name="submit"> <i class="ion ion-md-add"></i>Lưu thông tin </button>
                </div>
                <!-- Footer Start -->
                <!-- end Footer -->


            </div>

            <!-- end card -->
        </form>
        </div>
        <!-- end col -->
    </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->




        <!-- Right bar overlay-->
        <script src="assets\admin\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js"></script>

        @include('admin.layouts.footer')
    </body>

</html>
