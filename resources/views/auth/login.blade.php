@extends('layouts.app')

@section('body_class', 'bg-primary')

@section('styles')
    <style>
        .card {
            width: 350px;
            height: auto;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .card-title{
            text-transform: uppercase;
            font-size: 1.1rem;
            font-weight: 500;
            text-align: center;
            margin-bottom: 0px;
        }

        .mdi-128 {
            font-size: 128px;
        }

        .mdi-transparent-25 {
            opacity: 0.10;
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title widget-title">
                {{ $seo_title }}
            </div>
        </div>
        <form action="{{ route('login') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="text-center pb-3">
                    <img src="http://lostisland.org/wp-content/uploads/2017/07/For-Favicon-4.png" width="150">
                </div>

                @include('errors.list')

                <div class="form-group{{ $errors->has('username') ? ' is-invalid' : '' }}">
                    <label for="username" class="sr-only">{{ trans('form.username') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}" placeholder="{{ trans('form.username') }}...">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' is-invalid' : '' }}">
                    <label for="password" class="sr-only">{{ trans('form.password') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-key"></i>
                            </div>
                        </div>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="{{ trans('form.password') }}...">
                    </div>
                </div>

                <div class="form-group">
                    <label for="auth_token" class="sr-only">{{ trans('form.auth_token') }}</label>
                    <div class="input-group" data-toggle="tooltip" data-placement="top" data-html="true" title="2FA via Google Authenticator!<br><i>First time?</i> Leave this field empty">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-fingerprint"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="auth_token" name="auth_token" value="{{ old('auth_token') }}" placeholder="{{ trans('form.auth_token') }}..." autocomplete="off">
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-shield-alt"></i> {{ trans('form.buttons.login') }}
                </button>
            </div>
        </form>
    </div>
@endsection
