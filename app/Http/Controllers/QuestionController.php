<?php

namespace App\Http\Controllers;

use App\Models\PageType;
use App\Models\Question;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::orderBy('order')->get();

        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pageTypes = PageType::orderBy('slug')
            ->pluck('name', 'id')
            ->toArray();

        $questionTypes = QuestionType::orderBy('title')
            ->pluck('title', 'id')
            ->toArray();


        return view('admin.questions.create', compact('pageTypes', 'questionTypes'));
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
            $questionType = QuestionType::findOrFail($request->input('question_type_id'));

            $question = Question::make($request->all());

            $question->pageType()
                ->associate($pageType);

            $question->questionType()
                ->associate($questionType)
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
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $question->load(['pageType', 'questionType']);

        $pageTypes = PageType::orderBy('slug')
            ->pluck('name', 'id')
            ->toArray();

        $questionTypes = QuestionType::orderBy('title')
            ->pluck('title', 'id')
            ->toArray();


        return view('admin.questions.edit', compact('question', 'pageTypes', 'questionTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        DB::beginTransaction();

        try {
            $pageType = PageType::findOrFail($request->input('page_type_id'));
            $questionType = QuestionType::findOrFail($request->input('question_type_id'));

            $question->fill($request->all());

            $question->pageType()
                ->associate($pageType);

            $question->questionType()
                ->associate($questionType)
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
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        DB::beginTransaction();
        try {
            $question->delete();

            DB::commit();

            return successMessage();
        } catch (\Throwable $th) {
            DB::rollBack();

            return errorMessage();
        }
    }
}
