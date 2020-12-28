<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_courses extends Model
{
    protected $table = 'student_course';
    protected $fillable = ['users_id', 'courses_id', 'courses_name', 'status','cod','sort','payments','price','created_at','updated_at'];
    public $timestams = false;
}
