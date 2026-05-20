<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Response;
use App\Models\Questions;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function getQuestion()
    {
        $question = Questions::inRandomOrder()->limit(5)->get();

        return Response::success('Questions Fetched Successfully',$question);
    }
}
