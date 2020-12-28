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
                                        <h4 class="text-pink">@foreach ($data3 as $courses)
                                            {{ $courses -> name }}
                                        @endforeach</h4>
                                        <h4 class="header-title mb-4">DANH SÁCH BÀI HỌC</h4>



                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <div class="dataTables_length" id="datatable_length">
                                                    <label>Search:<input type="text" id="search" name="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable"></label>
                                                        </div>
                                            </div>

                                        </div>

                                        <div class="table-responsive giangvien" id="table_baihoc">

                                            <table  id="tech-companies-1 st_table" class="table table-striped mb-0 data-baihoc">
                                                <thead>
                                                    <th>Stt</th>
                                                    <th>Bài số</th>
                                                    <th>Tên bài học</th>
                                                    <th><button type="button" class="btn btn-icon waves-effect waves-light btn-warning" data-toggle="modal" onclick="event.preventDefault();them_chapter({{ $data2   }})" > <i class="ion ion-md-add"></i> THÊM MỚI CHƯƠNG HỌC </button></th>
                                                </thead>

                                                <tbody>
                                    @foreach ($data as $chapter)

                                    <?php $i = 1 ;?>
                                                        <td id="{{ $chapter -> id }}" colspan="3"><b><h4>CHƯƠNG {{ $chapter -> sort_chapter }}: {{  $chapter -> name_chapter }}</h4></b></td>
                                                        <td colspan="2">
                                                          <button  class="btn badge-dark update_chapter" onclick="event.preventDefault();open_sua_chapter({{ $chapter -> id }} , {{ $chapter -> sort_chapter }})"  > <i class="ion ion-md-create"></i> Sửa chương</button>
                                                          <button href=""  class="btn  badge-primary" data-toggle="modal" onclick="event.preventDefault();open_them_Baihoc({{ $data2   }}, {{ $chapter -> id }})" > <i class="ion ion-md-clipboard"></i>Thêm bài học</button>
                                                      </td>
                                            @foreach ($chapter -> baihoc as $baihoc )
                                                    <tr >
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $baihoc -> sort }}</td>
                                                        <td>{{ $baihoc -> name }}</td>
                                                        <td> <button class="badge badge-danger btn-sm xoa_bai_hoc" data-id="{{  $baihoc -> id }}"  id="sa-success" data-toggle="modal" data-target="#delete"  ><i class="fas fa-archive"></i> Xóa</button>
                                                             <button class="badge badge-success" onclick="event.preventDefault();open_sua_baihoc({{ $baihoc -> id }} )"> <i class="ion ion-md-create"></i> Sửa</button>
                                                        </td>
                                                    </tr>
                                                     <?php $i++ ;?>
                                            @endforeach
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
    <!-- Thêm bài học vào các chương học -->
        <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="col-lg-15">
                        <div class="card">
                            <div class="card-body" id="insert_cod">
                                <h4 class="header-title mb-4">Thông tin bài học</h4>

                                <form  id="them_cod" action="" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Mã khóa học<span class="text-danger">*</span></label>
                                        <input type="text" name="courses_id" readonly=""    class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số chương học<span class="text-danger">*</span></label>
                                        <input type="text" name="chapter_id" readonly="" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="userName">Tên bài học<span class="text-danger">*</span></label>
                                        <input type="text" name="name" parsley-trigger="change"  placeholder="Tên bài học" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số thứ tự<span class="text-danger">*</span></label>
                                        <input  type="fload" value="" name ="sort" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="userName">Video file<span class="text-danger">*</span></label>
                                        <input type="text" name="video_file" parsley-trigger="change"  placeholder="Video files" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label for="passWord2">Mô tả<span class="text-danger">*</span></label>
                                        <div class="col-lg-14">
                                            <textarea class="form-control ckeditor" rows="5" id="example-textarea" type="text" name="description" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="" for="example-date">Trạng thái hoạt động</label>
                                        <select class="" name="status">

                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>

                                        </select>
                                    </div>

                                </div>




                                    </div>

                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light " onclick="event.preventDefault();them_cod()">Lưu thông tin</button>
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
 <!-- Form sửa thông tin chương học -->
        <div id="edit_chapter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="col-lg-15" id="fr_chapter">
                        <div class="card">
                            <div class="card-body" id="div_sua_chapter">
                                <h4 class="header-title mb-4">Thông tin chương học</h4>

                                <form  id="sua_chapter" action="" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Mã chương học<span class="text-danger">*</span></label>
                                        <input type="text" name="id"  readonly=""    class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="userName">Tên chương học<span class="text-danger">*</span></label>
                                        <input type="text" name="name_chapter"  parsley-trigger="change"   class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Chương số<span class="text-danger">*</span></label>
                                        <input  type="fload"  name ="sort_chapter"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="passWord2">Mô tả<span class="text-danger">*</span></label>
                                        <div class="col-lg-14">
                                            <textarea class="form-control ckeditor" rows="5" id="example-textarea" type="text" name="description" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="" for="example-date">Trạng thái hoạt động</label>
                                        <select class="" name="status">

                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>

                                        </select>
                                    </div>

                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light update" onclick="event.preventDefault();update()"  >Lưu thông tin</button>
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
        <div id="them_chapter" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="col-lg-15" id="fr_them_chapter">
                        <div class="card">
                            <div class="card-body" id="div_them_chapter">
                                <h4 class="header-title mb-4">Thông tin chương học</h4>

                                <form enctype="multipart/form-data" id="them_chapter" action="" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="">Mã khóa học<span class="text-danger">*</span></label>
                                        <input type="text" name="course_id"  readonly=""    class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="userName">Tên chương học<span class="text-danger">*</span></label>
                                        <input type="text" name="name_chapter"  parsley-trigger="change"   class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Chương số<span class="text-danger">*</span></label>
                                        <input  type="fload"  name ="sort_chapter"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="passWord2">Mô tả<span class="text-danger">*</span></label>
                                        <div class="col-lg-14">
                                            <textarea class="form-control ckeditor" rows="5" id="example-textarea" type="text" name="description" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="" for="example-date">Trạng thái hoạt động</label>
                                        <select class="" name="status">

                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>

                                        </select>
                                    </div>

                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary waves-effect waves-light update" onclick="event.preventDefault();bt_them_chapter()"  >Lưu thông tin</button>
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
<!-- Xóa bài học -->
        <div id="delete" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="col-lg-15">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Bạn có muốn xóa bài học </h4>
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
        <div id="edit_baihoc" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="col-lg-15">
                        <div class="card">
                            <div class="card-body" id="div_edit_baihoc">
                                <h4 class="header-title mb-4">Thông tin bài học</h4>

                                <form enctype="multipart/form-data" id="fr_edit_baihoc" action="" method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="">Mã bài học<span class="text-danger">*</span></label>
                                        <input type="text" name="id" readonly="" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="userName">Tên bài học<span class="text-danger">*</span></label>
                                        <input type="text" name="name" parsley-trigger="change"  placeholder="Tên bài học" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số thứ tự<span class="text-danger">*</span></label>
                                        <input  type="fload" value="" name ="sort" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label for="passWord2">Mô tả<span class="text-danger">*</span></label>
                                        <div class="col-lg-14">
                                            <textarea class="form-control ckeditor" rows="5" id="example-textarea" type="text" name="description" ></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <label class="" for="example-date">Trạng thái hoạt động</label>
                                        <select class="" name="status">

                                            <option value="1">Hiện</option>
                                            <option value="0">Ẩn</option>

                                        </select>
                                    </div>

                                </div>
                                    </div>

                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                                        <button type="button" onclick="event.preventDefault();update_baihoc()"  class="btn btn-primary waves-effect waves-light ">Lưu thông tin</button>
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

<script>
    // thêm bài học
        function them_cod(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });
        $.ajax({
            url: 'insert_baihoc',
            data: new FormData($("#insert_cod form")[0]),
            contentType: false,
            processData: false,
            method: 'post',

        }).done(function(data){
            console.log(data);
            $("#table_baihoc").load(" .data-baihoc");
            $('#edit').modal('hide');

            toastr.success('thành công','thanh cong');

        }).fail(function(data){

        });
     }
    function open_them_Baihoc(courses_id,chapter_id){

        $("#them_cod input[name=courses_id]").val(courses_id);
        $("#them_cod input[name=chapter_id]").val(chapter_id);
        $('#edit').modal('show');
     }

</script>
<script>
     // sửa chương học
    function open_sua_chapter(id,sort_chapter){
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });
     $.ajax({

        url: 'open_sua_chapter/' + id,
        contentType: false,
        processData: false,
        method: 'get',


     }).done(function(data){
        console.log(data);
        $('#div_sua_chapter').html(data);
        $('#edit_chapter').modal('show');

     }).fail(function(data){

     });
    }
</script>
<script>
    // thêm mới chương học
   function them_chapter(courses_id){
    $("#them_chapter input[name=course_id]").val(courses_id  );
    $('#them_chapter').modal('show');
   }
</script>
<script>
    function bt_them_chapter(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $.ajax({
        url:'them_chapter',
        data: new FormData($("#div_them_chapter form")[0]),
        contentType: false,
        processData: false,
        method: 'post',
    }).done(function(data){
        console.log(data);

        $("#table_baihoc").load(" .data-baihoc");
            $('#them_chapter').modal('hide');
    }).fail(function(data){

    })
    }
</script>
<script>
    // update chương học
    function update(){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
    $.ajax({
        url:'update_chapter',
        data: new FormData($("#div_sua_chapter form")[0]),
        contentType: false,
        processData: false,
        method: 'post',

    }).done(function(data){
        console.log(data);

        $("#table_baihoc").load(" .data-baihoc");
            $('#edit_chapter').modal('hide');

    }).fail({

    });

    }
</script>
<script>
   $(document).on("click", ".xoa_bai_hoc" , function() {
    let id = $(this).data('id');
    $('.xoa').click(function(){
        $.ajax({
            url: 'xoa_bai_hoc/'+id,
            dataType : 'json',
            type: 'get',
            success: function (data) {
               console.log(data);
               $("#table_baihoc").load(" .data-baihoc");
                $('#delete').modal('hide');
            },

        });
    });
  });
</script>
<script>
    function open_sua_baihoc(id){
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
        });

        $.ajax({
            url: 'open_sua_baihoc/' + id,
            contentType: false,
            processData: false,
            method: 'get',
        }).done(function(data){
            console.log(data);
            $('#div_edit_baihoc').html(data);
            $('#edit_baihoc').modal('show');

        }).fail(function(){

        })
    }
</script>

<script>
       $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    function update_baihoc(){
        $.ajax({
        url:'update_baihoc',
        data: new FormData($("#div_edit_baihoc form")[0]),
        contentType: false,
        processData: false,
        method: 'post',
    }).done(function(data){
        console.log(data);

        $("#table_baihoc").load(" .data-baihoc");
            $('#edit_baihoc').modal('hide');
    }).fail(function(data){

    })
    }

</script>
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('baihoc_search') }}',
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
</html>
