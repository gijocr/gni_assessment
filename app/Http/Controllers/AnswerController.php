<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $answers = Answer::orderBy('order')->get();

        return view('admin.answers.index', compact('answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questionTypes = QuestionType::orderBy('title')
            ->pluck('title', 'id')
            ->toArray();

        return view('admin.answers.create', compact('questionTypes'));
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
            Answer::create($request->all());

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
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        $answer->load('questionTypes');
        $questionTypes = QuestionType::orderBy('title')
            ->pluck('title', 'id')
            ->toArray();

        return view('admin.answers.edit', compact('answer', 'questionTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        // dd($request->all());
        $sync = [];

        DB::beginTransaction();

        try {
            $answer->update($request->all());

            foreach ($request->input('question_types.ids') as $questionId) {
                $sync[$questionId] = [
                    'score' => $request->input('question_types.score')[$questionId] ?? null,
                    'factor' => $request->input('question_types.score')[$questionId] ?? null,
                ];
            }

            $answer->questionTypes()
                ->sync($sync);

            DB::commit();

            return successMessage();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return errorMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        DB::beginTransaction();

        try {
            $answer->delete();

            DB::commit();

            return successMessage();
        } catch (\Throwable $th) {
            DB::rollBack();

            return errorMessage();
        }
    }
}
