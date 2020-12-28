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
                        <!-- end page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Danh sách mua khóa học </h4>

                                    <div class="clearfix"></div>
                                </div>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-15">
                                <div class="card-box">

                                    <div class="table-rep-plugin">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                            </div>
                                        </div>
                                        <div class="table-responsive mb-0" data-pattern="priority-columns" id="table">

                                                <div class="col-sm-6 col-md-6">
                                                    <div class="dataTables_length" id="datatable_length">
                                                        <div class="dataTables_length" id="datatable_length">
                                                            <label>Đơn hàng vào ngày:<input type="date" id="loc_ngay" class="form-control form-control-sm loc_ngay" name="loc_ngay" ></label>
                                                        </div>
                                                    </div>
                                                </div>
                                            <table id="tech-companies-1 st_table" class="table table-striped mb-0 table_st">

                                                <thead>
                                                    <tr>
                                                        <th colspan="6">

                                                                <label>Search:<input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label>
                                                         </th>

                                                        <th colspan="2"><select  name="loc_status"   aria-controls="datatable" class="custom-select custom-select-sm form-control form-control-sm loc_status">
                                                            <option value="">Trạng thái</option>
                                                            <option value="0">Wait</option>
                                                            <option value="1">Confirm</option>
                                                            <option value="2">Active</option>

                                                        </select></th>

                                                        <th colspan="2"></th>
                                                        <th ></th>

                                                    </tr>
                                                    <tr>
                                                        <th>Stt</th>
                                                        <th>ID</th>
                                                        <th>Phone</th>
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
                                                    @foreach ( $st_courses2 as $tt )


                                                    <tr>

                                                        <td>{{ $i }}</td>
                                                        <td>{{ $tt -> id }}</td>
                                                        <td>{{ $tt -> phone }}</td>
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
                                                        <td> <button data-id="{{ $tt -> id }}" data-toggle="modal" data-target="#delete"  class="badge badge-danger xoa_st"  id="sa-warning"  ><i class="fas fa-archive"></i> Xóa</button>
                                                             <a href="{{ url('detail_donhang',['id' => $tt -> id]) }}"  class="badge badge-success"  > <i class="ion ion-md-create"></i> Sửa</a>
                                                             <button   class="badge badge-warning" onclick="event.preventDefault();chitiethoadon({{ $tt -> id }})" > <i class="ion ion-md-clipboard"></i>Chi tiết</button>
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


                    </div>
                    <!-- end container-fluid -->

                </div>
                <!-- end content -->


<span>{!! $st_courses2 -> render() !!}</span>
                <!-- Footer Start -->

                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>

        <!-- END wrapper -->
        <div id="hoadon" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="col-lg-15">
                        <div class="card">
                            <div class="card-body" id="inhoadon">
                                <div class="card-body" >
                                    <div class="clearfix">
                                        <div class="float-left">
                                            <h4 class="text-right"><img src="assets\admin\images\Capture.PNG" height="40" alt="moltran"></h4>

                                        </div>
                                        <div class="float-right">
                                            <h5>Ba Đờn guitar # <br>
                                                            <strong>09677-234-26</strong>
                                                        </h5>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">



                                            <div class="float-left mt-4">
                                                <address>
                                                            <strong>Anh/Chị:</strong><br>
                                                            Địa chỉ<br>
                                                            Mail<br>
                                                            <abbr title="Phone">P:</abbr> sđt
                                                            </address>
                                            </div>
                                            <div class="float-right mt-4">
                                                <p><strong>Order Date: </strong>ngày</p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table mt-4">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Tên khóa học</th>
                                                            <th>Mã kích hoạt</th>
                                                            <th>Giá</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Khóa học học guitar 30 ngày cùng Hiển Râu</td>
                                                            <td>1122148763</td>
                                                            <td>500.000</td>


                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="border-radius: 0px">
                                        <div class="col-md-3 offset-md-9">
                                            <p class="text-right"><b>Tổng:</b> 500.000</p>

                                            <hr>
                                            <h4 class="text-right">500.000 vnđ</h4>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>

                                        </div>
                                    </div>
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

        <div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="col-lg-15">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Bạn có muốn xóa đơn hàng </h4>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Không</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light xoa">Có </button>
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
        <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{ URL::to('search') }}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html();
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
        </script>

    </body>

    <script type="text/javascript">
        $('#loc_ngay').change(function(){
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('loc_ngay') }}',
                data: {
                    'loc_ngay': $value
                },
                success:function(data){
                    $('tbody').html();
                    $('tbody').html(data);
                }
            });
        })
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>

<script>
        $(document).on("click", ".xoa_st" , function() {
    let id = $(this).data('id');
    $('.xoa').click(function(){
        $.ajax({
            url: 'admin_xoa_stc/'+id,
            dataType : 'json',
            type: 'get',
            success: function (data) {
               console.log(data);
               $("#table").load(" .table_st");
                $('#delete').modal('hide');
            },

        });
    });
  });
</script>
<script>
    function chitiethoadon(id){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });

        $.ajax({
            url:'hoadon/'+ id,
            contentType: false,
            processData: false,
            method: 'get',

        }).done(function(data){
            console.log(data);
            $('#inhoadon').html(data);
            $('#hoadon').modal('show');

        }).fail(function(){

        })
    }

</script>
<script type="text/javascript">
    $(".loc_status").change(function(){
         $value = $(this).val();
         $.ajax({
             type: 'get',
             url: '{{ URL::to('loc_status') }}',
             data: {
                 'loc_status': $value
             },
             success:function(data){
                 $('tbody').html(data);
             }
         });
     })
     $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
 </script>

</html>
