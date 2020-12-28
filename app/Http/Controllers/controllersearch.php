<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllersearch extends Controller
{
    public function loc_thang(Request $request)
    {
        $i = 1;
        if ($request->ajax()) {
            $output = '';
            $data = DB::table('student_course')
                ->select(DB::raw('count(courses_id)  as sl_ban,COUNT(DISTINCT users_id) as hv,SUM(price) as tong,courses_id,courses_name'))
                ->whereMonth('created_at', '=', $request->loc)
                ->orderByDesc('tong')
                ->groupBy('courses_id')->groupBy('courses_name')
                ->get();
            if ($data) {
                foreach ($data as $key => $record) {
                    $output .= '<tr>
                <td>' . $i++ . ' </td>
                <td>' . $record->courses_id . '</td>
                <td>' . $record->courses_name . '</td>
                <td>' . $record->hv . '</td>
                <td>' . $record->sl_ban . '</td>
                <td>' .  number_format($record->tong, 0) . ' đ</td>

                </tr>';
                }
            }

            return Response($output);
        }
    }
    public function search_courses(Request $request)
    {
        $i = 1;
        if ($request->ajax()) {
            $output = '';
            $data = DB::table('student_course')
                ->select(DB::raw('count(courses_id)  as sl_ban,COUNT(DISTINCT users_id) as hv,SUM(price) as tong,courses_id,courses_name'))
                ->where('courses_name', 'LIKE', '%' . $request->search . '%')
                ->orderByDesc('tong')
                ->groupBy('courses_id')->groupBy('courses_name')
                ->get();
            if ($data) {
                foreach ($data as $key => $record) {
                    $output .= '<tr>
                    <td>' . $i++ . ' </td>
                    <td>' . $record->courses_id . '</td>
                    <td>' . $record->courses_name . '</td>
                    <td>' . $record->hv . '</td>
                    <td>' . $record->sl_ban . '</td>
                    <td>' .  number_format($record->tong, 0) . ' đ</td>

                    </tr>';
                }
            }

            return Response($output);
        }
    }
    public function loc_month(Request $request)
    {
        $i  = 1;
        if ($request->ajax()) {
            $output = '';
            $data = DB::table('student_course')
                ->select(
                    DB::raw('count(id) as sl,COUNT(DISTINCT users_id) as hv,SUM(price) as tong,count(courses_id) as courses '),
                    DB::raw('YEAR(created_at) year, MONTH(created_at) month')
                )
                ->where('courses_id', '=', $request->loc)
                ->groupby('year', 'month')
                ->get();
            if ($data) {
                foreach ($data as $key => $record) {
                    $output .= '<tr>
                    <td>' . $i++ . ' </td>
                    <td>' . $record->month . '-' . $record->year . '</td>
                    <td>' . $record->sl . '</td>
                    <td>' . $record->hv . '</td>
                    <td>' . $record->courses . '</td>
                    <td>' .  number_format($record->tong, 0) . ' đ</td>

                    </tr>';
                }
            }

            return Response($output);
        }
    }
    public function test()
    {
        return view('admin.pages.test');
    }

    // lọc hóa đơn theo status
    public function loc_status(Request $request)
    {
        if ($request->ajax()) {
            $i = 1;
            $output = '';
            $st_courses2 = DB::table('student_course')
                ->join('users', 'users.id', '=', 'student_course.users_id')

                ->where('student_course.status', $request->loc_status)


                ->select('student_course.id', 'users_id', 'name', 'courses_id', 'phone', 'courses_name', 'status', 'cod', 'price', 'payments', 'student_course.created_at')
                ->get();
            if ($st_courses2) {
                foreach ($st_courses2 as $key => $hoadon) {
                    $output .= '<tr>
                    <td>' . $i++ . '</td>
                    <td>' . $hoadon->id . ' </td>
                    <td>' . $hoadon->phone . '</td>
                    <td>' . $hoadon->name . '</td>

                    <td>' . $hoadon->courses_id . '</td>
                    <td>' . $hoadon->courses_name . '</td>

                    <td>' . $hoadon->status . '</td>
                    <td>' . $hoadon->cod . '</td>
                    <td>' . $hoadon->price . '</td>
                    <td>' . $hoadon->payments . '</td>
                    <td>' . $hoadon->created_at . '</td>
                    <td><button data-id="' . $hoadon->id . '" data-toggle="modal" data-target="#delete"  class="badge badge-danger xoa_st"  id="sa-warning"  ><i class="fas fa-archive"></i> Xóa</button>
                  <button   class="badge badge-warning" onclick="event.preventDefault();chitiethoadon(' . $hoadon->id . ')" > <i class="ion ion-md-clipboard"></i>Chi tiết</button>
                  </td>




                    </tr>';
                }
            }

            return Response($output);
        }
    }

    public function loc_ngay(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $st_courses2 = DB::table('student_course')
                ->join('users', 'users.id', '=', 'student_course.users_id')

                ->where('student_course.created_at', 'LIKE', '%' . $request->loc_ngay . '%')


                ->select('student_course.id', 'users_id', 'name', 'courses_id', 'courses_name', 'status', 'cod', 'price', 'payments', 'phone', 'student_course.created_at')
                ->get();
            if ($st_courses2) {
                foreach ($st_courses2 as $key => $hoadon) {
                    $output .= '<tr>
                    <td></td>
                    <td>' . $hoadon->id . ' </td>
                    <td>' . $hoadon->phone . '</td>
                    <td>' . $hoadon->name . '</td>
                    <td>' . $hoadon->courses_id . '</td>
                    <td>' . $hoadon->courses_name . '</td>


                    <td>' . $hoadon->status . '</td>
                    <td>' . $hoadon->cod . '</td>
                    <td>' . $hoadon->price . '</td>
                    <td>' . $hoadon->payments . '</td>
                    <td>' . $hoadon->created_at . '</td>
                    <td><button data-id="' . $hoadon->id . '" data-toggle="modal" data-target="#delete"  class="badge badge-danger xoa_st"  id="sa-warning"  ><i class="fas fa-archive"></i> Xóa</button>
                  <button   class="badge badge-warning" onclick="event.preventDefault();chitiethoadon(' . $hoadon->id . ')" > <i class="ion ion-md-clipboard"></i>Chi tiết</button>
                  </td>




                    </tr>';
                }
            }

            return Response($output);
        }
    }

    // Tìm kiếm không bằng ajax
    // tìm kiếm khóa học

    public function tim_khoahoc(Request $request)
    {
        $data = DB::table('courses')->where('name', 'LIKE', '%' . $request->search . '%')->orWhere('id', 'LIKE', '%' . $request->search . '%')
            ->paginate(10);


        $array = DB::table('courses')->count();
        return view('admin.pages.index', ['data' => $data], ['array' => $array]);
    }
    public function tim_giangvien(Request $request)
    {
        $data = DB::table('giangvien')->where('hoten', 'LIKE', '%' . $request->search . '%')->orwhere('id', 'LIKE', '%' . $request->search . '%')
            ->paginate(10);
        $data2 = DB::table('giangvien')->count();

        return view('admin.pages.giangvien', ['data' => $data], ['data2' => $data2]);
    }

    public function chart_search(Request $request)
    {
        $month = DB::select('SELECT DISTINCT month(created_at) as thang FROM student_course');

        $record = DB::select('SELECT courses_id, courses_name,COUNT(DISTINCT users_id) as hocvien,
         COUNT(courses_id) as sl_ban, SUM(price) as tong FROM student_course GROUP BY courses_name, courses_id');


        $record2 = DB::table('student_course')
            ->select(DB::raw('courses_name, SUM(price) as sale, COUNT(courses_id) as sl_ban '))
            ->whereMonth('created_at', '=', $request->loc)
            ->groupBy('courses_name')
            ->orderByDesc('sale')
            ->get();

        $result[] = ['courses_name', 'Doanh số(triệu đồng)', 'Số lượng bán'];
        foreach ($record2 as $key => $value) {
            $result[++$key] = [$value->courses_name,  (int)$value->sale, (int)$value->sl_ban];
        }
        return view('admin\pages\test', ['data' => $record, 'data2' => $month])->with('visitor', json_encode($result));;
    }
    public function baihoc_search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $baihoc = DB::table('baihoc')->where('name', 'LIKE', '%' . $request->search . '%')->orwhere('sort', 'LIKE', '%' . $request->search . '%')->get();

            if ($baihoc) {
                foreach ($baihoc as $key => $tt1) {
                    $output .= '<tr>
                    <td></td>
                    <td>' . $tt1->sort . '</td>
                    <td>' . $tt1->name . '</td>

                    <td><button class="badge badge-danger btn-sm xoa_bai_hoc" data-id="' .  $tt1->id . '"  id="sa-success" data-toggle="modal" data-target="#delete"  ><i class="fas fa-archive"></i> Xóa</button>
                    <button class="badge badge-success" onclick="event.preventDefault();open_sua_baihoc(' . $tt1->id . ' )"> <i class="ion ion-md-create"></i> Sửa</button></td>
                    </tr>';
                }
            }

            return Response($output);
        }
    }
}
