<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Question;
use Symfony\Component\HttpFoundation\Response;

class AnswerController extends Controller
{
    public function update(Request $request)
    {
        if (
            !$request->has('question_id')
            && !$request->has('asnwer_id')
            && !$request->has('session_id')
        ) {
            return response()
                ->json(
                    ['error' => ''],
                    Response::HTTP_PRECONDITION_FAILED
                );
        }

        try {
            $question = Question::findOrFail($request->get('question_id'));
            $question->answers()
                ->sync([
                    $request->get('asnwer_id') => $request->only('session_id')
                ]);

            return response()
                ->json($request->all(), Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()
                ->json(['error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
