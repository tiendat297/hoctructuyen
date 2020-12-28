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
                                <h4 class="mb-4 header-title">Thông tin giảng viên</h4>
                                @if (session('admin_thongbao'))
                                <div class="alert alert-icon alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="mdi mdi-check-all mr-2"></i>
                                    <strong>Well done!</strong>{{ session('admin_thongbao') }}
                                </div>
                                            @endif
                                <form action="{{ url('edit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                                @foreach ($data as $giangvien)

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">ID</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" readonly="" name="id" value="{{ $giangvien -> id }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Họ và tên</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="hoten" value="{{ $giangvien -> hoten }}"  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Số điện thoại</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="phone" value="{{ $giangvien -> phone }}"  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Địa chỉ</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="address" value="{{ $giangvien -> address }}"  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Mô tả </label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" rows="10" id="example-textarea" type="text" name="description" {{ $giangvien -> description }}>{{ $giangvien -> description }}</textarea>
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

                                        <label for="example-date">Trạng thái:</label>
                                        <select class="form-control col-md-9" name="status">
                                            <option value="{{ $giangvien -> status }}">@if($giangvien -> status == 1)
                                                {{ "Work" }}
                                                @else
                                                {{ "Inactive" }}
                                                @endif
                                            </option>
                                            <option value="1">Work</option>
                                            <option value="0">Inactive</option>

                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label  for="example-textarea">Ảnh </label>
                                        <div class="col-lg-10">
                                           <img style="width:140px; height:170px;" src="assets\admin\images\{{ $giangvien -> images }}" alt=""/>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label  for="example-fileinput">Cập nhật lại ảnh</label>
                                        <div class="col-lg-10">
                                            <input type="file" name="images"  >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  for="example-date">Ngày khởi tạo</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="example-date" readonly="" type="text" name="date" value="{{ $giangvien -> created_at }}">
                                        </div>
                                    </div>



                                    @endforeach

                                    <div class="form-group mb-0 justify-content-end row">

                                    </div>


                            </div>
                        </div>
                        <button type="submit" class="btn btn-icon waves-effect waves-light btn-warning" name="submit"> <i class="ion ion-md-add"></i>Lưu thông tin </button>
                    </div>

                </div>

            </form>
                <!-- Footer Start -->

                <!-- end Footer -->
                <div class="card-body">

                    <h4 class="header-title mb-4">DANH SÁCH KHÓA HỌC LIÊN QUAN</h4>


                    <div class="table-responsive" id="table-cart">
                        <table class="table table-centered mb-0 table-nowrap data-table" id="btn-editable">
                            <thead>
                                <tr>
                                    <th>Stt</th>
                                    <th>Ảnh</th>
                                    <th>Id</th>
                                    <th>Tên khóa học</th>

                                    <th>Nhóm khóa học</th>
                                    <th>Loại</th>
                                    <th>Giá</th>
                                    <th>Hiện</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php $i = 1; ?>
                                @foreach ($data2 as $courses)


                                                                                    <tr>
                                                                                        <td>{{ $i }}</td>
                                                                                        <td><img style="width:70px; height:40px;" src="assets\admin\images\courses\{{ $courses -> images }}" alt=""/></td>
                                                                                        <td>{{ $courses -> id }}</td>
                                                                                        <td>{{ $courses -> name }}</td>

                                                                                        <td>{{ $courses -> group_courses_id }}</td>
                                                                                        <td>@if($courses -> free == 1)
                                                                                            <i class="ion ion-md-checkmark">Miễn phí</i>
                                                                                         @else
                                                                                         Mất phí
                                                                                         @endif

                                                                                         </td>
                                                                                        <td>{{ number_format($courses->price_sale, 0) }}</td>


                                                                                        <td>@if($courses -> status == 1)
                                                                                            <span class="badge badge-primary"><i class="ion ion-md-checkmark"> Hiện</i></span>
                                                                                        @else
                                                                                        <span class="badge badge-danger"><i class="ion ion-md-close"></i> NO</span>
                                                                                        @endif

                                                                                        </td>
                                                                                        <td> <a href="#" class="badge badge-danger"><i class="fas fa-archive"></i> Xóa</a>
                                                                                              <a href="{{ url('edit_courses',['id' => $courses -> id]) }}" class="badge badge-success"> <i class="ion ion-md-create"></i> Sửa</a></td>
                                                                                    </tr>
                                                  <?php $i++ ;?>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- end .table-responsive-->
                </div>
            </div>
            <!-- end card -->
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


        @include('admin.layouts.footer')
    </body>

</html>
