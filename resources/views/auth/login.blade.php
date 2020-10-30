@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center py-5">
        <div class="col-6">
            <h3 class=" text-center">Wellcome to</h3>
            <a class="p-5" href="{{ url('/') }}">
                <div class="mb-4"><img src="/svg/instantgram.svg" style="height: 100px;display: block;margin: 0 auto;"></div>
                <div><img src="/svg/instantgramText.svg" style="height: 69px;display: block;margin: 0 auto;"></div>
            </a>
            <h3 class=" text-center my-3"><strong>The social media site you never wanted!</strong></h3>
            <h5 class=" text-center my-5">Start today and be a part of this giant community of more than 3 members and millions of potential posts!</h5>
            <h5 class=" text-center my-5"> Login or Register! And if you just want to visit someones profile, just visit “/profile/id-of-user”! Try this! <a href="/profile/1">JafarJ</a></h5>
            <h5 class=" text-center my-5">Original code on Github!</h5>
            <h3 class=" text-center my-3"><strong>Now go inside and get some of that free dopamine!</strong></h3>

        </div>
        <div class="col-6">
            <div class="card">
                <a class="p-5" href="{{ url('/') }}">
                    <div><img src="/svg/instantgramText.svg" style="height: 50px;display: block;margin: 0 auto;"></div>
                </a>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row mb-5">
                            <label for="email" class="col-12 col-form-label text-center"><strong>{{ __('E-Mail Address') }}</strong></label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-5">
                            <label for="password" class="col-12 col-form-label text-center"><strong>{{ __('Password') }}</strong></label>

                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 ">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link w-100 mt-3" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card my-5 p-3">
                <p class="m-0 text-center">Don't have an account? <a href="/register">Sign up</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
