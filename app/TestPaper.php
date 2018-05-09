<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestPaper extends Model
{
    //
    protected $table = 'testpaper';

    public $timestamps = false;
/*
    public function choices()
    {
        return $this->hasMany('App\Choice');
    }

    public function torfs()
    {
        return $this->hasMany('App\Torf');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
*/

}
