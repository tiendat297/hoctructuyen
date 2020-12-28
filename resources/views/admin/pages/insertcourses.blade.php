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
                                <h4 class="mb-4 header-title text-danger">Thông tin khóa học</h4>

                                <form action="{{ "insert_courses" }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Tên khóa học</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="name" value="" parsley-trigger="change" required="" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Mô tả khóa học </label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" rows="10" id="example-textarea" type="text" name="description"parsley-trigger="change" required=""></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  for="example-fileinput">Ảnh khóa học</label>
                                        <div class="col-lg-10">
                                            <input type="file" name="images"  parsley-trigger="change" required="">
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body">
                                <h4 class="mb-4 header-title text-danger">Giá khóa học</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity" class="col-form-label">Giá gốc</label>
                                        <input type="fload" class="form-control" id="inputCity" name="price_root" parsley-trigger="change" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity" class="col-form-label">Giá khuyến mãi</label>
                                        <input type="fload" class="form-control" id="inputCity" name="price_sale" parsley-trigger="change" required="">
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
                                        <label for="example-date" class="text-danger">Trạng thái:</label>
                                        <select class="form-control col-md-9" name="status" >
                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>

                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date">Khóa học miễn phí:  </label>
                                        <select class="form-control col-md-9" name="free" parsley-trigger="change" required="">
                                            <option value="1">Miễn phí</option>
                                            <option value="0">Mất phí</option>
                                        </select>
                                    </div>
                                    <label class="control-label">Thứ tự hiển thị</label>
                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">

                                                        <input data-toggle="touchspin" type="text" value="0" name = "sort" class="form-control">
                                                        </div>
                            </div>



                        </div>
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group row">
                                        <label for="example-date" class="text-danger">Thuộc nhóm khóa học</label>
                                        <select class="form-control col-lg-10" name="group_courses">
                                            <option value=""></option>
                                            @foreach ($data2 as $gv )


                                            <option value="{{ $gv -> id }}">{{ $gv -> name }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date">Giảng viên</label>
                                        <select class="form-control col-md-9" name="giang_vien_id" parsley-trigger="change" required="">
                                            <option value=""></option>
                                            @foreach ($data as  $gv)


                                            <option value="{{ $gv -> id }}">{{ $gv -> hoten }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date">Từ khóa tìm kiếm</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="example-date"  type="text" name="search" value="#guitar">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  for="example-date">Ngày khởi tạo</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="example-date" readonly="" type="text" name="date" value="">
                                        </div>
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
