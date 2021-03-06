@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ ($securityQuestion) ? __('Security Question') : __('Confirm Password') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        @if($securityQuestion)
                        <b>{{ $securityQuestion->question }}</b>
                        <br />
                        <input type="text" name="security_answer" id="security_answer" class="form-control @error('security_answer') is-invalid @enderror" value="{{ old('security_answer') }}" autocomplete="off" required>

                        @error('security_answer')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <br>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                {{ __('Confirm Answer') }}
                            </button>
                        </div>

                        @else

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
