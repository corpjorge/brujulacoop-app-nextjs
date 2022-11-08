<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'survey_question_id',
        'response',
        'order',
        'its_conditional',
        'is_active',
    ];
}
