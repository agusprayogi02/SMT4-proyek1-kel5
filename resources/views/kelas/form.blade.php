@extends('layouts.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>{{ isset($kelas) ? 'Edit' : 'Tambah' }} Kelas</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Edukasi</a></div>
            <div class="breadcrumb-item">{{ isset($kelas) ? 'Edit' : 'Tambah' }} Kelas</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">{{ isset($kelas) ? 'Edit' : 'Tambah' }} Kelas</h2>
        <div class="card">
            <form action="{{ isset($kelas) ? route('kelas.update', $kelas) : route('kelas.store') }}" method="POST">
                <div class="card-header">
                    <h4>Validasi {{ isset($kelas) ? 'Edit' : 'Tambah' }} Kelas</h4>
                </div>
                <div class="card-body">
                    @csrf
                    {!! isset($kelas) ? method_field('PUT') : '' !!}

                    <x-form.input :value="isset($kelas) ? $kelas->nama : old('nama')" name="nama" label="Nama Kelas" />
                    <x-form.input :value="isset($kelas) ? $kelas->jurusan : old('jurusan')" name="jurusan"
                        label="Jurusan " />

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary">Submit</button>
                    <a class="btn btn-secondary" href="{{ route('kelas.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection