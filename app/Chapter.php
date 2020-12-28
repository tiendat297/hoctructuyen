<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $table = 'chapter';
    public $timestams = false;
    public function baihoc(){
        return $this->hasMany('App\BaiHoc');
    }
}
