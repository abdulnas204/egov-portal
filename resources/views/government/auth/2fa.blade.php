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
            <div class="card-title">
                {{$seo_title}}
            </div>
        </div>
        <form action="{{ route('government.activate_2fa') }}" method="post">
            {{ csrf_field() }}
            <div class="card-body">
                <div class="text-center pb-3">
                    <img src="{{ $qrImage }}" alt="QRCode for google authenticator app">
                </div>

                @include('errors.list')

                <div class="form-group">
                    <label for="auth_token" class="sr-only">{{ trans('form.auth_token') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-fingerprint"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="auth_token" name="auth_token" readonly="readonly" value="{{ $secretKey }}" autocomplete="off">
                    </div>
                </div>

                <div class="form-group{{ $errors->has('token') ? ' is-invalid' : '' }}">
                    <label for="password" class="sr-only">{{ trans('form.token') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-fingerprint"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control" id="token" name="token" placeholder="{{ trans('form.token') }}...">
                    </div>
                </div>
            </div>

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-secondary">
                    {{ trans('form.buttons.activate') }}
                </button>
            </div>
        </form>
    </div>
@endsection
