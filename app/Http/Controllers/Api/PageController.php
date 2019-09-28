<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function getPages()
    {
        $pages = Page::with('pageType')
            ->orderBy('order')
            ->get();

        return response()->json($pages);
    }

    public function getPageByType(int $order)
    {
        $nextOrder = $order + 1;

        $pages = Page::whereHas('pageType', function ($q) use ($order) {
            $q->where('order', $order);
        })
            ->with(['pageType.questions.questionType.answers' => function ($q) {
                $q->orderBy('order');
            }])
            ->orderBy('order')
            ->get();

        $hasNext = (bool) Page::whereHas(
            'pageType',
            function ($q) use ($nextOrder) {
                $q->where('order', $nextOrder);
            }
        )
            ->count();

        $result = collect([
            'has_next' => $hasNext,
            'pages' => $pages,
        ]);

        return response()
            ->json($result);
    }
}
