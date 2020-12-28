<?php

namespace App\Http\Controllers;

use App\Chapter;
use App\comment;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;

use App\courses;
use App\student_courses;
use App\student_learn;
use App\user;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class controller_client extends Controller
{
    // Gọi đến các pages
    public function dat()
    {
        return view('client.pages.index');
    }

    public function dangki()
    {
        return view('client\pages\register');
    }
    public function learning($id)
    {

        $data = Chapter::query()->where('chapter.course_id', $id)->with(['baihoc' => function ($query) {
            $query->orderBy('sort');
        }])->orderBy('sort_chapter')->get();

        $data2 = DB::table('courses')->where('id', $id)->select('video_thuml')->get();



        return view('client\pages\learning', ['data' => $data, 'data2' => $data2]);
    }

    // -----------------Đăng nhập---------------------------------
    public function postlogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'username' => 'required|min:5|max:255',
                'password' => 'required|min:6|max:255',
            ],
            [
                'username.required' => 'Tên  không được bỏ trống',
                'username.min' => 'tên phải có tối thiểu 6 kí tự ',
                'username.max' => 'tên không quá 255 kí tự ',

                'password.required' => 'Mật khẩu không được bỏ trống',
                'password.min' => 'Mật khẩu phải có tối thiểu 6 kí tự ',
                'password.max' => 'Mật khẩu không quá 255 kí tự ',
            ]
        );
        $email = $request->username;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('home');
        } else {
            return redirect('home');
        }
    }


    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('home'); // phải bỏ remember token hoặc thêm cột remember_token

    }
    // Đăng kí tài khoản
    public function postregister(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required|min:2|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6|max:255',
                'repassword' => 'required|same:password',
                'phone' => 'required',
                'address' => 'required',
            ],
            [
                'name.required' => 'Tên  không được bỏ trống',
                'name.min' => 'Tên phải có tối thiểu 6 kí tự ',
                'name.max' => 'Tên không quá 255 kí tự ',
                'email.required' => 'Email không được bỏ trống',
                'email.unique' => 'Đã tồn tại email trong hệ thống',

                'password.required' => 'Mật khẩu không được bỏ trống',
                'password.min' => 'Mật khẩu phải có tối thiểu 6 kí tự ',
                'password.max' => 'Mật khẩu không quá 255 kí tự ',
                'repassword.required' => 'Mật khẩu không được bỏ trống',
                'password.same' => 'Nhập sai',
                'phone.required' => 'Số điện thoại không được bỏ trống',
                'phone.required' => 'Địa chỉ không được bỏ trống',
            ]
        );
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        Auth::login($user);
        return redirect('home');
    }
    // đẩy thông tin ra trang chủ
    public function home()
    {
        $data = DB::table('courses')->join('giangvien', 'courses.giang_vien_id', 'giangvien.id')
            ->select('courses.name', 'courses.id', 'giangvien.hoten', 'price_root', 'courses.images', 'price_sale')
            ->where('courses.sort', '=', '0')
            ->where('courses.status', '=', '1')
            ->paginate(9);
        $data2 = DB::table('courses')->join('giangvien', 'courses.giang_vien_id', 'giangvien.id')
            ->select('courses.name', 'courses.id', 'giangvien.hoten', 'price_root', 'courses.images', 'price_sale')
            ->where('courses.status', '=', '1')->orderByDesc('sort')
            ->paginate(9);
        $banner = DB::table('banner')->where('status', 1)->get();

        return view('client.pages.index', ['data2' => $data2, 'data' => $data, 'banner' => $banner]);
    }
    public function group_courses($id)
    {
        $data = DB::table('courses')->join('giangvien', 'courses.giang_vien_id', 'giangvien.id')
            ->select('courses.name', 'courses.id', 'giangvien.hoten', 'price_root', 'courses.images', 'price_sale')
            ->where('courses.sort', '=', '0')
            ->where('courses.status', '=', '1')
            ->paginate(9);
        $data2 = DB::table('courses')->join('giangvien', 'courses.giang_vien_id', 'giangvien.id')
            ->select('courses.name', 'courses.id', 'giangvien.hoten', 'price_root', 'courses.images', 'price_sale')
            ->where('courses.status', '=', '1')->where('courses.group_courses_id', $id)->orderByDesc('sort')
            ->paginate(9);
        $banner = DB::table('banner')->where('id', 1)->get();
        return view('client.pages.index', ['data2' => $data2, 'data' => $data, 'banner' => $banner]);
    }
    //Đẩy thông tin vào mid


    // đẩy thông tin giảng viên
    public function giangvien()
    {
        $giangvien = DB::table('giangvien')->get();
        return view('client.pages.index', ['giangvien' => $giangvien]);
    }

    // chi tiết từng khóa học
    public function courses_detail($id)
    {

        $data = DB::table('courses')->join('giangvien', 'courses.giang_vien_id', 'giangvien.id')
            ->where('courses.id', '=', $id)->select('courses.name', 'video_thuml', 'courses.id', 'giangvien.hoten', 'price_root', 'courses.images', 'price_sale', 'courses.description', 'after_courses')->get();
        $data3 = Chapter::query()->where('chapter.course_id', $id)->with(['baihoc' => function ($query) {
            $query->orderBy('sort');
        }])->orderBy('sort_chapter')->get();

        $data2 = DB::table('baihoc')->where('courses_id', $id)->count();
        $data4 = DB::table('courses')->join('giangvien', 'courses.giang_vien_id', 'giangvien.id')
            ->where('courses.id', '=', $id)->select('giangvien.hoten', 'giangvien.images', 'giangvien.description')->get();
        return view('client\pages\product_detail', ['data' => $data, 'data2' => $data2, 'data4' => $data4], ['data3' => $data3]);
    }
    // mua hàng

    public function addcart($id, Request $request)
    {

        $courses = courses::find($id);
        if ($request->qty) {
            $qty = $request->qty;
        } else {
            $qty = 1;
        }
        $gia = $courses->price_sale;
        $cart = ['id' => $id, 'name' => $courses->name, 'qty' => $qty, 'price' => $gia, 'weight' => 0, 'options' => ['img' => $courses->images]];
        Cart::add($cart);
        session()->flash('thongbao', 'Bạn đã mua ' . $courses->name . 'thành công');
        return back();
    }
    // check out
    public function cart()
    {
        $cart = Cart::content();
        return view('client.pages.cart', compact('cart'));
    }
    // xóa khóa học
    public function delete($rowId)
    {
        Cart::remove($rowId);
        session()->flash('thongbao', 'Bạn đã xóa khóa học khỏi giỏ hàng thành công');
        return back();
    }
    // mua khóa học
    public function muakhoahoc(Request $request)
    {
        $student_id = (Auth::user()->id);


        $cart = Cart::content();
        foreach ($cart as $courses) {
            $muakhoahoc = new student_courses();
            $muakhoahoc->users_id = $student_id;
            $muakhoahoc->courses_id = $courses->id;
            $muakhoahoc->payments = $request->payments;
            $muakhoahoc->courses_name = $courses->name;
            $muakhoahoc->price = $courses->price;
            $muakhoahoc->status = 0;

            $muakhoahoc->save();
        }
        Cart::destroy();
        return redirect('buycourses');
    }
    public function buycourses()
    {
        $student_id = (Auth::user()->id);
        $data = DB::table('student_course')->join('courses', 'student_course.courses_id', 'courses.id')->where('users_id', '=', $student_id)->get();
        return view('client.pages.buycourses', ['data' => $data]);
    }

    public function loi()
    {
        return view('client.pages.test');
    }
    // kích hoạt bằng mã kích hoạt
    public function kichhoat(Request $request)
    {
        $cod = $request->cod;
        $student_id = (Auth::user()->id);
        $name = student_courses::find($cod);
        $result = DB::table('student_course')->where('cod', $cod)->first();
        if ($result) {
            DB::table('student_course')->where('cod', $cod)->where('users_id', $student_id)->update(['status' => 2]);
            session()->flash('thongbao', 'Bạn đã kích hoạt khóa học thành công');
            return redirect('mycourses');
        } else {
            session()->flash('thongbao', 'Bạn đã nhập sai mã kích hoạt hoặc chưa mua khóa học ');
            return redirect('mycourses');
        }
    }
    public function mycourses()
    {
        $student_id = (Auth::user()->id);
        $data = DB::table('student_course')
            ->join('courses', 'student_course.courses_id', 'courses.id')
            ->where('users_id', $student_id)
            ->where('student_course.status', 2)->get();
        $query  = DB::select('SELECT courses.name,course_id, COUNT(DISTINCT student_learn.learn_id) as dahoc, courses.images FROM student_course INNER JOIN student_learn INNER JOIN courses  WHERE student_course.courses_id = courses.id AND
        student_course.users_id = student_learn.users_id AND  student_course.STATUS = 2 and student_learn.users_id = ? GROUP BY courses.name,course_id,courses.images', [$student_id]);


        return view('client\pages\mycourses', ['data' => $query]);
    }
    // đổ dữ liệu ra phần học và lưu quá trình học
    public function hoc($id)
    {
        $video = DB::table('baihoc')->where('id', $id)->get();
        $comment = DB::table('comment')
            ->join('users', 'comment.users_id', 'users.id')->where('learn_id', $id)
            ->select('comment.created_at', 'name', 'content')->orderBy('comment.created_at')->get();


        $output2 = '';
        if ($comment) {
            foreach ($comment as $key => $tt1) {
                $output2 .= '
            <div id="ds_cmt " class="tab-pane active">
                <div class="timeline-2">
                    <div class="time-item">
                        <div class="item-info ml-3 mb-3">
                            <div class="text-muted"> <em>' . $tt1->created_at . ' </em></div>
                            <p><strong><a href="#" class="text-info">' . $tt1->name . ': </a></strong>' . $tt1->content . '</p>
                        </div>
                    </div>


                </div>
            </div>

                ';
            }
        }


        $output1 = '
        <div class="btn-toolbar">

        <span class="btn btn-mini btn-primary"><h5>' . $video[0]->name . ' </h5></span>

    </div>
        <div id="video_watch">
        <div  class="moreOptopm carousel slide differentview">

            <iframe width="100%" height="400px" src="https://www.youtube.com/embed/' . $video[0]->video_file . '?controls=0&amp;start=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        </div>

        <div class="tab-pane fade active in" id="div_comment">





            <button type = "button"  onclick="event.preventDefault();comment(' . $video[0]->id . ')" class="badge badge-success"> <h4 >Đăng thảo luận </h4> </button>

        </div>





        ';
        $output = $output1 . " " . $output2;
        $users_id = Auth::user()->id;
        $course_id = $video[0]->courses_id;
        $learn_id = $video[0]->id;

        $student_learn = new student_learn();
        $student_learn->users_id = $users_id;
        $student_learn->course_id = $course_id;
        $student_learn->learn_id = $learn_id;
        $student_learn->save();
        return Response($output);
    }
    // public function up_comment(Request $request){
    //     $comment = new comment();
    //     $comment -> learn_id = $request -> learn_id;
    //     $comment -> users_id = Auth::user() -> id;
    //     $comment -> content = $request -> comment ;
    //     $comment -> save();
    //     $output ='';
    //     return Response( $output);



    // }
    public function profile()
    {
        $profile = DB::table('users')->where('id', Auth::user()->id)->get();
        return view('client\pages\profile', ['data' => $profile]);
    }
    public function update_profile(Request $request)
    {
        $id =  Auth::user()->id;
        DB::table('users')->where('id', '=', $id)->update(['name' => $request->name]);
        DB::table('users')->where('id', '=', $id)->update(['email' => $request->email]);
        DB::table('users')->where('id', '=', $id)->update(['address' => $request->address]);
        DB::table('users')->where('id', '=', $id)->update(['phone' => $request->phone]);
        session()->flash('profile', 'Cập nhật thông tin cá nhân thành công');
        return back();
    }
    // đổi mật khẩu
    public function update_password(Request $request)
    {


        $this->validate($request, [

            'password' => 'required|min:6|max:255',
            'renewpassword' => 'required|same:newpassword',

        ],);
        $newpass = Hash::make($request->newpassword);
        DB::table('users')->where('id', '=', Auth::user()->id)->update(['password' => $newpass]);
        session()->flash('profile', 'Cập nhật thông tin thành công');
        return back();
    }
}
