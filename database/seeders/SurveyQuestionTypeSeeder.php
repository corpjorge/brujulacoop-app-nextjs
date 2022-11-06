<?php

namespace Database\Seeders;

use App\Models\SurveyQuestionType;
use Illuminate\Database\Seeder;

class SurveyQuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SurveyQuestionType::create([
            'name' => 'Selección múltiple',
        ]);
        SurveyQuestionType::create([
            'name' => 'Respuesta abierta',
        ]);
    }
}
