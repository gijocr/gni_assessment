<?php

namespace App\Http\Controllers;

use App\Models\QuestionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionTypes = QuestionType::orderBy('order')->get();

        return view('admin.questionTypes.index', compact('questionTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questionTypes.create');
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
            QuestionType::create($request->all());

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
     * @param  \App\Models\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function show(QuestionType $questionType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function edit(QuestionType $questionType)
    {
        return view('admin.questionTypes.edit', compact('questionType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuestionType $questionType)
    {
        DB::beginTransaction();

        try {
            $questionType->update($request->all());

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
     * @param  \App\Models\QuestionType  $questionType
     * @return \Illuminate\Http\Response
     */
    public function destroy(QuestionType $questionType)
    {
        DB::beginTransaction();

        try {
            $questionType->delete();

            DB::commit();

            return successMessage();
        } catch (\Throwable $th) {
            DB::rollBack();

            return errorMessage();
        }
    }
}
