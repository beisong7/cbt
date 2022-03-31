@extends('auth.layouts.app')

@section('page_title', 'Password Recovery')

@section('content')

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Password Recovery</h1>
                        <p class="signup-link recovery">Enter your email and a reset link will be sent to you!</p>

                        @if (session('status'))
                            <div class="alert alert-light-success text-left" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="text-left" action="{{ $type==="organization"?route('password.mail.org'):route('password.email') }}" method="POST">
                            @csrf
                            <div class="form">
                                <div id="email-field" class="field-wrapper input">
                                    <div class="d-flex justify-content-between">
                                        <label for="email">EMAIL</label>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                    <input id="email" name="email" type="email" class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="joedoe@mail.com" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                          {{ $message }}
                                        </span>
                                    @enderror
                                </div>

                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Send Password Reset Link</button>
                                    </div>
                                </div>

                                <p class="signup-link mb-1">Do you know your password ? <a href="{{ route('login') }}">Login</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
