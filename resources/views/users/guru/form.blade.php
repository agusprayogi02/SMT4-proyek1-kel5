@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($guru) ? 'Edit' : 'Tambah' }} Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($guru) ? 'Edit' : 'Tambah' }} Guru</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($guru) ? 'Edit' : 'Tambah' }} Guru</h2>
            <div class="card">
                <form action="{{ isset($guru) ? route('guru.update', $guru) : route('guru.store') }}" method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($guru) ? 'Edit' : 'Tambah' }} Data Guru</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($guru) ? method_field('PUT') : '' !!}
                        <x-form.input name="nip" :value="isset($guru) ? $guru->nip : old('nip')" label="NIP" :readonly="isset($guru)" />
                        <x-form.input name="nama" :value="isset($guru) ? $guru->nama : old('nama')" label="Nama" />
                        <x-form.input type="email" name="email" :value="isset($user) ? $user->email : old('email')" label="Email" />
                        <x-form.input type="password" name="password" :value="isset($user) ? $user->password : old('password')" label="Password" />
                        <x-form.select name="smk_id" :init-values="$smk" :value="isset($guru) ? $guru->smk_id : ''" label="Sekolah" />
                        <x-form.text-area name="alamat" :value="isset($guru) ? $guru->alamat : old('alamat')" label="Alamat" placeholder="Masukkan Alamat" />
                        <x-form.input type="number" name="no_telp" :value="isset($guru) ? $guru->no_telp : old('no_telp')" label="No Telp" />
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('guru.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script>
        $(document).ready(function() {
            //ganti label berdasarkan nama file
            $('#image').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#image')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });
    </script>
@endpush

@push('customStyle')
@endpush
