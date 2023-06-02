@extends('layouts.app')

@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title"><span class="orange strong">Forgot Password</span></h1>
            </div>
        </div>
    </div>
</div>
<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 profiel-container">
        <div class="col-md-8">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="profiel-header">
                            <h3>
                                <b>Forgot</b> YOUR PASSWORD <br>
                                <small>All change will send to your e-mail.</small>
                            </h3>
                            <hr>
                        </div>

                        <div class="clear">
                            <div class="col-sm-10 col-sm-offset-1">
                        <div class="form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
