<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cod_courses extends Model
{
    protected $table = 'cod_courses';
    protected $fillable = ['courses_id', 'cod',  'status', 'admin_id','created_at','updated_at'];
    public function courses(){
        return $this -> belongsTo('App\courses','courses_id','id');
    }
    public $timestams = false;
}
