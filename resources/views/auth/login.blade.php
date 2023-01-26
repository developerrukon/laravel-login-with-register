@extends('layouts.app')

@section('content')
<main class="section-login">
    <section class="section-login--logo">
      <a class="" href="{{ route('login') }}">
        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo" class="img-fluid" />
      </a>
    </section>

    <section class="section-login--form">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="card">
              <div class="card-title">{{ __('Sign In') }}</div>
              <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                  <div class="mt-3">
                    <label for="" class="form-label">{{ __('Email') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mt-3">
                    <label for="" class="form-label">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mt-3">
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                    @error('g-recaptcha-response')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <small class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </small>
                    </div>
                  </div>
                  <div class="mt-5">
                    <button type="submit" class="btn btn-primary form-control">
                        {{ __('Login') }}
                    </button>
                  </div>
                </form>
                <div class="links">
                  <p>
                    <a href="{{ route('register') }}">{{ __('Need an account?') }}</a>
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">
                        {{ __('Forgot Password?') }}
                    </a>
                @endif
                  </p>
                </div>
                <div class="back-button">
                  <a href="{{ route('register') }}">
                    <i class="bi bi-arrow-left-circle"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
