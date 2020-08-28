<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Repositories\PageRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PageController extends Controller
{
    private $pageRepository;

    public function __construct()
    {
        $this->middleware(['auth'])->only(['edit', 'update']);

        $this->pageRepository = new PageRepository();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Page $page
     * @return Application|Factory|View
     */
    public function show(Page $page)
    {
        return view($page->name, compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Application|Factory|View
     */
    public function edit(Page $page)
    {
        return view('edit-page', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function update(Request $request, Page $page)
    {
        $result = $this->pageRepository->update($request, $page);

        return redirect()
            ->route('pages.show', $page)
            ->with([
                'success' => 'Страница обновлена',
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return void
     */
    public function destroy(Page $page)
    {
        //
    }
}
