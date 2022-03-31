@extends('auth.layouts.app')

@section('page_title', 'Login')

@section('content')

    @include('session.config.invite')

    <div class="form-container outer mt-5">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="mt-1">Log In</h1>
                        <p class="mb-0">Log in to your account to continue.</p>

                        <div class="widget-content widget-content-area tab-justify-centered">
                            <ul class="nav nav-tabs  mb-4 mt-0 justify-content-center" id="justifyCenterTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="candidate-tab" data-toggle="tab" href="#candidate" role="tab" aria-controls="candidate" aria-selected="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="mt-1 web-only" style="vertical-align: middle; display: inline-block;">Candidate</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="organization-tab" data-toggle="tab" href="#organization" role="tab" aria-controls="organization" aria-selected="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-briefcase"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"></rect><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path></svg>
                                        <span class="mt-1 web-only" style="vertical-align: middle; display: inline-block;">Organization</span>
                                    </a>
                                </li>

                            </ul>

                            <div class="tab-content" id="justifyCenterTabContent">

                                <div class="tab-pane fade show active" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
                                    <form class="text-left" action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form">
                                            <div class="field-wrapper input">
                                                <label class="text-uppercase">CANDIDATE'S EMAIL</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                                <input id="email" name="email" type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="candidate@email.com" required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="field-wrapper input mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label class="text-uppercase">CANDIDATE'S PASSWORD</label>
                                                    <a href="{{ route('password.request', ['_type'=>encrypt('candidate')]) }}" class="forgot-pass-link">Forgot Password?</a>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" required autocomplete="off">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="field-wrapper keep-logged-in mb-3">
                                                <div class="n-chk new-checkbox checkbox-outline-primary">
                                                    <label class="new-control new-checkbox checkbox-outline-primary" style="font-size: 12px;">
                                                      <input type="checkbox" name="remember" class="new-control-input" {{ old('remember') ? 'checked' : '' }}>
                                                      <span class="new-control-indicator"></span>Keep me logged in
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="d-sm-flex justify-content-between">
                                                <div class="field-wrapper">
                                                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <p class="signup-link mt-2 mb-2">Not registered ? <a href="{{ route('register') }}#candidate">Create an account</a></p>
                                </div>

                                <div class="tab-pane fade" id="organization" role="tabpanel" aria-labelledby="organization-tab">

                                    @if (session()->has('warning') || session()->has('info'))
                                        @include('_shared-components._display_alert')
                                    @endif

                                    <form class="text-left" action="{{ route('organization.login', '#organization') }}" method="POST">
                                        @csrf
                                        <div class="form">
                                            <div class="field-wrapper input">
                                                <label class="text-uppercase">STAFF EMAIL</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                                <input name="staff_email" type="email" class="form-control @error('staff_email') is-invalid @enderror" placeholder="staff@email.com" value="{{ old('staff_email') }}" required>
                                                @error('staff_email')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="field-wrapper input mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label class="text-uppercase">STAFF PASSWORD</label>
                                                    <a href="{{ route('password.request', ['_type'=>encrypt('organization')]) }}" class="forgot-pass-link">Forgot Password?</a>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                                <input id="password2" name="staff_password" type="password" class="form-control @error('staff_password') is-invalid @enderror" placeholder="********" autocomplete="off" required>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password2" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                @error('staff_password')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="field-wrapper keep-logged-in mb-3">
                                                <div class="n-chk new-checkbox checkbox-outline-primary">
                                                    <label class="new-control new-checkbox checkbox-outline-primary" style="font-size: 12px;">
                                                      <input type="checkbox" name="staff_remember" class="new-control-input" {{ old('staff_remember') ? 'checked' : '' }}>
                                                      <span class="new-control-indicator"></span>Keep me logged in
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="d-sm-flex justify-content-between">
                                                <div class="field-wrapper">
                                                    <button type="submit" class="btn btn-primary" value="">Log In</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                        <p class="signup-link mt-2 mb-2">Not registered ? <a href="{{ route('register') }}#organization">Create an account</a></p>
                                </div>

                            </div>
                        </div>

                    </div>
                    @include('session.invite.index')
                </div>
            </div>
        </div>

    </div>


@endsection

@section('custom_js')
<script type="text/javascript">
    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
    }

    // Change hash for page-reload
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    })
</script>
@endsection
