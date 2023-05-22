@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ isset($smk) ? 'Edit' : 'Tambah' }} SMK </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">{{ isset($smk) ? 'Edit' : 'Tambah' }} SMK </div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">{{ isset($smk) ? 'Edit' : 'Tambah' }} SMK </h2>
        <div class="card">
            <form action="{{ isset($smk) ? route('smk.update', $smk->npsn) : route('smk.store') }}" method="POST">
                <div class="card-header">
                    <h4>Validasi {{ isset($smk) ? 'Edit' : 'Tambah' }} Data SMK</h4>
                </div>
                <div class="card-body">
                    @csrf
                    {!! isset($smk) ? method_field('PUT') : '' !!}
                    <x-form.input name="npsn" :value="isset($smk) ? $smk->npsn : old('npsn')" label="NPSN"
                        :readonly="isset($smk)" />
                    <x-form.input name="nama" :value="isset($smk) ? $smk->nama : old('nama')" label="Nama" />
                    <x-form.input name="email" :value="isset($smk) ? $smk->user->email : old('email')" label="Email" />
                    @if(!isset($smk))
                    <x-form.input name="password" :value="old('password')" label="Password" type="password" />
                    @endif
                    <x-form.input name="kepala_sekolah"
                        :value="isset($smk) ? $smk->kepala_sekolah : old('kepala_sekolah')" label="Kepala Sekolah" />
                    <x-form.text-area name="alamat" :value="isset($smk) ? $smk->alamat : old('alamat')" label="Alamat"
                        placeholder="Enter Alamat" />
                    <x-form.input name="no_telp" :value="isset($smk) ? $smk->no_telp : old('no_telp')" label="No Telp"
                        type="number" />
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('smk.index') }}">Cancel</a>
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