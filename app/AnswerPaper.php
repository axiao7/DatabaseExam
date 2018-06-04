<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswerPaper extends Model
{
    //
    protected $table = 'answerpaper';
//'choice_1','choice_2','choice_3','choice_4','choice_5','choice_6',
    protected $fillable = [
        'score_1','score_2','score_3_1','score_3_2','score_3_3','score_3_4',
        'score_3_5','total_score'];

    public $timestamps = false;
}
