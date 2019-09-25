<?php

namespace App\Http\Controllers;

use App\Models\PageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTypes = PageType::orderBy('order')->get();

        return view('admin.pageTypes.index', compact('pageTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pageTypes.create');
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
            PageType::create($request->all());

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
     * @param  \App\Models\PageType  $pageType
     * @return \Illuminate\Http\Response
     */
    public function show(PageType $pageType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PageType  $pageType
     * @return \Illuminate\Http\Response
     */
    public function edit(PageType $pageType)
    {
        return view('admin.pageTypes.edit', compact('pageType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PageType  $pageType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PageType $pageType)
    {
        DB::beginTransaction();

        try {
            $pageType->update($request->all());

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
     * @param  \App\Models\PageType  $pageType
     * @return \Illuminate\Http\Response
     */
    public function destroy(PageType $pageType)
    {
        DB::beginTransaction();

        try {
            $pageType->delete();

            DB::commit();

            return successMessage();
        } catch (\Throwable $th) {
            DB::rollBack();

            return errorMessage();
        }
    }
}
