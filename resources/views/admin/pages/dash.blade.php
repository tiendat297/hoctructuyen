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


                        <div class="row">

                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-pink">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">

                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">{{ number_format($array[0], 0) }}</span></h2>
                                                <p class="mb-0">Khóa học</p>
                                            </div>

                                            <a href="{{ "courses_admin" }}"><i class="ion-md-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-xl-3 col-sm-6">
                                <div class="card bg-pink">
                                    <div class="card-body widget-style-2">
                                        <div class="text-white media">
                                            <div class="media-body align-self-center">
                                                <h2 class="my-0 text-white"><span data-plugin="counterup">{{ number_format($array[1], 0) }}</span></h2>
                                                <p class="mb-0">Giảng viên</p>
                                            </div>
                                            <a href="{{ "giangvien" }}"><i class="ion-md-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-purple">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white"><span data-plugin="counterup">{{ number_format($array[2], 0) }}</span></h2>
                                                    <p class="mb-0">Người dùng</p>
                                                </div>
                                                <a href="{{ 'users' }}"><i class="ion-md-paper-plane"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-info">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white"><span data-plugin="counterup">{{ number_format($array[4], 0) }}</span></h2>
                                                    <p class="mb-0">Đơn hàng</p>
                                                </div>
                                                <a href="{{ 'student_courses_admin' }}"><i class="ion-ios-pricetag"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card bg-info">
                                        <div class="card-body widget-style-2">
                                            <div class="text-white media">
                                                <div class="media-body align-self-center">
                                                    <h2 class="my-0 text-white"><span data-plugin="counterup">{{ number_format($array[5], 0) }}</span></h2>
                                                    <p class="mb-0">Đơn hàng chưa xử lí</p>
                                                </div>
                                                <a href="{{ 'student_courses_admin' }}"><i class="ion-ios-pricetag"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </div>

                            <h4 class="page-title">Danh sách mua khóa học mới</h4>
                            @if (session('admin_thongbao'))
                            <div class="alert alert-icon alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <i class="mdi mdi-check-all mr-2"></i>
                                <strong>Well done!</strong>{{ session('admin_thongbao') }}
                            </div>
                                        @endif
                            <div class="row">
                                <div class="col-sm-15">
                                    <div class="card-box">

                                        <div class="table-rep-plugin">
                                            <div class="table-responsive mb-0" data-pattern="priority-columns" id="table">
                                                <table id="tech-companies-1 st_table" class="table table-striped mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th>Stt</th>
                                                            <th>Mã đơn hàng</th>
                                                            <th>ID khách</th>
                                                            <th data-priority="1">Tên khách hàng</th>
                                                            <th data-priority="3">Mã khóa học</th>
                                                            <th data-priority="1">Tên khóa học</th>
                                                            <th data-priority="3">Trạng thái</th>
                                                            <th data-priority="3">Mã kích hoạt</th>
                                                            <th data-priority="6">Giá</th>
                                                            <th data-priority="6">Payments</th>
                                                            <th data-priority="6">Ngày mua</th>
                                                            <th data-priority="6">Thao tác</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        @foreach ( $st_courses as $tt )


                                                        <tr>

                                                            <td>{{ $i }}</td>
                                                            <td>{{ $tt -> id }}</td>
                                                            <td>{{ $tt -> users_id }}</td>
                                                            <td>{{ $tt -> name }}</td>
                                                            <td>{{ $tt -> courses_id }}</td>
                                                            <td>{{ $tt -> courses_name }}</td>
                                                            <td>@if($tt -> status == 1)
                                                                <span class="badge badge-primary"><i class="ion ion-md-checkmark">Confirm</i></span>
                                                            @elseif($tt -> status == 0)
                                                            <span class="badge badge-danger"><i class="ion ion-md-close"></i>Wait</span>
                                                            @else
                                                            <span class="badge badge-warning"><i class="ion ion-md-checkmark">activated
                                                            </i></span>
                                                            @endif

                                                            </td>
                                                            <td>{{ $tt -> cod }}</td>
                                                            <td>{{ $tt -> price }}</td>
                                                            <td>{{ $tt -> payments }}</td>
                                                            <td>{{ $tt -> created_at }}</td>
                                                            <td> <a href="{{ url('admin_xoa_stc',['id' => $tt ->id]) }}"  class="badge badge-danger xoa"  id="sa-warning" onclick="return confirm('Bạn có muốn xóa đơn {{ $tt -> id }} của {{ $tt -> name }} ');" ><i class="fas fa-archive"></i> Xóa</a>
                                                                 <a href="{{ url('detail_donhang',['id' => $tt -> id]) }}"  class="badge badge-success"  > <i class="ion ion-md-create"></i>Xác nhận,tạo mã</a>

                                                            </td>
                                                        </tr>
                                                        <?php $i++ ;?>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>


                        <!-- end row -->

                        <!-- end row -->

                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->



                <!-- Footer Start -->

                <!-- end Footer -->
                <span>{!! $st_courses -> render() !!}</span>
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
