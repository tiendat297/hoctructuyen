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
                                        <form class="app-search" action="{{ url('tim_khoahoc') }}" method="POST">
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
                                        <a href="{{ "them_courses" }}"  class="btn btn-icon waves-effect waves-light btn-warning" > <i class="ion ion-md-add"></i> THÊM MỚI </a>
                                        <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"> <i class="ion ion-md-people"></i> Danh sách khóa học {{ number_format($array[0], 0) }} Bản ghi </button>
                                        <div class="table-responsive" id="khoahoc">
                                            <table id="tech-companies-1 st_table" class="table table-striped mb-0">
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
@foreach ($data as $courses)


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
                                                        <span class="badge badge-danger"><i class="ion ion-md-close"></i> Ẩn</span>
                                                        @endif

                                                        </td>
                                                        <td> <button href="#" data-id="{{ $courses -> id }}" data-toggle="modal" class="badge badge-danger xoa" data-target="#xoa" id="sa-warning" ><i class="fas fa-archive"></i> Xóa</button>
                                                              <a href="{{ url('edit_courses',['id' => $courses -> id]) }}" class="badge badge-success"> <i class="ion ion-md-create"></i> Sửa</a>
                                                              <a href="{{ url('chitiet_baihoc',['id' => $courses -> id]) }}"  class="badge badge-warning"  > <i class="ion ion-md-clipboard"></i>Nội dung</a>
                                                            </td>
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
                <span>{!! $data -> render() !!}</span>


                <!-- Footer Start -->

                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
        <div id="xoa" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="col-lg-15">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Bạn có muốn xóa khóa học không </h4>
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


        <!-- Right bar overlay-->


        @include('admin.layouts.footer')
    </body>

</html>
