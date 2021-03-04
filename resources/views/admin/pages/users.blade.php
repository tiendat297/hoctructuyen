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
                                        <form class="app-search">
                                            <div class="app-search-box">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" placeholder="Search...">
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

                                        <h4 class="header-title mb-4">DANH SÁCH HỌC VIÊN</h4>
                                        @if (session('admin_thongbao'))
                                        <div class="alert alert-icon alert-success alert-dismissible fade show" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <i class="mdi mdi-check-all mr-2"></i>
                                            <strong>Well done!</strong>{{ session('admin_thongbao') }}
                                        </div>
                                                    @endif


                                        <div class="table-responsive giangvien" id="table_giangvien">

                                            <table id="tech-companies-1 st_table" class="table table-striped mb-0">
                                                <thead>
                                                    <tr>

                                                        <th>Stt</th>

                                                        <th>Id</th>
                                                        <th>Tên học viên</th>
                                                        <th>Phone</th>
                                                        <th>Tổng giá trị</th>
                                                        <th>Số lượng mua</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                      <?php $i = 1; ?>



                                                    <tr>
                                                        @foreach ($data as $users )


                                                        <td>{{ $i }}</td>

                                                        <td>{{ $users -> id }}</td>
                                                        <td>{{ $users -> name }}</td>
                                                        <td>{{ $users -> phone }}</td>
                                                        <td>{{ $users -> total_donhang }}</td>
                                                        <td>{{ $users -> sl }}</td>
                                                        <td> <button  data-id="" data-toggle="modal" class="badge badge-danger delete" data-target="#delete" id="sa-warning" ><i class="fas fa-archive"></i> Xóa</button>
                                                             <a    href=""  class="badge badge-success"  > <i class="ion ion-md-create"></i> Sửa</a></td>

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
