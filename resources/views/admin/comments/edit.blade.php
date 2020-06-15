@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.comment.title_singular') }}
        </div>
        <div class="card-body">
            <form action="{{ route("admin.comments.update", [$comment->id]) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name">{{ trans('cruds.comment.fields.title') }}*</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($comment) ? $comment->name : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.comment.fields.title_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection