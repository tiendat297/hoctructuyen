@include('admin.layouts.header')

    <body>

        <!-- Begin page -->
        <div id="wrapper">


            <!-- Topbar Start -->
            @include('admin.layouts.botton')
            <!-- end Topbar --> <!-- ========== Left Sidebar Start ========== -->
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


                        <!-- End row-->


                        <!-- End row-->

                        <div class="row">
                            <!--  Line Chart -->

                            <div class="col-sm-12">

                                <div class="card">
                                    <h4 class="text-pink">Biểu đồ báo cáo doanh thu theo từng sản phẩm tháng {{ $data3 }}</h4>
                                    <div class="col-3">
                                        <form class="app-search" action="{{ 'chart_search' }}" method="POST">
                                            @csrf
                                            <div class="app-search-box">
                                                <div class="input-group">
                                                    <label>Lọc theo tháng
                                                        <select  name="loc"   aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm loc">
                                                            <option value="">Tháng</option>
                                                            @foreach ($data2 as $month )


                                                            <option value="{{ $month -> thang }}">{{ $month -> thang }} - {{ $month -> nam }}</option>
                                                            @endforeach
                                                        </select>
                                                          </label>

                                                        <button class="btn badge success" type="submit">
                                                            <i class="fas fa-search"></i>
                                                        </button>


                                                </div>
                                            </div>
                                        </form>
                                    </div>


    <div>
    <button id="change-chart">Change to Classic</button>
    </div>
    <br><br>
    <div id="chart_div" style="width: 1200px; height: 500px;">
        <script type="text/javascript">
            var visitor = <?php echo $visitor; ?>;
            console.log(visitor);
            google.charts.load('current', {'packages':['corechart', 'bar']});
            google.charts.setOnLoadCallback(drawStuff);

            function drawStuff() {

              var button = document.getElementById('change-chart');
              var chartDiv = document.getElementById('chart_div');

              var data = google.visualization.arrayToDataTable(visitor);

              var materialOptions = {
                width: 1300,
                chart: {
                  title: '',
                  subtitle: ''
                },
                series: {
                  0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
                  1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
                },
                axes: {
                  y: {
                    distance: {label: 'Doanh thu(triệu đồng)'}, // Left y-axis.
                    brightness: {side: 'right', label: 'Số lượng khóa bán (Khóa)'} // Right y-axis.
                  }
                }
              };

              var classicOptions = {
                width: 1300,
                series: {
                  0: {targetAxisIndex: 0},
                  1: {targetAxisIndex: 1}
                },
                title: 'Biểu đồ báo cáo doanh số và số lượng bán ra theo từng khóa học',
                vAxes: {
                  // Adds titles to each axis.
                  0: {title: 'Doanh thu(tr)'},
                  1: {title: 'Số lượng bán(khóa)'}
                }
              };

              function drawMaterialChart() {
                var materialChart = new google.charts.Bar(chartDiv);
                materialChart.draw(data, google.charts.Bar.convertOptions(materialOptions));
                button.innerText = 'Change to Classic';
                button.onclick = drawClassicChart;
              }

              function drawClassicChart() {
                var classicChart = new google.visualization.ColumnChart(chartDiv);
                classicChart.draw(data, classicOptions);
                button.innerText = 'Change to Material';
                button.onclick = drawMaterialChart;
              }

              drawMaterialChart();
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



                                        </div>


                                        <form action="{{ 'excel_courses' }}" method="post">
                                            @csrf
                                            <label>Lọc theo tháng
                                                        <select  name="loc"   aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm loc">
                                                            <option value="">Tháng</option>
                                                            @foreach ($data2 as $month )


                                                            <option value="{{ $month -> thang }}">{{ $month -> thang }} - {{ $month -> nam }}</option>
                                                            @endforeach
                                                        </select>
                                            </label>

                                        <button type="submit"  name="export"  value = "true" class="btn btn-outline-success waves-effect width-md waves-light">Excel</button>
                                        </form>
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

                        <!-- End row-->
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


        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>



        <!-- Vendor js -->
        <script src="assets\admin\js\vendor.min.js"></script>

        <!--Morris Chart-->
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
