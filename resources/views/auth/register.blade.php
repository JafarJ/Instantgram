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
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-12 col-form-label text-center">{{ __('Name') }}</label>

                            <div class="col-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-12 col-form-label text-center">{{ __('E-Mail Address') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-12 col-form-label text-center">Username</label>

                            <div class="col-12">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-12 col-form-label text-center">{{ __('Password') }}</label>

                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-12 col-form-label text-center">{{ __('Confirm Password') }}</label>

                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 my-4">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="card my-5 p-3">
                <p class="m-0 text-center">Have an account? <a href="/login">Log in</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
