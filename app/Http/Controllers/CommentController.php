<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function comment()
    {
        // $comments = Comment::all();
        $comments = Comment::where('comment_id', null)->get();
        $user = Auth::getUser();
        return view('comment', ['user' => $user, 'comments' => $comments]);
    }
}
