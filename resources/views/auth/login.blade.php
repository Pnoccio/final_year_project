@extends('auth.layouts.app')

@section('title', 'Login')

@section('content')
    <div class="row justify-content-center">

        <div class="text-center mt-5">
            <h1 class="text-gray-900">Final Year Project - Admin Panel</h1>
        </div>

        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">

                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login to Your Account</h1>
                    </div>

                    @if (session('error'))
                        <span class="text-danger"> {{ session('error') }}</span>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <input id="email" type="email"
                                class="form-control form-control-user @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Enter Email Address.">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" type="password"
                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox small">
                                <input class="custom-control-input" type="checkbox" name="remember" id="customCheck"
                                    {{ old('remember') ? 'checked' : '' }}>

                                <label class="custom-control-label" for="customCheck">Remember
                                    Me</label>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                        @if (auth()->guest())
                            @if (!\App\Models\User::where('email', request()->email)->exists())
                                <a class="small" href="{{ route('register') }}">Create an Account</a>
                            @endif
                            
                        @endif
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
