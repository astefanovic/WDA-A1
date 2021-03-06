@extends('layouts.default')
@section('title', 'Login')
@section('content')

    <div class="container-fluid cover-page">
        <div class="row h-100 justify-content-center">
            <div class="col-md-6 my-auto">
                <div class="card text-center" id="cardColor">
                    <div class="card-body" align="center">
                        <h1 class="card-title display-4 py-4">Welcome to RMIT Ticketing Service</h1>
                        <hr>
                        <h1 class="display-4 py-3 text-center">Login</h1>
                        <form class="form-horizontal py-2" method="POST"
                              action="{{ route('login') }}">
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
                        <hr class="py-2">
                        <p> No account? <a href="http://localhost/WDA-A1/src/public/register">Sign up here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
