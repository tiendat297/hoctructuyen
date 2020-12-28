<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use App\student;
use App\student_courses ;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class record_courses implements FromCollection, WithHeadings
{
    private $data;
    public function __construct($data)
    {
        $this -> transactions = $data;
    }
    public function collection()
    {

        $transactions = $this -> transactions;
        $fomattran = [];
        foreach($transactions as $key => $item){
            $fomattran[] = [
                'courses_id' => $item -> courses_id,
                'courses_name' => $item -> courses_name,
                'sl' => $item -> sl_ban,
                'hv' => $item -> hv,
                'tong' => number_format($item -> tong,0,',','.'),




            ];
        }
        return collect($fomattran);
    }
    public function headings(): array
    {
        return [
            'Mã khóa học',
            'Tên khóa học',

            'Số lượng đã bán',
            'Số lượng học viên',
            'Doanh thu',

        ];
    }


}
