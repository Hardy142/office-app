<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/dropzone.js') }}" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

        <!-- Font Awesome 5 Kit -->
        <script src="https://kit.fontawesome.com/019ef34773.js" crossorigin="anonymous"></script>

        <!-- Styles -->
        <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="homepage-background">

        @if(count($users) > 0)

        <div class="login-register-container">
            <div class="login-header">
                {{ __('Login') }}
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group row">
                    <div class="col-md-12 col-sm-12">
                        <label for="email">{{ __('E-Mail Address') }}</label>
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required autocomplete="email" 
                            autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-sm-12">
                        <label for="password">{{ __('Password') }}</label>
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            required 
                            autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12 col-sm-12">
                        <button type="submit" class="office-button-primary">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                    </div>
                </div>
            </form>
        </div>

        @else

        <div class="login-register-container">
            <div class="login-header">
                {{ __('Application Owner') }}
            </div>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="name">{{ __('Name') }}</label>
                        <input 
                            id="name" 
                            type="text" 
                            class="form-control @error('name') is-invalid @enderror" 
                            name="name" 
                            value="{{ old('name') }}" 
                            required 
                            autocomplete="name" 
                            autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="email" >{{ __('E-Mail Address') }}</label>
                        <input 
                            id="email" 
                            type="email" 
                            class="form-control @error('email') is-invalid @enderror" 
                            name="email" 
                            value="{{ old('email') }}" 
                            required 
                            autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="password">{{ __('Password') }}</label>
                        <input 
                            id="password" 
                            type="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            name="password" 
                            required 
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input 
                            id="password-confirm" 
                            type="password" 
                            class="form-control" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-12">
                        <input type="hidden" id="user_role" name="user_role" value="1" />
                        <button type="submit" class="office-button-primary">
                            {{ __('Add Super Admin') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>

        @endif

        </div>
    </body>
</html>