<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionUser;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function questions(Question $questions)
    {
        return $questions::all(['id', 'title', 'choices'])->random(3);
    }

    public function finish()
    {
        auth()->user()->update(['go' => 1]);
        return response()->json(['R' => true]);
    }
}
