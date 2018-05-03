<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    //
    protected $table = 'subject';

    public $timestamps = false;

    protected $fillable = ['topic_content','right_answer','difficulty'];
}
