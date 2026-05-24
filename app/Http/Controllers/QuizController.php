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

        return Response::success('Questions Fetched Successfully', $question);
    }

    public function saveAnswers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            '*.questionId' => 'required|uuid',
            '*.answer'     => 'required|string',
        ]);

        if ($validator->fails()) {
            return Response::validation($validator->errors()->all(), []);
        }

        $validated = $validator->validated();

        try {
            Answers::create([
                'user_id' => auth()->user()->id,
                'answers' => json_encode($validated),
            ]);
        } catch (Exception $e) {
            return Response::error('Something Went Wrong! Please Try Again', []);
        }

        return Response::success('Answered Stored Successfully', []);
    }

    public function getResults()
    {
        $answer_records = Answers::where('user_id', auth()->user()->id)->get();

        $all_question_ids = $answer_records
            ->flatMap(fn($record) => collect($record->answers)->pluck('questionId'))
            ->unique()
            ->values();

        $questions = Questions::whereIn('uuid', $all_question_ids)
            ->get()
            ->keyBy('uuid');

        $enriched = $answer_records->map(function ($record) use ($questions) {

            $enriched_answers = collect($record->answers)->map(function ($answer) use ($questions) {

                $question = $questions->get($answer->questionId);



                return [
                    'question_id'    => $answer->questionId,
                    'answer'         => $answer->answer,
                    'question_text'  => $question?->question ?? 'Question not found',
                    'correct_answer' => $question?->answer ?? null,
                    'is_correct'     => $question && $answer->answer === $question->answer,
                ];
            });

            return [
                'id'         => $record->id,
                'user_id'    => $record->user_id,
                'answers'    => $enriched_answers,
                'created_at' => $record->created_at,
            ];
        });

        return Response::success('Result List Fetched Successfully',[$enriched]);
    }
}
