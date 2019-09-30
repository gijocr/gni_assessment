<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
    public function getQuestionByPageType($questionOrder, $typeOrder)
    {
        $nextQuestionOrder = $questionOrder + 1;

        $question = Question::whereHas('pageType', function ($q) use ($typeOrder) {
            $q->where('order', $typeOrder);
        })
            ->where('order', $questionOrder)
            ->with(['questionType.answers' => function ($q) {
                $q->orderBy('order');
            }])
            ->firstOrFail();

        $hasNextQuestion = Question::whereHas('pageType', function ($q) use ($typeOrder) {
            $q->where('order', $typeOrder);
        })
            ->where('order', $nextQuestionOrder)
            ->count();

        $result = collect([
            'hasNext' => (bool) $hasNextQuestion,
            'question' => $question,
        ]);

        return response()
            ->json($result);
    }
}
