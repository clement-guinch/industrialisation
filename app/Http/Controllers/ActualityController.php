<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActualityController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function actuality()
    {
        $posts = Post::orderBy('created_at', 'DESC')->get();
        return view('actuality', ['posts' => $posts]);
    }
}
