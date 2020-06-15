<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Comment;
use App\Http\Controllers\Traits\FileUploadTrait;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class PresentationController extends Controller
{

    use FileUploadTrait;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function presentation()
    {
        return view('presentation');
        // $comments = Comment::all();
    }

    public function sendFile(Request $request) {
        // dd($request);
        // foreach ($request->all() as $key => $value) {
        //     dd($request->hasFile($value));
        //     dd($key);
        //     dd($value);
        // }
        // $this->saveFiles($request);
    }
}
