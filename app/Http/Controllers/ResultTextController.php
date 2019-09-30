<?php

namespace App\Http\Controllers;

use App\Models\PageType;
use App\Models\ResultText;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultTextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resultTexts = ResultText::with('pageType')->get();

        return view('admin.resultTexts.index', compact('resultTexts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTypes = PageType::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();

        return view('admin.resultTexts.create', compact('pageTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            $pageType = PageType::findOrFail($request->input('page_type_id'));
            $resultText = ResultText::make($request->all());
            $resultText->pageType()
                ->associate($pageType)
                ->save();

            DB::commit();

            return successMessage();
        } catch (\Throwable $th) {
            DB::rollBack();

            return errorMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ResultText  $resultText
     * @return \Illuminate\Http\Response
     */
    public function show(ResultText $resultText)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ResultText  $resultText
     * @return \Illuminate\Http\Response
     */
    public function edit(ResultText $resultText)
    {
        $resultText->load('pageType');

        $pageTypes = PageType::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();

        return view('admin.resultTexts.create', compact('resultText', 'pageTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ResultText  $resultText
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ResultText $resultText)
    {
        DB::beginTransaction();

        try {
            $pageType = PageType::findOrFail($request->input('page_type_id'));
            $resultText = $resultText->fill($request->all());
            $resultText->pageType()
                ->associate($pageType)
                ->save();

            DB::commit();

            return successMessage();
        } catch (\Throwable $th) {
            DB::rollBack();

            return errorMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ResultText  $resultText
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResultText $resultText)
    {
        DB::beginTransaction();

        try {
            $resultText->delete();

            DB::commit();

            return response()
                ->json(['success' => true]);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()
                ->json(['error' => $th->getMessage()]);
        }
    }
}
