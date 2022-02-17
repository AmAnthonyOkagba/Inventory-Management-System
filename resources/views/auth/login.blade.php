@extends('layouts.base')

@section('content')

<div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row ec_breadcrumb_inner">
                    <div class="col-md-6 col-sm-12">
                        <h2 class="ec-breadcrumb-title">Login</h2>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <ul class="ec-breadcrumb-list">
                            <li class="ec-breadcrumb-item"><a href="/">Home</a></li>
                            <li class="ec-breadcrumb-item active">Login</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ec-page-content section-space-p">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="section-title">
                    <h2 class="ec-bg-title">Log In</h2>
                    <h2 class="ec-title">Log In</h2>
                    <p class="sub-title mb-3">Best place to buy and sell digital products</p>
                </div>
            </div>
            <div class="ec-login-wrapper">
                <div class="ec-login-container">
                    <div class="ec-login-form">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <span class="ec-login-wrap">
                                <label>Email Address*</label>
                                <input type="text" class="@error('email') is-invalid @enderror" name="email" placeholder="Enter your email add..." required value="{{ old('email') }}" autocomplete="email" autofocus />
                                @error('email')
                                    <span class="invalid-feedback text-danger mt-0" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>
                            <span class="ec-login-wrap">
                                <label>Password*</label>
                                <input type="password" class="@error('password') is-invalid @enderror" name="password" placeholder="Enter your password" required />
                                @error('password')
                                    <span class="invalid-feedback text-danger mt-0" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </span>
                            <span class="ec-login-wrap ec-login-fp">
                                @if (Route::has('password.request'))
                                    <label><a href="{{ route('password.request') }}">Forgot Password?</a></label>
                                @endif
                            </span>
                            <span class="ec-login-wrap ec-login-btn">
                                <button class="btn btn-primary" type="submit">Login</button>
                                <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
