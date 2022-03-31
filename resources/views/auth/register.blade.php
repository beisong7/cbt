@extends('auth.layouts.app')

@section('page_title', 'Create an Account')

@section('content')

    @include('session.config.invite')

    <div class="form-container outer mt-5">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="mt-2">Sign-Up</h1>
                        <p class="mb-0">Create an account to continue.</p>

                        <div class="widget-content widget-content-area tab-justify-centered">
                            <ul class="nav nav-tabs  mb-4 mt-1 justify-content-center" id="justifyCenterTab" role="tablist">
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

                                    @include('_shared-components._display_alert')

                                    <form class="text-left" action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form">
                                            <div class="field-wrapper input">
                                                <label class="text-uppercase">FIRST NAME</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                <input id="first-name" name="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" placeholder="John" required>
                                                @error('first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="field-wrapper input">
                                                <label class="text-uppercase">LAST NAME</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                <input id="last-name" name="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" placeholder="Doe" required>
                                                @error('last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="field-wrapper input">
                                                <label class="text-uppercase">CANDIDATE'S EMAIL</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="candidate@email.com" required>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="field-wrapper input mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label class="text-uppercase">PASSWORD</label>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="********" autocomplete="off" required>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="d-sm-flex justify-content-between">
                                                <div class="field-wrapper">
                                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="organization" role="tabpanel" aria-labelledby="organization-tab">

                                    @include('_shared-components._display_alert')

                                    <form class="text-left" action="{{ route('organization.register', '#organization') }}" method="POST">
                                        @csrf
                                        <div class="form">
                                            <div class="field-wrapper input">
                                                <label class="text-uppercase">FIRST NAME</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                <input name="owner_first_name" type="text" value="{{ old('owner_first_name') }}" class="form-control @error('owner_first_name') is-invalid @enderror" placeholder="Larry" required>
                                                @error('owner_first_name')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="field-wrapper input">
                                                <label class="text-uppercase">LAST NAME</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                                <input name="owner_last_name" type="text" value="{{ old('owner_last_name') }}" class="form-control @error('owner_last_name') is-invalid @enderror" placeholder="James" required>
                                                @error('owner_last_name')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="field-wrapper input">
                                                <label class="text-uppercase">OWNER'S EMAIL</label>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign register"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                                <input name="owner_email" type="email" value="{{ old('owner_email') }}" class="form-control @error('owner_email') is-invalid @enderror" placeholder="owner@email.com" required>
                                                @error('owner_email')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="field-wrapper input mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <label class="text-uppercase">PASSWORD</label>
                                                </div>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                                <input id="password2" name="owner_password" type="password" class="form-control @error('owner_password') is-invalid @enderror" placeholder="********" autocomplete="off" required>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password2" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                @error('owner_password')
                                                    <span class="invalid-feedback" role="alert">
                                                      {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="d-sm-flex justify-content-between">
                                                <div class="field-wrapper">
                                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <p class="signup-link mt-2 mb-2">Already have an account? <a href="{{ route('login') }}">Login</a></p>

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
