<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// gọi các trang PAGES
Route::get('detail','controller_client@detail');
Route::get('home','controller_client@home');
Route::get('dangki', 'controller_client@dangki');
Route::get('cart','controller_client@cart');
Route::get('product_detail','controller_client@cart');
Route::get('learning/{id}','controller_client@learning');
Route::get('mycourses','controller_client@mycourses');
Route::get('group_courses/{id}','controller_client@group_courses');
// Đăng nhập, Đăng kí, Đăng xuất
Route::post('login', 'controller_client@postlogin');
Route::post('register', 'controller_client@postregister');
Route::get('logout','controller_client@logout');
// Chi tiết vào từng khóa học
Route::get('{id}.html','controller_client@courses_detail');
// thêm khóa học vào giỏ hàng
Route::get('addcart/{id}','controller_client@addcart');
// xóa khóa học trong cart
Route::get('delete/{rowId}','controller_client@delete');
// mua khóa học
Route::post('muakhoahoc','controller_client@muakhoahoc');
// thông tin khóa học đã mua
Route::get('buycourses','controller_client@buycourses');

Route::get('loi','controller_client@loi');
// kích hoạt khóa học
Route::post('kichhoat','controller_client@kichhoat');

// quá trình học và lưu thông tin học
Route::get('hoc/{id}','controller_client@hoc');
// comment theo từng bài học
Route::get('comment/{id}','controller_client@comment');
Route::post('insert_comment','controller_admin@insert_comment');
// thông tin cá nhân
Route::get('profile','controller_client@profile');
Route::post('update_profile','controller_client@update_profile');
// đổi pass word
Route::post('update_password','controller_client@update_password');



// ----------------------Admin--------------------------------------
// Chi tiết từng trang
Route::get('home_admin','controller_admin@home');
Route::get('courses_admin','controller_admin@courses');
Route::get('giangvien','controller_admin@giangvien');
// Đăng nhập đăng xuất
Route::get('login_admin','controller_admin@login_admin');
Route::post('home_admin','controller_admin@home_admin');
// đăng xuất
Route::get('logout_admin','controller_admin@logout_admin');
// sửa xóa giảng viên-----------------------------------------------
Route::get('edit_gv/{id}', 'controller_admin@edit_gv');
Route::get('delete_admin/{id}', 'controller_admin@delete');
Route::post('edit','controller_admin@edit');
Route::post('themgv','controller_admin@themgv');
// Thêm xóa sửa student_courses-----------------------------------------------
Route::get('student_courses_admin','controller_admin@student_courses_admin');
Route::get('admin_xoa_stc/{id}', 'controller_admin@admin_xoa_stc');
// Thêm sửa xóa khóa học-----------------------------------------------
Route::get('edit_courses/{id}','controller_admin@edit_courses');
Route::post('suacourses', 'controller_admin@suacourses');
Route::get('them_courses','controller_admin@them_courses');
Route::post('insert_courses','controller_admin@insert_courses');
Route::get('delete_courses/{id}','controller_admin@delete_courses');
// thêm xóa sửa, xác nhận, tạo mã kích hoạt-----------------------------------------------
Route::get('detail_donhang/{id}','controller_admin@detail_donhang');
Route::get('cod','controller_admin@cod');
Route::post('edit_cod','controller_admin@edit_cod');
Route::post('taoma','controller_admin@taoma');
Route::get('qlcod','controller_admin@qlcod');
Route::post('them_cod','controller_admin@them_cod');
// Bộ lọc hóa đơn-----------------------------------------------
Route::get('search', 'controller_admin@search');
Route::get('loc_status' , 'controllersearch@loc_status');
Route::get('loc_ngay','controllersearch@loc_ngay');
// in hóa đơn đã thu tiền cho khách-----------------------------------------------
Route::get('hoadon/{id}','controller_admin@hoadon');
// thêm xóa sửa nhóm khóa học-----------------------------------------------
Route::get('group_courses','controller_admin@group_courses');
Route::get('xoa_group/{id}','controller_admin@xoa_group');
Route::post('them_group','controller_admin@them_group');
Route::get('suanhom/{id}','controller_admin@suanhom');
// thêm xóa sửa người dùng-----------------------------------------------
Route::get('users','controller_admin@users');
Route::get('dat','controller_admin@dat');
Route::get('edituser/{id}','controller_admin@edituser');
// Tạo báo cáo theo tháng, khóa học-----------------------------------------------
Route::get('record','controller_admin@record');
Route::get('record_course','controller_admin@record_course');

// bộ lọc trong báo cáo-----------------------------------------------

Route::get('loc_thang','controllersearch@loc_thang');
Route::get('search_courses','controllersearch@search_courses');
Route::get('loc_month','controllersearch@loc_month');
Route::get('test','controllersearch@test');
// chi tiết bài học theo từng khóa học-----------------------------------------------
Route::get('chitiet_baihoc/{id}','controller_baihoc@chitiet_baihoc');
// thêm, sửa xóa bài học-----------------------------------------------
Route::post('insert_baihoc','controller_baihoc@insert_baihoc');
Route::get('xoa_bai_hoc/{id}','controller_baihoc@xoa_bai_hoc');
Route::get('open_sua_baihoc/{id}','controller_baihoc@open_sua_baihoc');
Route::post('update_baihoc','controller_baihoc@update_baihoc');
// tìm kiếm bài học
Route::get('baihoc_search','controllersearch@baihoc_search');
// sửa chương học-----------------------------------------------
Route::get('open_sua_chapter/{id}','controller_baihoc@open_sua_chapter');
Route::post('them_chapter','controller_baihoc@them_chapter');
// lưu thông tin chương học-----------------------------------------------
Route::post('update_chapter','controller_baihoc@update_chapter');
// Hoàn thiện tìm kiếm
Route::post('tim_khoahoc','controllersearch@tim_khoahoc');
Route::post('tim_giangvien','controllersearch@tim_giangvien');
// Lọc tháng biểu đồ doanh thu theo khóa học
Route::post('chart_search','controllersearch@chart_search');
// banner
Route::get('banner','controller_admin@banner');
Route::post('insert_banner','controller_admin@insert_banner');
Route::get('xoa_banner/{id}','controller_admin@xoa_banner');
// xuất ra file êxcel
Route::post('excel_month','controller_admin@excel_month');
Route::post('excel_courses','controller_admin@excel_courses');
