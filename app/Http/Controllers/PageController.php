<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('actuality');
    }

    public function album()
    {
        return view('album');
    }

    // public function presentation()
    // {
    //     return view('presentation');
    // }

    
}
