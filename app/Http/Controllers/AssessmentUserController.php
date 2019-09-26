<?php

namespace App\Http\Controllers;

use App\Models\AssessmentUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssessmentUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessmentUsers = AssessmentUser::orderBy('name')
            ->get();

        return view('admin.assessmentUsers.index', compact('assessmentUsers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assessmentUsers.create');
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
            AssessmentUser::create($request->all());

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
     * @param  \App\Models\AssessmentUser  $assessmentUser
     * @return \Illuminate\Http\Response
     */
    public function show(AssessmentUser $assessmentUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessmentUser  $assessmentUser
     * @return \Illuminate\Http\Response
     */
    public function edit(AssessmentUser $assessmentUser)
    {
        return view('admin.assessmentUsers.edit', compact('assessmentUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssessmentUser  $assessmentUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssessmentUser $assessmentUser)
    {
        DB::beginTransaction();

        try {
            $assessmentUser->update($request->all());

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
     * @param  \App\Models\AssessmentUser  $assessmentUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssessmentUser $assessmentUser)
    {
        DB::beginTransaction();

        try {
            $assessmentUser->delete();

            DB::commit();

            return successMessage();
        } catch (\Throwable $th) {
            DB::rollBack();

            return errorMessage();
        }
    }
}
