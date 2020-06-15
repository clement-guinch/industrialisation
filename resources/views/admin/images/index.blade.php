@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.image.title_singular') }}
        </div>
        <div class="card-body">
            <div class="zone">
                <form action="{{ route("admin.images.store") }}" enctype="multipart/form-data" class="dropzone"
                      id="fileupload" method="POST">
                    @csrf
                    <div class="fallback">
                        <input name="file" type="files" multiple accept="image/jpeg, image/png, image/jpg"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            {{ trans('global.list') }} {{ trans('cruds.image.title_singular') }}
        </div>
        <div class="card-body list">
            @foreach($images as $image)
                <div class="card mb-3 list__card">
                    <p class="card-header">{{ $image }}</p>
                    <img style="height: 200px; width: 100%; display: block;" src="{{ asset( $path . '/' . $image ) }}"
                         alt="Card image">
                    <div class="card-footer text-muted">
                        lorem
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection