<?php

namespace Database\Seeders;

use App\Models\QuestionType;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        QuestionType::create([
            'name' => 'Selección múltiple',
        ]);
        QuestionType::create([
            'name' => 'Respuesta abierta',
        ]);
    }
}
