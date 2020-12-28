<?php


namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\admin;
use App\banner;
use App\cod_courses;
use App\comment;
use App\courses;
use App\Exports\record_courses;
use App\Exports\student_coursesExport;
use App\giangvien;
use App\group_courses;
use App\student_courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpParser\Node\Stmt\Return_;
use Symfony\Component\HttpFoundation\Session\Session as HttpFoundationSessionSession;

session_start();
class controller_admin extends Controller

{
    // đưa thông tin ra trang chủ
    public function home()

    {
        $st_courses = DB::table('student_course')
            ->join('users', 'users.id', '=', 'student_course.users_id')
            ->where('status', 0)
            ->select('student_course.id', 'users_id', 'name', 'courses_id', 'courses_name', 'status', 'cod', 'price', 'payments', 'student_course.created_at')
            ->orderByDesc('student_course.created_at')
            ->paginate(15);


        $data = DB::table('courses')->count();
        $data1 = DB::table('giangvien')->count();
        $data2 = DB::table('users')->count();
        $data3 = DB::table('comment')->count();
        $data4 = DB::table('student_course')->count();
        $data5 = DB::table('student_course')->where('status', 0)->count();
        $array = array(
            $array[0] = $data,
            $array[1] = $data1,
            $array[2] = $data2,
            $array[3] = $data3,
            $array[4] = $data4,
            $array[5] = $data5,
        );
        return view('admin.pages.dash', ['array' => $array], ['st_courses' => $st_courses]);
    }
    // Thông tin trang danh sách khóa học
    public function courses()
    {
        $admin_id = session()->get('admin_id');
        if ($admin_id) {
            $data = courses::paginate(10);
            $array = DB::table('courses')->count();
            return view('admin.pages.index', ['data' => $data], ['array' => $array]);
        } else {
            return redirect('login_admin');
        }
    }

    // thông tin danh sách giảng viên
    public function giangvien()
    {
        $admin_id = session()->get('admin_id');
        if ($admin_id) {

            $data = giangvien::paginate(10);
            $data2 = DB::table('giangvien')->count();

            return view('admin.pages.giangvien', ['data' => $data], ['data2' => $data2]);
        } else {
            return redirect('login_admin');
        }
    }
    // màn hình nhập của admin
    public function login_admin()
    {
        return view('admin.pages.login');
    }
    // xử lí đăng nhập của admin
    public function home_admin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $result = DB::table('admin')->where('username', $username)->where('password', $password)->first();
        if ($result) {
            session()->put('admin_name', $result->name);
            session()->put('admin_id', $result->id);

            return redirect('courses_admin');
        } else {
            $request->session()->put('note', 'Mật khẩu hoặc Password không đúng mời đăng nhập lại');
            return redirect('login_admin');
        }
    }
    // logout
    public function logout_admin()
    {
        session()->forget('admin_id');
        session()->forget('admin_name');
        return redirect('login_admin');
    }

    // Thêm sửa xóa giảng viên--------------------------------------------------------------
    // View sửa
    public function edit_gv($id)
    {
        $data = DB::table('giangvien')->where('id', '=', $id)->get();
        $data2 = DB::table('courses')->join('giangvien', 'courses.giang_vien_id', 'giangvien.id')
            ->where('giangvien.id', '=', $id)
            ->select('courses.id', 'name', 'group_courses_id', 'courses.status', 'price_sale', 'courses.images', 'free')->get();
        return view('admin\pages\editgiangvien', ['data' => $data], ['data2' => $data2]);
    }
    // xử lí sửa
    public function edit(Request $request)
    {


        $id = $request->id;
        $hoten = $request->hoten;
        $description = $request->description;
        $phone = $request->phone;
        $address = $request->address;
        $status = $request->status;
        $ext  = $request->file('images');


        if ($ext) {
            $images = $ext->getClientOriginalName();
            $ext->move('assets/admin/images', $images);
            DB::table('giangvien')->where('id', '=', $id)->update(['hoten' => $hoten]);
            DB::table('giangvien')->where('id', '=', $id)->update(['description' => $description]);
            DB::table('giangvien')->where('id', '=', $id)->update(['phone' => $phone]);
            DB::table('giangvien')->where('id', '=', $id)->update(['address' => $address]);
            DB::table('giangvien')->where('id', '=', $id)->update(['status' => $status]);
            DB::table('giangvien')->where('id', '=', $id)->update(['images' => $images]);
            return back();
        } else {
            DB::table('giangvien')->where('id', '=', $id)->update(['hoten' => $hoten]);
            DB::table('giangvien')->where('id', '=', $id)->update(['description' => $description]);
            DB::table('giangvien')->where('id', '=', $id)->update(['phone' => $phone]);
            DB::table('giangvien')->where('id', '=', $id)->update(['status' => $status]);
            DB::table('giangvien')->where('id', '=', $id)->update(['address' => $address]);
            session()->flash('admin_thongbao', 'Đã sửa thông tin giảng viên ' . $request->hoten . ' thành công');
            return back();
        }
    }
    // thêm mới giảng viên
    public function themgv(Request $request)
    {

        $muakhoahoc = new giangvien();
        $muakhoahoc->hoten = $request->hoten;
        $muakhoahoc->phone = $request->phone;
        $muakhoahoc->address = $request->address;
        $muakhoahoc->description = $request->description;
        $muakhoahoc->status = $request->status;
        $ext  = $request->file('images');
        $images = $ext->getClientOriginalName();
        $ext->move('assets/admin/images', $images);
        $muakhoahoc->images = $images;
        $muakhoahoc->save();
        session()->flash('admin_thongbao', 'Đã thêm giảng viên ' . $request->hoten . ' thành công');
        return   redirect('giangvien');
    }
    // xóa giảng viên
    public function delete($id)
    {
        DB::table('giangvien')->where('id', '=', $id)->delete();
        session()->flash('admin_thongbao', 'Đã xóa  giảng viên thành công');
        return response()->json(['success' => 'Xóa thành công']);
    }
    // Thêm xóa sửa student courses - --------------------------------------------
    // Đổ thông tin
    public function student_courses_admin()
    {
        $st_courses = DB::table('student_course')
            ->join('users', 'users.id', '=', 'student_course.users_id')
            ->where('status', 0)
            ->select('student_course.id', 'users_id', 'name', 'courses_id', 'courses_name', 'status', 'cod', 'price', 'payments', 'student_course.created_at')
            ->orderByDesc('student_course.created_at')
            ->paginate(15);
        $st_courses2 = DB::table('student_course')
            ->join('users', 'users.id', '=', 'student_course.users_id')
            ->where('status', 1)->orWhere('status', 2)
            ->select('student_course.id', 'users_id', 'name', 'courses_id', 'courses_name', 'phone', 'status', 'cod', 'price', 'payments', 'student_course.created_at')
            ->orderByDesc('student_course.status', 'student_course.created_at')
            ->paginate(20);


        return view('admin.pages.student_courses', ['st_courses' => $st_courses], ['st_courses2' => $st_courses2]);
    }
    // xóa đơn hàng học sinh đặt
    public function admin_xoa_stc($id)
    {
        DB::table('student_course')->where('id', '=', $id)->delete();
        session()->flash('admin_thongbao', 'Đã xóa thành công đơn hàng' . $id);
        return Response()->json(['succsess' => 'Xóa thành công']);
    }
    // Thêm xóa sửa khóa học-------------------------------------------
    // view khóa học
    public function edit_courses($id)
    {
        $data = DB::table('courses')
            ->join('giangvien', 'courses.giang_vien_id', 'giangvien.id')

            ->where('courses.id', '=', $id)
            ->select('courses.id', 'name', 'sort', 'video_thuml', 'free', 'courses.description', 'search', 'price_root', 'price_sale', 'courses.status', 'hoten', 'courses.images', 'courses.giang_vien_id')
            ->get();

        $giangvien = DB::table('giangvien')->get();
        $group_courses = DB::table('group_courses')->get();
        $array = array(
            $array[0] = $giangvien,
            $array[1] = $group_courses,

        );
        return view('admin\pages\editcourses', ['data' => $data], ['array' => $array]);
    }
    // view sửa khóa học
    public function them_courses()
    {
        $data = DB::table('giangvien')->get();
        $data2 = DB::table('group_courses')->get();
        return view('admin\pages\insertcourses', ['data' => $data], ['data2' => $data2]);
    }
    // Thêm mới khóa học------------------------------
    public function insert_courses(Request $request)
    {
        $images = $request->file('images');
        $images2 = $images->getClientOriginalName();
        $images->move('assets/admin/images/courses', $images2);
        $newcourses = new courses();
        $newcourses->name = $request->name;
        $newcourses->description = $request->description;
        $newcourses->price_root = $request->price_root;
        $newcourses->price_sale = $request->price_sale;
        $newcourses->status = $request->status;
        $newcourses->free = $request->free;
        $newcourses->sort = $request->sort;
        $newcourses->images = $images2;
        $search = $request->name . $request->description . $request->price_root . $request->price_sale;

        $newcourses->giang_vien_id = $request->giang_vien_id;
        $newcourses->search = $search;
        $newcourses->save();
        session()->flash('admin_thongbao', 'Đã thêm khóa học ' . $request->name . ' thành công');
        return redirect('courses_admin');
    }
    // sửa khóa học
    public function suacourses(Request $request)
    {
        $id = $request->id;
        $images = $request->file('images');
        if ($images) {
            $images2 = $images->getClientOriginalName();
            $images->move('assets/admin/images/courses', $images2);
            DB::table('courses')->where('id', '=', $id)->update(['name' => $request->name]);
            DB::table('courses')->where('id', '=', $id)->update(['group_courses_id' => $request->group_courses_id]);
            DB::table('courses')->where('id', '=', $id)->update(['sort' => $request->sort]);
            DB::table('courses')->where('id', '=', $id)->update(['images' => $images2]);
            DB::table('courses')->where('id', '=', $id)->update(['free' => $request->free]);
            DB::table('courses')->where('id', '=', $id)->update(['description' => $request->description]);
            DB::table('courses')->where('id', '=', $id)->update(['search' => $request->search]);
            DB::table('courses')->where('id', '=', $id)->update(['description' => $request->description]);
            DB::table('courses')->where('id', '=', $id)->update(['giang_vien_id' => $request->giangvien]);
            DB::table('courses')->where('id', '=', $id)->update(['price_root' => $request->price_root]);
            DB::table('courses')->where('id', '=', $id)->update(['video_thuml' => $request->video_thuml]);
            DB::table('courses')->where('id', '=', $id)->update(['price_sale' => $request->price_sale]);
            DB::table('courses')->where('id', '=', $id)->update(['status' => $request->status]);
            session()->flash('admin_thongbao', 'Đã sửa thông tin khóa học ' . $request->name . ' thành công');

            return back();
        } else {
            DB::table('courses')->where('id', '=', $id)->update(['name' => $request->name]);
            DB::table('courses')->where('id', '=', $id)->update(['group_courses_id' => $request->group_courses_id]);
            DB::table('courses')->where('id', '=', $id)->update(['sort' => $request->sort]);
            DB::table('courses')->where('id', '=', $id)->update(['free' => $request->free]);
            DB::table('courses')->where('id', '=', $id)->update(['description' => $request->description]);
            DB::table('courses')->where('id', '=', $id)->update(['search' => $request->search]);
            DB::table('courses')->where('id', '=', $id)->update(['video_thuml' => $request->video_thuml]);
            DB::table('courses')->where('id', '=', $id)->update(['description' => $request->description]);
            DB::table('courses')->where('id', '=', $id)->update(['giang_vien_id' => $request->giangvien]);
            DB::table('courses')->where('id', '=', $id)->update(['price_root' => $request->price_root]);
            DB::table('courses')->where('id', '=', $id)->update(['price_sale' => $request->price_sale]);
            DB::table('courses')->where('id', '=', $id)->update(['status' => $request->status]);
            session()->flash('admin_thongbao', 'Đã sửa thông tin khóa học ' . $request->name . ' thành công');
            return back();
        };
    }

    public function delete_courses($id)
    {
        DB::table('courses')->where('id', '=', $id)->delete();

        return response()->json(['succsess' => 'Xóa thành công']);
    }

    // thêm xóa sửa đơn hàng, xác nhận, tạo mã kích hoạt
    // đổ dữ liệu ra trang sửa
    public function detail_donhang($id)
    {
        $st_courses = DB::table('student_course')
            ->join('users', 'users.id', '=', 'student_course.users_id')
            ->select('student_course.id', 'name', 'courses_id', 'courses_name', 'status', 'cod', 'price', 'payments', 'student_course.created_at', 'phone', 'address', 'email')
            ->where('student_course.id', '=', $id)->get();

        foreach ($st_courses as $dat) {

            $cod = DB::table('cod_courses')
                ->where('courses_id', '=', $dat->courses_id)
                ->where('status', '=', 0)
                ->get();
        }
        return view('admin\pages\detail_donhang', ['data' => $st_courses], ['data2' => $cod]);
    }

    // sửa thông tin đơn hàng
    public function edit_cod(Request $request)
    {
        $id = $request->id;
        DB::table('student_course')->where('id', '=', $id)->update(['price' => $request->price]);
        DB::table('student_course')->where('id', '=', $id)->update(['status' => $request->status]);
        $hoadon = DB::table('student_course')
            ->join('users', 'users.id', '=', 'student_course.users_id')
            ->select('student_course.id', 'name', 'courses_id', 'courses_name', 'status', 'cod', 'price', 'payments', 'student_course.created_at', 'phone', 'address', 'email')
            ->where('student_course.id', '=', $id)->get();
        return view('admin.pages.hoadon', ['data' => $hoadon]);
    }

    // thêm cod vào đơn hàng
    public function taoma(Request $request)
    {
        $id = $request->id;
        $cod = $request->cod;
        DB::table('student_course')->where('id', '=', $id)->update(['cod' => $request->cod]);
        DB::table('cod_courses')->where('cod', '=', $cod)->update(['status' => 1]);
        DB::table('student_course')->where('id', '=', $id)->update(['status' => 1]);

        return   back();
    }
    // Tạo cod

    // Quản lí cod
    public function qlcod()
    {

        $courses = DB::table('courses')->get();

        $num_cod = DB::select('SELECT courses_id, courses.name, COUNT(cod) as sl FROM cod_courses inner join courses where cod_courses.courses_id = courses.id and cod_courses.status = 0 GROUP BY courses_id, courses.name');
        return view('admin.pages.cod', ['data2' => $num_cod], ['data' => $courses]);
    }
    public function dat()
    {



        $sl = 5;
        $courses_id = 1001;
        for ($i = 0; $i < $sl; $i++) {
            $data = [
                'cod' => mt_rand(),
                'courses_id' => $courses_id,
                'status' => 0,


            ];
            cod_courses::create($data);
        }
    }
    // thêm mã
    public function them_cod(Request $request)
    {



        $sl = $request->sl;
        $courses_id = $request->courses_id;
        for ($i = 0; $i < $sl; $i++) {
            $data = [
                'cod' => mt_rand(),
                'courses_id' => $courses_id,
                'status' => 0,


            ];
            cod_courses::create($data);
        }

        $num_cod = DB::select('SELECT courses_id, courses.name, COUNT(cod) as sl FROM cod_courses inner join courses where cod_courses.courses_id = courses.id and cod_courses.courses_id = ? and cod_courses.status = 0 GROUP BY courses_id, courses.name', [$request->courses_id]);

        $output = '
        <td></td>
        <td>' . $num_cod[0]->courses_id . '</td>
        <td>' . $num_cod[0]->name . '</td>
        <td><button type="button" class="btn btn-outline-dark waves-effect width-md waves-light">' . $num_cod[0]->sl . '</button></td>



        <td><button type="button" class="btn btn-dark btn-rounded waves-effect width-md waves-light" onclick="event.preventDefault();open_them_cod(' . $num_cod[0]->courses_id . ')" data-target="#edit" ><i class="ion ion-md-add"></i> Thêm</a></td>';


        return Response($output);
    }
    // in hóa đơn đã thu tiền
    public function hoadon($id)
    {

        $hoadon = DB::table('student_course')
            ->join('users', 'users.id', '=', 'student_course.users_id')
            ->select('student_course.id', 'name', 'courses_id', 'courses_name', 'status', 'cod', 'price', 'payments', 'student_course.created_at', 'phone', 'address', 'email')
            ->where('student_course.id', '=', $id)->get();
        $output = '
    <div class="card-body inhoadon" >
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
                                                            <strong>Anh/Chị:' . $hoadon[0]->name . '</strong><br>
                                                            ' . $hoadon[0]->address . '<br>
                                                            ' . $hoadon[0]->email . '<br>
                                                            <abbr title="Phone">P:</abbr> ' . $hoadon[0]->phone . '
                                                            </address>
                                            </div>
                                            <div class="float-right mt-4">
                                                <p><strong>Order Date: </strong>' . $hoadon[0]->created_at . '</p>

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
                                                            <td>' . $hoadon[0]->courses_name . '</td>
                                                            <td>' . $hoadon[0]->cod . '</td>
                                                            <td>' . $hoadon[0]->price . '</td>


                                                        </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="border-radius: 0px">
                                        <div class="col-md-3 offset-md-9">
                                            <p class="text-right"><b>Tổng:</b> ' . $hoadon[0]->price . '</p>

                                            <hr>
                                            <h4 class="text-right">' . $hoadon[0]->price . ' vnđ</h4>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="d-print-none">
                                        <div class="float-right">
                                            <a href="javascript:window.print()" class="btn btn-dark waves-effect waves-light mr-1"><i class="fa fa-print"></i></a>

                                        </div>
                                    </div>
                                </div>
    ';

        return Response($output);
    }
    // thêm xóa sửa khóa học
    public function group_courses()
    {
        $group_courses = DB::table('group_courses')->get();
        return view('admin.pages.group_courses', ['data' => $group_courses]);
    }
    public function xoa_group($id)
    {
        DB::table('group_courses')->where('id', '=', $id)->delete();

        return response()->json(['succsess' => 'Xóa thành công']);
    }
    public function them_group(Request $request)
    {
        $newcourses = new group_courses();
        $newcourses->name  = $request->name;
        $newcourses->description = $request->description;
        $newcourses->status = $request->status;
        $newcourses->search = $request->search;
        $newcourses->save();
        return redirect('group_courses');
    }
    // thêm sửa xóa người dùng
    public function users()
    {
        $user = DB::table('users')->paginate(15);
        return view('admin.pages.users', ['data' => $user]);
    }
    public function record()
    {
        $month = DB::table('courses')->select('id', 'name')->get();
        $record = DB::select('SELECT month(student_course.created_at) as thang, count(DISTINCT  student_course.users_id) as hv ,
    count(student_course.id) as donhang, COUNT(student_course.courses_id) as sl,
    SUM(student_course.price) as tong FROM student_course
    GROUP BY month(student_course.created_at)');

        $record2  = DB::select('SELECT month(student_course.created_at) as thang,

    SUM(student_course.price) as sales FROM student_course
    GROUP BY month(student_course.created_at)');
        $result[] = ['Tháng', 'Doanh số(triệu đồng)'];
        foreach ($record2 as $key => $value) {
            $result[++$key] = [$value->thang,  (int)$value->sales];
        }


        return view('admin\pages\recordmoth', ['data' => $record, 'data2' => $month])->with('visitor', json_encode($result));
    }
    public function record_course()
    {
        $month = DB::select('SELECT DISTINCT month(created_at) as thang FROM student_course');
        $record = DB::select('SELECT courses_id, courses_name,COUNT(DISTINCT users_id) as hocvien,
     COUNT(courses_id) as sl_ban, SUM(price) as tong FROM student_course GROUP BY courses_name, courses_id');


        $record2 = DB::select('SELECT  courses_name, COUNT(courses_id) as sl_ban,
      SUM(price) as sale FROM student_course GROUP BY courses_name order by sale DEsc ');
        $result[] = ['courses_name', 'Doanh số(triệu đồng)', 'Số lượng bán'];
        foreach ($record2 as $key => $value) {
            $result[++$key] = [$value->courses_name,  (int)$value->sale, (int)$value->sl_ban];
        }


        return view('admin\pages\test', ['data' => $record, 'data2' => $month])->with('visitor', json_encode($result));;
    }
    // live search
    public function search(Request $request)
    {
        $i = 1;
        if ($request->ajax()) {
            $output = '';
            $st_courses2 = DB::table('student_course')
                ->join('users', 'users.id', '=', 'student_course.users_id')

                ->where('courses_name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('name', 'LIKE', '%' . $request->search . '%')
                ->orWhere('courses_id', $request->search)
                ->orWhere('users.phone', 'LIKE', '%' . $request->search . '%')
                ->select('student_course.id', 'users_id', 'name', 'courses_id', 'courses_name', 'phone', 'status', 'cod', 'price', 'payments', 'student_course.created_at')
                ->get();

            if ($st_courses2) {
                foreach ($st_courses2 as $key => $tt1) {
                    $output .= '<tr>
                  <td>' . $i++ . ' </td>
                  <td>' . $tt1->id . '</td>
                  <td>' . $tt1->phone . '</td>
                  <td>' . $tt1->name . '</td>
                  <td>' . $tt1->courses_id . '</td>
                  <td>' . $tt1->courses_name . '</td>
                  <td>' . $tt1->status . '</td>
                  <td>' . $tt1->cod . '</td>
                  <td>' . $tt1->price . '</td>
                  <td>' . $tt1->payments . '</td>
                  <td>' . $tt1->created_at . '</td>
                  <td><button data-id="' . $tt1->id . '" data-toggle="modal" data-target="#delete"  class="badge badge-danger xoa_st"  id="sa-warning"  ><i class="fas fa-archive"></i> Xóa</button>
                  <button   class="badge badge-warning" onclick="event.preventDefault();chitiethoadon(' . $tt1->id . ')" > <i class="ion ion-md-clipboard"></i>Chi tiết</button>
                  </td>
                  </tr>';
                }
            }

            return Response($output);
        }
    }
    public function suanhom($id)
    {
        $data = DB::table('group_courses')->where('id', $id)->get();
        $data2 = DB::table('courses')
            ->where('group_courses_id', $id)->get();
        return view('admin.pages.editgroupcourses', ['data' => $data, 'data2' => $data2]);
    }
    public function banner()
    {
        $banner = DB::table('banner')->get();
        return view('admin.pages.banner', ['data' => $banner]);
    }
    // xuất ra excel
    public function excel_month(Request $request)
    {
        if ($request->export) {
            return Excel::download(new student_coursesExport, 'users.xlsx');
        }
    }
    public function excel_courses(Request $request)
    {
        if ($request->export) {

            $data = DB::table('student_course')
                ->select(DB::raw('count(courses_id)  as sl_ban,COUNT(DISTINCT users_id) as hv,SUM(price) as tong,courses_id,courses_name'))
                ->whereMonth('created_at', '=', $request->loc)
                ->orderByDesc('tong')
                ->groupBy('courses_id')->groupBy('courses_name')
                ->get();

            return Excel::download(new record_courses($data), 'bao_cao_doanh_thu_theo_tung_khoa_hoc.xlsx');
        }
    }


    public function insert_comment(Request $request)
    {
        $newcomment = new comment();
        $newcomment->users_id = Auth::user()->id;
        $newcomment->learn_id = $request->learn_id;
        $newcomment->content = $request->comment;
        $newcomment->save();
    }
    public function insert_banner(Request $request)
    {
        $ext  = $request->file('images');
        $images = $ext->getClientOriginalName();
        $ext->move('assets\client\themes\images\carousel', $images);
        $newbanner = new banner();
        $newbanner->name = $images;
        $newbanner->status =  $request->status;
        $newbanner->save();
        return back();
    }
    public function xoa_banner($id)
    {
        DB::table('banner')->where('id', '=', $id)->delete();
        session()->flash('banner', 'Đã xóa banner thành công');
        return back();
    }
}
