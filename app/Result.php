<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';
    // protected $dates = ['created_at'];
    public $primaryKey = 'result_id';
}
