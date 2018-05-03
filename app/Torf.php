<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Torf extends Model
{
    //
    protected $table = 'torf';

    public $timestamps = false;

    protected $fillable = ['topic_content','right_answer','difficulty'];
}
