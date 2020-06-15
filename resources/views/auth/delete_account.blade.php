@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        @if(\Session::has('message'))
                            <p class="alert alert-info">
                                {{ \Session::get('message') }}
                            </p>
                        @endif
                        <form method="POST" action="{{ route('auth.delete_account') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            {{ csrf_field() }}
                            <h1>{{ env('APP_NAME', 'Permissions Manager') }}</h1>
                            <p class="text-muted">Supprimer son compte</p>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                </div>
                                <input name="confirm_password" type="password"
                                       class="form-control{{ $errors->has('confirm_password') ? ' is-invalid' : '' }}" required
                                       placeholder="Password">
                                @if($errors->has('confirm_password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('confirm_password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <div id="example1" class="g-recaptcha"
                                     data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}">
                                </div>
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                                <input type="hidden" name="g-recaptcha-response" value="success">
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary px-4">
                                        supprimer
                                    </button>
                                </div>
                                <div class="col-6 text-right">
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                        Mot de passe oublié?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection