@extends('layouts.app')

@section('content')
<div class="container">
        <form class="form-signin" method="POST" action="login">
            @csrf
                <img src="/img/logobgR.png" style="width:100px;" class="logo">
                <h4>Nippon Line Co.Ltd</h4>
                <h3><b>Administrator Login</b></h3>
                <br>
                            <label for="email">Email address</label>
                                <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                            <label for="password">Password</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <button class="btn btn-lg btn-primary btn-block" id="submit" type="submit">Sign in</button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <br>
                                <br>
                                <a href="/">Return to website</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
