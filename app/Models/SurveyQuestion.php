<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_id',
        'survey_id',
        'question_type_id',
        'question',
        'order',
        'is_active',
    ];

    public function questionType()
    {
        return $this->belongsTo(QuestionType::class);
    }

    public function surveyOptions()
    {
        return $this->hasMany(SurveyOption::class);
    }
}
