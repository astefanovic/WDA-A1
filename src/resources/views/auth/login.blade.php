@extends('layouts.default')
@section('title', 'Login')
@section('content')

    <div class="container-fluid cover-page">
        <br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-pull-5">
                <h1 class="display-4 py-5">Welcome to RMIT Ticketing Service</h1>
            </div>
        </div>

        <div class="container col align-self-center">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" align="center">
                    <h1 class="display-5 py-3">Login</h1>
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" align="center">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email"
                                       value="{{ old('email') }}"
                                       required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                <strong id="er">{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                <strong id="er">{{ $errors->first('password') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"
                                               name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                                {{--
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a> --}}
                            </div>
                        </div>
                    </form>
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Forgot Password
                        </button>
                        {{--
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a> --}}
                    </div>
                    <br>
                    <p> No account? <a href="http://localhost/WDA-A1/src/public/register">Sign up here</a></p>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

@endsection
