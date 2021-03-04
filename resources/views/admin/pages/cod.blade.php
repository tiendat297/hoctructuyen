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

                                        <h4 class="header-title mb-4">SỐ LƯỢNG COD HIỆN TẠI</h4>




                                        <div class="table-responsive giangvien" id="table_cod">
                                            <table id="tech-companies-1 st_table" class="table table-striped mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>Stt</th>
                                                        <th>ID</th>
                                                        <th>Tên khóa học</th>
                                                        <th>Số lượng còn lại</th>

                                                        <th>Thêm</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                      <?php $i = 1; ?>

@foreach ( $data2 as $cod => $value )



                                                    <tr id="{{ $value -> courses_id  }}">

                                                        <td>{{ $i }}</td>
                                                        <td>{{$value -> courses_id}}</td>
                                                       <td>{{ $value -> name }}</td>

                                                        <td><button type="button" class="btn btn-outline-dark waves-effect width-md waves-light">{{$value -> sl}}</button></td>


                                                        <td><button type="button" class="btn btn-dark btn-rounded waves-effect width-md waves-light" onclick="event.preventDefault();open_them_cod({{$value -> courses_id}})" ><i class="ion ion-md-add"></i> Thêm</a></td>
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
        <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="col-lg-15">
                        <div class="card">
                            <div class="card-body" id="insert_cod">
                                <form id="them_cod"  method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <input id="courses_id" name="courses_id" readonly="" class="form-control col-md-9" >
                                <label for="example-date" class="">Số mã kích hoạt tạo</label>
                                <input data-toggle="touchspin" type="text" value="" name = "sl" class="form-control">
                                        <div class="modal-footer">

                                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Hủy</button>
                                            <button type="button" class="btn btn-primary waves-effect waves-light them_cod" onclick="event.preventDefault();them_cod()"  id="showtoast"    > Thêm</button>
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

        <!-- END wrapper -->


        <!-- Right bar overlay-->


        <!-- Vendor js -->


    </body>
<script>
    function them_cod(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
        $.ajax({
            url: 'them_cod',
            data: new FormData($("#insert_cod form")[0]),
            contentType: false,
            processData: false,
            method: 'post',

        }).done(function(data){
            console.log(data);
            $('#' +$("#courses_id").val()).html(data);
            $('#edit').modal('hide');

            toastr.success( 'Thông báo', {timeOut: 5000});
        }).fail(function(data){

        });
     }

     function open_them_cod(courses_id){
        $("#them_cod input[name=courses_id]").val(courses_id  );
        $('#edit').modal('show');
     }

</script>
@include('admin.layouts.footer')
</html>
