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
                            <div class="col-12">
                                <div class="card">
                                    <div class="col-3">
                                        <form class="app-search" action="{{ 'tim_giangvien' }}" method="POST">
                                            @csrf
                                            <div class="app-search-box">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="search" placeholder="Search...">
                                                    <div class="input-group-append">
                                                        <button class="btn badge badge-success" type="submit">
                                                            <i class="fas fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-body">

                                        <h4 class="header-title mb-4">DANH SÁCH KHÓA HỌC</h4>
                                        @if (session('admin_thongbao'))
                                        <div class="alert alert-icon alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <i class="mdi mdi-check-all mr-2"></i>
                                            <strong>Well done!</strong>{{ session('admin_thongbao') }}
                                        </div>
                                                    @endif
                                        <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" data-toggle="modal" data-target="#edit" > <i class="ion ion-md-add"></i> THÊM MỚI </button>
                                        <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"> <i class="ion ion-md-people"></i> Danh sách giảng viên ({{ number_format($data2, 0) }} Bản ghi) </button>

                                        <div class="table-responsive giangvien" id="table_giangvien">
                                            <table  id="tech-companies-1 st_table" class="table table-striped mb-0 data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Stt</th>
                                                        <th>Ảnh</th>
                                                        <th>Id</th>
                                                        <th>Tên giảng viên</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                      <?php $i = 1; ?>
                                                        @foreach ($data as $giangvien)


                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td><img style="width:50px; height:50px;" src="assets\admin\images\{{ $giangvien -> images }}" alt=""/></td>
                                                        <td>{{ $giangvien -> id }}</td>
                                                        <td>{{ $giangvien -> hoten }}</td>
                                                        <td>@if($giangvien -> status == 1)
                                                            <span class="badge badge-primary"><i class="ion ion-md-checkmark"> Work</i></span>
                                                        @else
                                                        <span class="badge badge-danger"><i class="ion ion-md-close"></i> inactive</span>
                                                        @endif

                                                        </td>
                                                        <td> <button  data-id="{{ $giangvien -> id }}" data-toggle="modal" class="badge badge-danger delete" data-target="#delete" id="sa-warning" ><i class="fas fa-archive"></i> Xóa</button>
                                                             <a href="{{ url('edit_gv',['id' => $giangvien -> id]) }}"  class="badge badge-success"  > <i class="ion ion-md-create"></i> Sửa</a></td>

                                                    </tr>
                                                     <?php $i++ ;?>
                                                                 @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end .table-responsive-->
                                    </div>
                                    <!-- end card-body -->
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>


                        <!-- end row -->
                        <span>{!! $data -> render() !!}</span>
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
        <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="col-lg-15">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Thông tin giảng viên</h4>

                                <form class="parsley-examples" action="{{ "themgv" }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="userName">Tên giảng viên<span class="text-danger">*</span></label>
                                        <input type="text" name="hoten" parsley-trigger="change" required="" placeholder="Enter user name" class="form-control" id="userName">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số điện thoại<span class="text-danger">*</span></label>
                                        <input type="text" name="phone" parsley-trigger="change" required="" placeholder="Địa chỉ" class="form-control" id="emailAddress">
                                    </div>
                                    <div class="form-group">
                                        <label>Địa chỉ<span class="text-danger">*</span></label>
                                        <input  type="text" placeholder="" required="" class="form-control" name="address">
                                    </div>
                                    <div class="form-group">
                                        <label for="passWord2">Mô tả<span class="text-danger">*</span></label>
                                        <div class="col-lg-14">
                                            <textarea class="form-control ckeditor" rows="10" id="example-textarea" type="text" name="description" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="" for="example-date">Trạng thái hoạt động</label>
                                        <select class="" name="status">

                                            <option value="1">Work</option>
                                            <option value="0">Inactive</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="passWord2">Ảnh giảng viên<span class="text-danger">*</span></label>
                                        <div class="col-lg-10">
                                            <input type="file" name="images"  >
                                        </div>
                                    </div>
                                </div>




                                    </div>

                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light ">Lưu thông tin</button>
                                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
        </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- Right bar overlay-->

        <div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="col-lg-15">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Bạn có muốn xóa giảng viên không </h4>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Không</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light del">Có </button>
                                        </div>
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!-- Vendor js -->
        @include('admin.layouts.footer')

    </body>

</html>
