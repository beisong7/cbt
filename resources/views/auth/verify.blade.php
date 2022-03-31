@extends('auth.layouts.app')

@section('page_title', 'Reset Password')

@section('content')

    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="mt-2 mb-5">Verify Your Email Address</h1>

                        @if (session('resent'))
                            <div class="alert alert-light-success text-left" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <p class="mb-3">
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                        </p>

                        <form class="text-left" action="{{ route('verification.resend') }}" method="POST">
                            @csrf
                            <div class="form">
                                <div class="d-sm-flex justify-content-between mb-3">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary">click here to request another</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
