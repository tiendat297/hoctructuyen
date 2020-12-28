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
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-header py-3 bg-transparent">
                                        <div class="card-widgets">
                                            <a href="javascript:;" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                            <a data-toggle="collapse" href="#cardCollpase1" role="button" aria-expanded="false" aria-controls="cardCollpase1"><i class="mdi mdi-minus"></i></a>
                                            <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                                        </div>
                                        <h5 class="header-title mb-0">Bar chart</h5>
                                    </div>
                                    <div id="cardCollpase1" class="collapse show">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div id="morris-bar-example" class="morris-charts" dir="ltr" style="height: 300px;"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end card-->
                            </div>
                            <!-- end col -->
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="datatable_length">
                                                    <label>Lọc theo tháng
                                                        <select  name="loc"   aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm loc">
                                                            <option value="">Tháng</option>
                                                            @foreach ($data2 as $month )


                                                            <option value="{{ $month -> thang }}">{{ $month -> thang }}</option>
                                                            @endforeach
                                                        </select>
                                                          </label>
                                                </div>


                                            </div>
                                                <div class="col-sm-12 col-md-6">
                                                                <div id="datatable_filter" class="dataTables_filter">
                                                                    <label>Search:<input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label>
                                                                </div>
                                                    </div>


                                        </div>
                                        <h4 class="header-title mb-4">BÁO CÁO DOANH THU THEO KHÓA HỌC</h4>


                                        <div class="table-responsive mb-0" data-pattern="priority-columns" id="table">

                                            <table id="tech-companies-1 st_table" class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Stt</th>
                                                        <th>ID</th>
                                                        <th>Khóa học</th>
                                                        <th>Số lượng học viên</th>
                                                        <th>Số lượng bán</th>
                                                        <th>Doanh thu</th>


                                                    </tr>
                                                </thead>

                                                <tbody>
                                                      <?php $i = 1; ?>

                                                        @foreach ( $data as $record )



                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $record -> courses_id  }} </td>
                                                        <td>{{ $record -> courses_name  }}</td>
                                                        <td>{{ $record -> hocvien }}</td>
                                                        <td>{{ $record -> sl_ban }}</td>
                                                        <td>{{ number_format($record->tong, 0) }} đ</td>



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




        <!-- Right bar overlay-->


        <!-- Vendor js -->
        @include('admin.layouts.footer')
        <script type="text/javascript">
           $(".loc").change(function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('loc_thang') }}',
                    data: {
                        'loc': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>

          <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search_courses') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>
    </body>

</html>
