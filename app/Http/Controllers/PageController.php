<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\PageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::with('pageType')->get();

        return view('admin.pages.index', compact('pages'));
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

        return view('admin.pages.create', compact('pageTypes'));
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
            $page = Page::make($request->all());
            $page->pageType()
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
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit(Page $page)
    {
        $page->load('pageType');

        $pageTypes = PageType::orderBy('name')
            ->pluck('name', 'id')
            ->toArray();

        return view('admin.pages.edit', compact('page', 'pageTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        DB::beginTransaction();

        try {
            $pageType = PageType::findOrFail($request->input('page_type_id'));
            $page->update($request->all());
            $page->pageType()
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
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        DB::beginTransaction();

        try {
            $page->delete();

            DB::commit();

            return successMessage();
        } catch (\Throwable $th) {
            DB::rollBack();

            return errorMessage();
        }
    }
}
