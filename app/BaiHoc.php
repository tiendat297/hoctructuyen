<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaiHoc extends Model
{
    protected $table = 'baihoc';
    public $timestams = false;
    public function chapter(){
        return $this -> belongsTo('App\courses','chapter_id','id');
    }
}
