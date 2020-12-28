<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class student_learn extends Model
{
    protected $table = 'student_learn';
    protected $fillable = ['users_id','id', 'course_id', 'learn_id', 'time'];
    public $timestams = false;
}
