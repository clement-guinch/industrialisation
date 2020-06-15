<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Traits\FileUploadTrait;
use App\Http\Models\Album;
use App\Http\Requests\Admin\StoreAlbumRequest;
use App\Http\Requests\Admin\UpdateAlbumRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;


class AlbumsController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('albums_manage')) {
            return abort(401);
        }

        if (file_exists(public_path('uploads')))
        {
            $albums = file_exists(public_path('uploads'));
            return view('admin.albums.index', compact('albums'));
        } else {
            $albums = Album::all();
            return view('admin.albums.index', compact('albums'));
        }

    }

    /**
     * Show the form for creating new Role.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('albums_manage')) {
            return abort(401);
        }
        // $permissions = Permission::get()->pluck('name', 'name');

        return view('admin.albums.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param  \App\Http\Requests\StoreAlbumRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAlbumRequest $request)
    {
        if (! Gate::allows('albums_manage')) {
            return abort(401);
        }
        $album = Album::create($request);
        // $permissions = $request->input('permission') ? $request->input('permission') : [];
        // $album->givePermissionTo($permissions);

        return redirect()->route('admin.albums.index');
    }

    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        if (! Gate::allows('albums_manage')) {
            return abort(401);
        }
        // $permissions = Permission::get()->pluck('name', 'name');

        return view('admin.albums.edit', compact('albums', 'permissions'));
    }

    /**
     * Update Role in storage.
     *
     * @param  \App\Http\Requests\UpdateAlbumRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        if (! Gate::allows('albums_manage')) {
            return abort(401);
        }

        $album->update($request->except('permission'));
        // $permissions = $request->input('permission') ? $request->input('permission') : [];
        $album->syncPermissions($permissions);

        return redirect()->route('admin.albums.index');
    }

    public function show(Album $album)
    {
        if (! Gate::allows('albums_manage')) {
            return abort(401);
        }

        $album->load('permissions');

        return view('admin.albums.show', compact('albums'));
    }


    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        if (! Gate::allows('albums_manage')) {
            return abort(401);
        }

        $album->delete();

        return redirect()->route('admin.albums.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        Album::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

}
