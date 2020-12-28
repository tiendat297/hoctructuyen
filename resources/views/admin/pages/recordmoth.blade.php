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
                            <!--  Line Chart -->
                            <div class="col-sm-12">
                                <div class="card">
                                    <div id="top_x_div" style="width: 800px; height: 500px;">
                                        <script type="text/javascript">
                                            var visitor = <?php echo $visitor; ?>;
                                            console.log(visitor);
                                            google.charts.load('current', {'packages':['bar']});
                                            google.charts.setOnLoadCallback(drawStuff);

                                            function drawStuff() {
                                              var data = new google.visualization.arrayToDataTable(visitor);

                                              var options = {
                                                width: 800,
                                                legend: { position: 'ccccc' },
                                                chart: {
                                                  title: 'Biểu đố thống kê doanh số theo tháng',
                                                  subtitle: 'The chart of sales statistics by month' },
                                                axes: {
                                                  x: {
                                                    0: { side: 'top', label: 'Tháng'} // Top x-axis.
                                                  }
                                                },
                                                bar: { groupWidth: "90%" }
                                              };

                                              var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                                              // Convert the Classic options to Material options.
                                              chart.draw(data, google.charts.Bar.convertOptions(options));
                                            };
                                          </script>
                                    </div>

                                </div>
                                <!-- end card-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="card">

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="datatable_length">
                                                    <label>Lọc
                                                        <select  name="loc"   aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm loc">
                                                            <option value="">Khóa học</option>
                                                            @foreach ($data2 as $courses )


                                                            <option value="{{ $courses -> id }}">{{ $courses -> name }}</option>
                                                            @endforeach
                                                        </select>
                                                          </label>
                                                        </div>
                                            </div>

                                        </div>

                                        <h4 class="header-title mb-4">BÁO CÁO DOANH THU THEO THÁNG</h4>
                                        <form action="{{ 'excel_month' }}" method="post">
                                            @csrf
                                        <button type="submit"  name="export"  value = "true" class="btn btn-outline-success waves-effect width-md waves-light">Excel</button>
                                        </form>


                                        <div class="table-responsive mb-0" data-pattern="priority-columns" id="table">

                                            <table id="tech-companies-1 st_table" class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Stt</th>
                                                        <th>tháng</th>
                                                        <th>Đơn hàng</th>
                                                        <th>Học viên</th>
                                                        <th>Khóa học bán được</th>
                                                        <th>Tổng thu</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                      <?php $i = 1; ?>

@foreach ( $data as $record )



                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $record -> thang  }} - 2020 </td>
                                                        <td>{{ $record -> donhang  }}</td>
                                                        <td>{{ $record -> hv }}</td>
                                                        <td>{{ $record -> sl }}</td>
                                                        <td>{{ number_format($record->tong, 0) }} đ</td>
                                                        <td>

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



                <!-- Footer Start -->

                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>




        <!-- Right bar overlay-->


        <!-- Vendor js -->
      <!--Morris Chart-->
      <script src="assets\admin\js\vendor.min.js"></script>
      <script src="assets\admin\libs\morris-js\morris.min.js"></script>
      <script src="assets\admin\libs\raphael\raphael.min.js"></script>

      <!-- Init js -->
      <script src="assets\admin\js\pages\morris.init.js"></script>

      <!-- App js -->
      <script src="assets\admin\js\app.min.js"></script>

        <script type="text/javascript">
            $(".loc").change(function(){
                 $value = $(this).val();
                 $.ajax({
                     type: 'get',
                     url: '{{ URL::to('loc_month') }}',
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
    </body>

</html>
