@extends('layouts.default')
@section('content')

<body style="overflow: hidden">
<div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <h2 class="text-center"><strong>Register</strong> an account.</h2>
                <div class="form-group">
                    <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" required autofocus>
                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" required>
                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('phone') is-invalid @enderror" type="number" name="phone" placeholder="Phone Number" required oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==11 && event.keyCode!=8) return false;">
                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" required>
                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Register</button></div>
                <div class="form-group"><a href="{{ url('/login') }}" class="btn btn-register btn-block">Cancel</a></div>
            </form>
        </div>
    </div>
</body>
@endsection
