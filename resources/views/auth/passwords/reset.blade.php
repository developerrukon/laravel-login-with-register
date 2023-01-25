@extends('layouts.app')

@section('content')

<main class="section-login">
    <section class="section-login--logo">
      <a href="index.html">
        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="logo" class="img-fluid" />
      </a>
    </section>

    <section class="section-login--form">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="card">
              <div class="card-title">Sign In</div>
              <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">
                  <div class="mt-3">
                    <label for="" class="form-label">{{ __("Email") }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="mt-3">
                    <label for="" class="form-label">{{ __("Password") }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="mt-3">
                    <label for="" class="form-label">{{ __("Confirm Password") }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                  </div>

                  <div class="mt-5">
                    <button type="submit" class="btn btn-primary form-control mb-5">
                        {{ __('Reset Password') }}
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

@endsection
