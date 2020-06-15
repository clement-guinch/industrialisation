@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.post.title_singular') }}
        </div>
        <div class="card-body">
            <form action="{{ route("admin.posts.update", [$post->id]) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="title">{{ trans('cruds.post.fields.title') }}*</label>
                    <input type="text" id="title" name="title" class="form-control"
                           value="{{ old('name', isset($post) ? $post->title : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.post.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="content">{{ trans('cruds.post.fields.content') }}*</label>
                    <input type="text" id="content" name="content" class="form-control"
                           value="{{ old('name', isset($post) ? $post->content : '') }}" required>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.post.fields.title_helper') }}
                    </p>
                </div>
                <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="category_id">{{ trans('cruds.post.fields.categories') }}*</label>
                    <select name="category_id" id="">
                        <option value="" selected disabled>Catégorie</option>
                        <?php foreach($categories as $category){ ?>
                        <option value="<?php echo $category->id;?>"><?php echo $category->name; ?></option>
                        <?php } ?>
                    </select>
                    @if($errors->has('name'))
                        <em class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('cruds.post.fields.title_helper') }}
                    </p>
                </div>
                <div>
                    <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                </div>
            </form>
        </div>
    </div>
@endsection