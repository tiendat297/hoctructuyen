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

                <!-- end content -->

                <div class="row">
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-4 header-title text-danger">Thông tin khóa học</h4>

                                @if (session('admin_thongbao'))
                                <div class="alert alert-icon alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <i class="mdi mdi-check-all mr-2"></i>
                                    <strong>Well done!</strong>{{ session('admin_thongbao') }}
                                </div>
                                            @endif
                                <form action="{{ "suacourses" }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                @foreach ($data as $courses)
                <div class="form-group row">
                    <label class="col-lg-2 col-form-label">ID</label>
                    <div class="col-lg-10">
                        <input type="text" class="form-control" readonly="" name="id" value="{{ $courses -> id }}">
                    </div>
                </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Tên khóa học</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="name" value="{{ $courses -> name }}" parsley-trigger="change" required="" >
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Mô tả khóa học </label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control ckeditor" id="editor1" rows="10" cols="80" name="description" parsley-trigger="change" required="">  {{ $courses -> description }}  </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label" for="example-textarea">Ảnh </label>
                                        <div class="col-lg-10">
                                           <img  style="width:400px; height:200px;" src="assets\admin\images\courses\{{ $courses -> images }}" alt=""/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label  for="example-fileinput">Thay ảnh khóa học</label>
                                        <div class="col-lg-10">
                                            <input type="file" name="images"  >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-lg-2 col-form-label">Link video hiển thị</label>
                                        <div class="col-lg-10">
                                            <input type="text" class="form-control" name="video_thuml" value="{{ $courses -> video_thuml }}" parsley-trigger="change" required="" >
                                        </div>
                                    </div>
                            </div>
                            <div class="card-body">
                                <h4 class="mb-4 header-title text-danger">Giá khóa học</h4>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity" class="col-form-label">Giá gốc</label>
                                        <input type="fload" class="form-control" id="inputCity" name="price_root" value="{{ $courses->price_root }}" parsley-trigger="change" required="">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputCity" class="col-form-label">Giá khuyến mãi</label>
                                        <input type="fload" class="form-control" id="inputCity" name="price_sale" value="{{ $courses->price_sale }}" parsley-trigger="change" required="">
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group row">

                                    <label  for="example-date">Trạng thái khóa học</label>
                                    <select class="form-control col-md-9" name="status">
                                        <option value="{{ $courses -> status }}">@if($courses -> status == 1)
                                            {{ "Hiện" }}
                                            @else
                                            {{ "Ẩn" }}
                                            @endif
                                        </option>
                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>

                                    </select>
                                </div>
                                <div class="form-group row">

                                    <label  for="example-date">Phí khóa học</label>
                                    <select class="form-control col-lg-10" name="free">
                                        <option value="{{ $courses -> free }}">@if($courses -> free == 1)
                                            {{ "Miễn phí" }}
                                            @else
                                            {{ "Mất phí" }}
                                            @endif
                                        </option>
                                        <option value="1">Miễn phí</option>
                                        <option value="0">Mất phí</option>

                                    </select>
                                </div>
                                    <label class="control-label">Thứ tự hiển thị</label>
                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">

                                                        <input data-toggle="touchspin" type="text" value="{{$courses -> sort}}" name = "sort" class="form-control">
                                     </div>


                        </div>
                    </div>
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group row video">

                                        <iframe width="560" height="315" src="https://www.youtube.com/embed/{{ $courses -> video_thuml }}?controls=0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    <style type="iframe/css">
                                        .video {
                                            width="260"
                                             height="180"
                                                }

                                     </style>

                            </div>



                        </div>


                @endforeach

                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group row">
                                        <label for="example-date" class="text-danger">Thuộc nhóm khóa học</label>
                                        <select class="form-control col-lg-10" name="group_courses_id">
                                            @foreach ($group as $nhom)


                                            <option value="{{ $nhom -> group_courses_id }}"> {{ $nhom -> name }}</option>
                                            @endforeach
                                            @foreach ($array[1] as $gv )


                                            <option value="{{ $gv -> id }}">{{ $gv -> name }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date">Giảng viên</label>
                                        <select class="form-control col-lg-10" name="giangvien">
                                            <option value="{{ $courses -> giang_vien_id }}">{{ $courses -> hoten }}</option>
                                            @foreach ($array[0] as $gv )


                                            <option value="{{ $gv -> id }}">{{ $gv -> hoten }}</option>

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group row">
                                        <label for="example-date">Từ khóa tìm kiếm</label>
                                        <div class="col-md-9">
                                            <input class="form-control" id="example-date"  type="text" name="search" value="{{ $courses -> search }}">
                                        </div>
                                    </div>


                            </div>



                        </div>





                    </div>

                    <button type="submit" class="btn btn-icon waves-effect waves-light btn-warning" name="submit"> <i class="ion ion-md-add"></i>Lưu thông tin </button>
                </div>
                <!-- Footer Start -->
                <!-- end Footer -->


            </div>

            <!-- end card -->
        </form>
        </div>
        <!-- end col -->
    </div>
            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->




        <!-- Right bar overlay-->
        <script src="assets\admin\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js"></script>

        @include('admin.layouts.footer')
    </body>

</html>
