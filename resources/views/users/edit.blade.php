@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Table</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Edit User</h2>
        <div class="card">
            <form action="{{ route('user.update', $user) }}" method="POST">
                <div class="card-header">
                    <h4>Validasi Edit Data User</h4>
                </div>
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <x-form.input type='text' name="name" label="Your Name" :value="old('name', $user->name)" />
                    <x-form.input type="email" name="email" label="Email" :value="old('email', $user->email)" />
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('user.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection