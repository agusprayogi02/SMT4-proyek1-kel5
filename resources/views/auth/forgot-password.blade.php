@extends('layouts.auth')

@section('content')
<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
    <x-logo />
    <div class="card card-primary">
        <div class="card-header">
            <h4>Forgot Password</h4>
        </div>
        <div class="card-body">
            <p>We will send a link to reset your password</p>
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label class="font-weight-bold text-uppercase">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                        placeholder="Masukkan Alamat Email">

                    @error('email')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary btn-block">Send Password Reset
                    Link</button>
            </form>
        </div>
    </div>
    <x-auth-footer />
</div>
@endsection