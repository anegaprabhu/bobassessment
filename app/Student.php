<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    // protected $dates = ['created_at'];
    public $primaryKey = 'student_id';
}
