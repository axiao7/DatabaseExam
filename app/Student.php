<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'students';

    public $timestamps = false;

    protected $fillable = ['student_id', 'password', 'name', 'class'];

//    public function answerpaper()
//    {
//        return $this->hasOne('App/AnswerPaper');
//    }

}
