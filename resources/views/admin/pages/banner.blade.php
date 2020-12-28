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

                                    <div class="card-body">

                                        <h4 class="header-title mb-4">DANH SÁCH BANNER</h4>
                                        @if (session('banner'))
                                        <div class="alert alert-icon alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <i class="mdi mdi-check-all mr-2"></i>
                                            <strong>Well done!</strong>{{ session('banner') }}
                                        </div>
                                                    @endif

                                        <button type="button" class="btn btn-icon waves-effect waves-light btn-warning" data-toggle="modal" data-target="#edit" > <i class="ion ion-md-add"></i> THÊM MỚI </button>

                                        <div class="table-responsive giangvien" id="table_giangvien">
                                            <table  id="tech-companies-1 st_table" class="table table-striped mb-0 data-table">
                                                <thead>
                                                    <tr>
                                                        <th>Stt</th>
                                                        <th>Ảnh</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                      <?php $i = 1; ?>
                                                        @foreach ($data as $banner)


                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td><img style="width:15%" src="assets/client/themes/images/carousel/{{ $banner -> name }}" alt=""/></td>
                                                        <td>@if($banner -> status == 1)
                                                            <span class="badge badge-primary"><i class="ion ion-md-checkmark"> Hiện</i></span>
                                                        @else
                                                        <span class="badge badge-danger"><i class="ion ion-md-close"></i> Ẩn</span>
                                                        @endif

                                                        </td>

                                                        <td> <a  href="{{ url('xoa_banner',['id'=>$banner -> id]) }}" class="badge badge-danger delete"  id="sa-warning" ><i class="fas fa-archive"></i> Xóa</button>


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
                                <h4 class="header-title mb-4">Upload Ảnh</h4>

                                <form class="parsley-examples" action="{{ 'insert_banner' }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">

                                        <label class="" for="example-date">Trạng thái hoạt động</label>
                                        <select class="" name="status">

                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="passWord2">Banner mới<span class="text-danger">*</span></label>
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


        <!-- Vendor js -->
        @include('admin.layouts.footer')

    </body>

</html>
