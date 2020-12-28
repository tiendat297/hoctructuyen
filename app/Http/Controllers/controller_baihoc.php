<?php

namespace App\Http\Controllers;

use App\BaiHoc;
use App\Chapter;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controller_baihoc extends Controller
{
    public function chitiet_baihoc($id)
    {
        $courses = DB::table('courses')->where('id', $id)->get();
        $data = Chapter::query()->where('chapter.course_id', $id)->with(['baihoc' => function ($query) {
            $query->orderBy('sort');
        }])->orderBy('sort_chapter')->get();
        return view('admin\pages\baihoc', ['data' => $data, 'data2' => $id, 'data3' => $courses]);
    }
    public function insert_baihoc(Request $request)
    {
        $courses_id = $request->courses_id;
        $chapter_id = $request->chapter_id;
        $newbaihoc = new BaiHoc();
        $newbaihoc->courses_id = $courses_id;
        $newbaihoc->chapter_id = $chapter_id;
        $newbaihoc->name =   $request->name;
        $newbaihoc->sort = $request->sort;
        $newbaihoc->description = $request->description;
        $newbaihoc->status = $request->status;
        $newbaihoc->video_file = $request->video_file;

        $newbaihoc->save();

        // $baihoc = DB::table('baihoc') -> where('courses_id',$courses_id)
        // -> where('chapter_id',$chapter_id)
        // -> where('sort', $request -> sort)
        // -> get();
        // $output = '
        // <td></td>
        // <td>'.$baihoc[0] -> sort.'</td>
        // <td>'.$baihoc[0] -> name.'</td>
        // <td> <button  data-id="" data-toggle="modal" class="badge badge-danger delete" data-target="#delete" id="sa-warning" ><i class="fas fa-archive"></i> Xóa</button>
        //      <a    href=""  class="badge badge-success"  > <i class="ion ion-md-create"></i> Sửa</a>
        // </td>';

        return Response()->json(['succsess' => 'Xóa thành công']);
    }

    public function open_sua_chapter($id)
    {
        $chapter = DB::table('chapter')->where('id', $id)->get();

        $output = '

       <form enctype="multipart/form-data" id="sua_chapter" action="" method="POST" enctype="multipart/form-data">
       <div class="form-group">
           <label for="">Mã chương học<span class="text-danger">*</span></label>
           <input type="text" name="id" readonly=""  value = "' . $chapter[0]->id . '"  class="form-control">
       </div>

       <div class="form-group">
           <label for="userName">Tên chương học<span class="text-danger">*</span></label>
           <input type="text" name="name_chapter" value = "' . $chapter[0]->name_chapter . '" parsley-trigger="change"   class="form-control" >
       </div>
       <div class="form-group">
           <label for="">Chương số<span class="text-danger">*</span></label>
           <input  type="fload"  name ="sort_chapter" value = "' . $chapter[0]->sort_chapter . '" class="form-control">
       </div>

       <div class="form-group">
           <label for="passWord2">Mô tả<span class="text-danger">*</span></label>
           <div class="col-lg-14">
               <textarea class="form-control ckeditor" rows="5" id="example-textarea" type="text" name="description" >' . $chapter[0]->description . '</textarea>
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

</form>


       ';
        return Response($output);
    }
    public function update_chapter(Request $request)
    {
        DB::table('chapter')->where('id', '=', $request->id)->update(['name_chapter' => $request->name_chapter]);
        DB::table('chapter')->where('id', '=', $request->id)->update(['sort_chapter' => $request->sort_chapter]);
        DB::table('chapter')->where('id', '=', $request->id)->update(['status' => $request->status]);
        DB::table('chapter')->where('id', '=', $request->id)->update(['description' => $request->description]);


        return Response()->json(['succsess' => 'sửa thành công']);
    }

    // xóa bài học
    public function xoa_bai_hoc($id)
    {
        DB::table('baihoc')->where('id', '=', $id)->delete();

        return response()->json(['succsess' => 'Xóa thành công']);
    }
    public function open_sua_baihoc($id)
    {
        $baihoc = DB::table('baihoc')->where('id', $id)->get();
        $output = '
        <form enctype="multipart/form-data" id="fr_edit_baihoc" action="" method="POST" enctype="multipart/form-data">


        <div class="form-group">
            <label for="">Mã bài học<span class="text-danger">*</span></label>
            <input type="text" name="id" readonly="" value = "' . $id . '" class="form-control" >
        </div>
        <div class="form-group">
            <label for="userName">Tên bài học<span class="text-danger">*</span></label>
            <input type="text" name="name" parsley-trigger="change" value = "' . $baihoc[0]->name . '"  placeholder="Tên bài học" class="form-control" >
        </div>
        <div class="form-group">
            <label for="">Số thứ tự<span class="text-danger">*</span></label>
            <input  type="fload" name ="sort" value = "' . $baihoc[0]->sort . '" class="form-control">
        </div>
        <div class="form-group">
                                        <label for="userName">Video file<span class="text-danger">*</span></label>
                                        <input type="text" name="video_file" value = "' . $baihoc[0]->video_file . '" parsley-trigger="change"  placeholder="Video files" class="form-control" >
                                    </div>

        <div class="form-group">
            <label for="passWord2">Mô tả<span class="text-danger">*</span></label>
            <div class="col-lg-14">
                <textarea class="form-control ckeditor" rows="5" id="example-textarea" type="text"  name="description" ' . $baihoc[0]->description . ' >' . $baihoc[0]->description . '</textarea>
            </div>
        </div>
        <div class="form-group">

            <label class="" for="example-date">Trạng thái hoạt động</label>
            <select class="form-control col-lg-10" name="status">

                                        <option value="1">Hiện</option>
                                        <option value="0">Ẩn</option>

                                    </select>
        </div>

    </div>
        </div>


    </form>

        ';
        return Response($output);
    }

    public function update_baihoc(Request $request)
    {
        DB::table('baihoc')->where('id', '=', $request->id)->update(['name' => $request->name]);
        DB::table('baihoc')->where('id', '=', $request->id)->update(['sort' => $request->sort]);
        DB::table('baihoc')->where('id', '=', $request->id)->update(['video_file' => $request->video_file]);
        DB::table('baihoc')->where('id', '=', $request->id)->update(['description' => $request->description]);
        DB::table('baihoc')->where('id', '=', $request->id)->update(['status' => $request->status]);
        return Response()->json(['succsess' => 'sửa thành công']);
    }
    public function them_chapter(Request $request)
    {
        $newchapter = new Chapter();
        $newchapter->course_id = $request->course_id;
        $newchapter->name_chapter = $request->name_chapter;
        $newchapter->sort_chapter = $request->sort_chapter;
        $newchapter->description = $request->description;
        $newchapter->status = $request->status;
        $newchapter->save();
        return Response()->json(['succsess' => 'thêm thành công']);
    }
}
