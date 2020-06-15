<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Models\Post;
use App\Http\Requests\Admin\StorePostsRequest;
use App\Http\Requests\Admin\UpdatePostsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }

        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }
        $user = Auth::getUser();
        $categories = Category::all();

        return view('admin.posts.create', [ 'user' => $user, 'categories' => $categories ], compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\Admin\StorePostsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostsRequest $request)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }
        Post::create($request->all());


        return redirect()->route('admin.posts.index');
    }


    /**
     * Show the form for editing Post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }
        $user = Auth::getUser();
        $categories = Category::all();
        return view('admin.posts.edit', compact('post','user', 'categories'));
    }

    /**
     * Update Post in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdatePostsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, Post $post)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }

        $post->update($request->all());

        return redirect()->route('admin.posts.index');
    }

    public function show(Post $post)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }

        $post->load('permissions');

        return view('admin.posts.show', compact('post'));
    }


    /**
     * Remove Post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (! Gate::allows('posts_manage')) {
            return abort(401);
        }

        $post->delete();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Post::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
