<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;


class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!Gate::allows('images_manage')) {
            return abort(401);
        }

        $images = array_diff(scandir($this->imageDir()), array('..', '.'));

        $path = ('storage/images');

        return view('admin.images.index', ['images' => $images, 'path' => $path]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function imageDir()
    {
        $path = storage_path('app/public/images');
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }

        return $path;
    }

    public function store(Request $request)
    {
        $image = $request->file('file');
        $imageName = time() . $image->getClientOriginalName();

        $upload_success = $image->move($this->imageDir(), $imageName);

        if ($upload_success) {
            return response()->json($upload_success, 200);
        } // Else, return error 400
        else {
            return response()->json('error', 400);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
