@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($keahlian) ? 'Edit' : 'Tambah' }} Keahlian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($keahlian) ? 'Edit' : 'Tambah' }} Keahlian</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($keahlian) ? 'Edit' : 'Tambah' }} Keahlian</h2>
            <div class="card">
                <form action="{{ isset($keahlian) ? route('keahlian.update', $keahlian) : route('keahlian.store') }}"
                    method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($keahlian) ? 'Edit' : 'Tambah' }} Keahlian</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($keahlian) ? method_field('PUT') : '' !!}

                        <x-form.input :value="isset($keahlian) ? $keahlian->nama : ''" name="nama" label="Nama Keahlian" />
                        <x-form.input :value="isset($keahlian) ? $keahlian->bidang : ''" name="bidang" label="Bidang" />
                        <x-form.input :value="isset($keahlian) ? $keahlian->deskripsi : ''" name="deskripsi" label="Deskripsi" />

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('keahlian.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
