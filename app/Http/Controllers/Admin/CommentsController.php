<?php

namespace App\Http\Controllers\Admin;


use App\Comment;
use App\Http\Requests\Admin\StoreCommentsRequest;
use App\Http\Requests\Admin\UpdateCommentsRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CommentsController extends Controller
{
    /**
     * Display a listing of Comment.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('comments')) {
            return abort(401);
        }

        $comments = Comment::all();

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Store a newly created Comment in storage.
     *
     * @param  \App\Http\Requests\Admin\StoreCommentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentsRequest $request)
    {
        if (! Gate::allows('comments')) {
            return abort(401);
        }
        Comment::create($request->all());


        return redirect()->route('comment');
    }


    /**
     * Show the form for editing Comment.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        if (! Gate::allows('comments')) {
            return abort(401);
        }

        return view('admin.comments.edit', compact('comment'));
    }

    /**
     * Update Comment in storage.
     *
     * @param  \App\Http\Requests\Admin\UpdateCommentsRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentsRequest $request, Comment $comment)
    {
        if (! Gate::allows('comments')) {
            return abort(401);
        }
        $comment->update($request->all());

        return redirect()->route('admin.comments.index');
    }

    public function show(Comment $comment)
    {
        if (! Gate::allows('comments')) {
            return abort(401);
        }

        $comment->load('permissions');

        return view('admin.comments.show', compact('comment'));
    }


    /**
     * Remove Post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        if (! Gate::allows('comments')) {
            return abort(401);
        }

        $comment->delete();

        return redirect()->route('admin.comments.index');
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
