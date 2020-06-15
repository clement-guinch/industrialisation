<?php

namespace App\Http\Controllers\Admin;


use App\Category;
use App\Http\Requests\Admin\StoreCategoriesRequest;
use App\Http\Requests\Admin\UpdateCategoriesRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CategoriesController extends Controller
{
    /**
     * Display a listing of Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }

        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating new Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }

        return view('admin.categories.create');
    }

    /**
     * Store a newly created Category in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreCategoriesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesRequest $request)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }
        Category::create($request->all());


        return redirect()->route('admin.categories.index');
    }


    /**
     * Show the form for editing Category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }

        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update Category in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateCategoriesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriesRequest $request, Category $category)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }
        $category->update($request->all());

        return redirect()->route('admin.categories.index');
    }

    public function show(Category $category)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }

        $category->load('permissions');

        return view('admin.categories.show', compact('category'));
    }


    /**
     * Remove Categories from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }

        $category->delete();

        return redirect()->route('admin.categories.index');
    }

    /**
     * Delete all selected Category at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Category::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
