<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;

class PageController extends Controller
{
    public function getPageByType(int $pageOrder, int $typeOrder)
    {
        $nextPageOrder = $pageOrder + 1;

        $page = Page::whereHas('pageType', function ($q) use ($typeOrder) {
            $q->when($typeOrder === 0, function ($q) {
                $q->orderBy('order');
            })
                ->when($typeOrder > 0, function ($q) use ($typeOrder) {
                    $q->where('order', $typeOrder);
                });
        })
            ->with(['pageType' => function ($q) {
                $q->orderBy('order');
            }])
            ->when($pageOrder === 0, function ($q) {
                $q->orderBy('order');
            })
            ->when($pageOrder > 0, function ($q) use ($pageOrder) {
                $q->where('order', $pageOrder);
            })
            ->orderBy('order')
            ->firstOrFail();

        $hasNextPage = Page::whereHas('pageType', function ($q) use ($typeOrder) {
            $q->where('order', $typeOrder);
        })
            ->where('order', $nextPageOrder)
            ->count();

        $hasQuestions = Page::whereHas('pageType', function ($q) use ($typeOrder) {
            $q->has('questions')
                ->where('order', $typeOrder);
        })
            ->where('order', $pageOrder)
            ->count();

        $hasResultText = Page::whereHas('pageType', function ($q) use ($typeOrder) {
            $q->has('resultTexts')
                ->where('order', $typeOrder);
        })
            ->where('order', $pageOrder)
            ->count();

        $result = collect([
            'hasNext' => (bool) $hasNextPage,
            'hasQuestion' => (bool) $hasQuestions,
            'hasResultText' => (bool) $hasResultText,
            'page' => $page,
        ]);

        return response()
            ->json($result);
    }
}
