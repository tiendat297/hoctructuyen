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

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <!-- <div class="panel-heading">
                                                        <h4>Invoice</h4>
                                                    </div> -->
                                        <div class="card-body">
                                            <div class="clearfix">
                                                <div class="float-left">
                                                    <h4 class="text-right"><img src="assets\admin\images\Capture.PNG" height="40" alt="moltran"></h4>

                                                </div>


                                                <div class="float-right">
<form action="{{ url('edit_cod') }}" method="POST">
    @csrf
                                                             @foreach ($data as $stc)

                                                    <h5>Mã đơn hàng # <br>
                                                                    <strong>{{ $stc -> id }}</strong>
                                                                </h5>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-12">

                                                    <div class="float-left mt-4">
                                                        <address>
                                                                    <strong>Guitar Ba Đờn.</strong><br>
                                                                   Số 10 Tạ Quang Bửu, Bách Khoa<br>
                                                                    Hai Bà Trưng, Hà Nội<br>
                                                                    <abbr title="Phone">P:</abbr> 0967723426
                                                                    </address>
                                                    </div>
                                                    <div class="float-right mt-4">
                                                        <p><strong>Order Date: </strong>{{ $stc -> created_at }}</p>

                                                        <p class="mt-2"><strong>Order ID: </strong> #<input type="text" class="form-control col-md-3" readonly="" name="id" value="{{ $stc -> id }}" parsley-trigger="change" required="" ></p>
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
                                                                    <th>Tên học viên</th>
                                                                    <th>Tên khóa học</th>
                                                                    <th>Giá</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr>
                                                                    <td>1</td>
                                                                    <td><input type="text" class="form-control" name="name" value="{{ $stc -> name }}" parsley-trigger="change" required="" ></td>
                                                                    <td><input type="text" class="form-control" name="courses_name" value="{{ $stc -> courses_name }}" parsley-trigger="change" required="" ></td>
                                                                    <td><input type="fload" class="form-control" name="price" value="{{ $stc -> price }}" parsley-trigger="change" required="" ></td>


                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" style="border-radius: 0px">
                                                <div class="col-md-3 offset-md-9">

                                                    <h4 class="text-right">{{ number_format($stc->price, 0) }} vnđ</h4>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-print-none">
                                                <div class="float-right">

                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Lưu thông tin</button>
                                                </div>
                                            </div>
                                        </div>
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

                                    <label  for="example-date">Trạng thái</label>
                                    <select class="form-control col-md-9" name="status">
                                        <option value="{{ $stc -> status }}">@if($stc -> status == 1)
                                            {{ "Confirm" }}
                                           @elseif($stc -> status == 0)
                                            {{ "wait" }}
                                            @else
                                            {{ "Active" }}
                                            @endif
                                        </option>
                                        <option value="0">Wait</option>
                                        <option value="1">Confirm</option>
                                        <option value="2">Active</option>

                                    </select>
                                </div>
                                <label  for="example-date">Mã kích hoạt khóa học:</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="example-date"  type="text" readonly="" name="search" value="{{ $stc -> cod }}">
                                </div>
                                <div class="col-md-9">

                                    <button type="button" data-toggle="modal" @if($stc -> cod) data-target="" @else data-target="#cod" @endif  class="btn btn-success btn-rounded waves-effect width-md waves-light">Tạo mã kích hoạt</button>
                                </div>
</form>
                        </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                    <div class="form-group row">
                                        <label for="example-date" class="text-danger">Thông tin khách hàng</label>
                                    </div>

                                        <label for="example-date" class="">{{ $stc -> name }}</label><br>
                                        <label for="example-date" class="">{{ $stc -> address }}</label><br>

                                        <label for="example-date" class="">{{ $stc -> phone }}</label><br>
                                        <label for="example-date" class="">{{ $stc -> email }}</label><br>


                            </div>
                        </div>
                    </div>


                </div>
                <!-- Footer Start -->
                <!-- end Footer -->
            </div>
            @endforeach
            <!-- end card -->

        </div>
        <!-- end col -->
    </div>
    <div id="cod" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="col-lg-15">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ url('taoma') }}" method="POST">
                                @csrf
                            <label for="example-date" class="">Đơn hàng số</label>
                            <input type="text" class="form-control col-md-9" readonly="" name="id" value="{{ $stc -> id }}" parsley-trigger="change" required="" >
                            <label for="example-date" class="">Mã cod</label>
                            <select class="form-control col-md-9" name="cod">
                                @foreach ($data2 as $cod)


                                <option value="{{ $cod -> cod }}">{{ $cod -> cod }} </option>
                                @endforeach
                            </select>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Hủy</button>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light del">Tạo mã </button>
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

            </div>
        </div>

        <!-- END wrapper -->
        <!-- Right bar overlay-->
        <script src="assets\admin\libs\bootstrap-touchspin\jquery.bootstrap-touchspin.min.js"></script>
        @include('admin.layouts.footer')
    </body>

</html>
