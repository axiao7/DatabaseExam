<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    //
    protected $table = 'choice';

    public $timestamps = false;

    protected $fillable = ['topic_content','option_A','option_B',
        'option_C','option_D','right_answer','difficulty'];
}
