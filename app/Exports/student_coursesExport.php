<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use App\student;
use App\student_courses ;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class student_coursesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $record= DB::select('SELECT month(student_course.created_at) as thang, count(DISTINCT  student_course.users_id) as hv ,
        count(student_course.id) as donhang, COUNT(student_course.courses_id) as sl,
        SUM(student_course.price) as tong FROM student_course
        GROUP BY month(student_course.created_at)');
        $formattransactions = [];
        foreach($record as $key => $item){
            $formattransactions[] = [
                'Tháng' => $item -> thang,
                'Số lượng học viên' => $item -> hv,
                'Số lượng đơn hàng' => $item -> donhang,
                'Doanh thu' => $item ->     tong,
                    ];
        }
        return collect($formattransactions);
    }
    public function headings(): array
    {
        return [
            'Tháng',
            'Số lượng học viên',

            'Số lượng đơn hàng',
            'Doanh thu',

        ];
    }


}
