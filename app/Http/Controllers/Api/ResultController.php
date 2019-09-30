<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PageType;
use App\Models\Question;
use App\Models\QuestionType;

class ResultController extends Controller
{
    public function getResultByPageType(int $orderType)
    {
        $results = [];
        $questionTypes = Question::whereHas('answers', function ($q) use ($orderType) {
            $q->where('session_id', '8Dv37ldz0anFNLGrZW2D2MRMmqPiWj2KdEhLsJ2t');
        })
            ->whereHas('pageType', function ($q) use ($orderType) {
                $q->where('order', $orderType);
            })
            ->with('answers')
            ->get();

        // foreach ($questionTypes as $questionType) {
        //     $total = $questionType->answers->sum(function ($item) {
        //         return $item->pivot->score * $item->pivot->factor;
        //     });

        //     dd($total);
        //     foreach ($questionType->answers as $answer) { }

        //     $results[] = [
        //         'title' => $questionType->title,
        //         'average' => ''
        //     ];
        // }

        return response()->json($questionTypes);
    }
}
