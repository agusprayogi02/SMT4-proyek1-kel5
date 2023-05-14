@extends('layouts.auth')

@section('content')
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <x-logo />
    <div class="card card-primary">
        <div class="card-header">
            <h4>Register</h4>
        </div>
        @include('layouts.alert')
        <div class="card-body">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <div class="form-group">
                            <label for="first_name">Full Name</label>
                            <input id="first_name" type="text" name="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                placeholder="Masukkan Nama Lengkap" autofocus>
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Masukkan Alamat Email">
                            @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-6">
                        <div class="form-group">
                            <label for="password" class="d-block">Password</label>
                            <input id="password" type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Masukkan Password" data-indicator="pwindicator">
                            <div id="pwindicator">
                                <div class="bar"></div>
                                <div class="label"></div>
                            </div>
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group col-6">
                        <div class="form-group">
                            <label for="password_confirmation" class="d-block">Password
                                Confirmation</label>
                            <input id="password_confirmation" id="password_confirmation" name="password_confirmation"
                                type="password" class="form-control" placeholder="Masukkan Konfirmasi Password">
                            @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option>Pilih Role</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @error('role')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="mt-5 text-muted text-center">
        Do have an account? <a href="/login">Login</a>
    </div>
    <x-auth-footer />
</div>
@endsection

@push('customScript')
<script>
    $(document).ready(function () {
        $('#email').focus();
        $("#password").pwstrength();
    });
</script>
@endpush