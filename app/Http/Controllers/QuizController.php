<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Response;
use App\Models\Answers;
use App\Models\Questions;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuizController extends Controller
{
    public function getQuestion()
    {
        $question = Questions::inRandomOrder()->limit(5)->get();

        return Response::success('Questions Fetched Successfully',$question);
    }

    public function saveAnswers(Request $request)
    {
        $validator = Validator::make($request->all(),[
            '*.questionId' => 'required|uuid',
            '*.answer'     => 'required|string',
        ]);

        if($validator->fails()){
            return Response::validation($validator->errors()->all(),[]);
        }

        $validated = $validator->validated();

        try {
            Answers::create([
                'user_id' => auth()->user()->id,
                'answers' => json_encode($validated),
            ]);
        } catch (Exception $e) {
            return Response::error('Something Went Wrong! Please Try Again',[]);
        }

        return Response::success('Answered Stored Successfully',[]);
    }
}
