@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($magang) ? 'Edit' : 'Tambah' }} Daftar Magang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($magang) ? 'Edit' : 'Tambah' }} Daftar Magang</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($magang) ? 'Edit' : 'Tambah' }} Daftar Magang</h2>
            <div class="card">
                <form action="{{ isset($magang) ? route('magang.update', [$magang->id]) : route('magang.store') }}"
                    method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($magang) ? 'Edit' : 'Tambah' }} Daftar Magang</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($magang) ? method_field('PUT') : '' !!}

                        <input type="text" name="siswa_id" value="{{ $siswa->nisn }}" hidden />

                        <div class="row">
                            <div class="col-md">
                                <x-form.select2 name="dudi_id" :value="isset($magang) ? $magang->dudi_id : ''" label="DUDI">
                                    @foreach ($dudi as $item)
                                        <option value="{{ $item->nib }}"
                                            {{ (isset($magang) && $item->nib == $magang->dudi_id) || old('dudi_id') == $item->nib ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </x-form.select2>
                            </div>
                            <div class="col-md">
                                <x-form.select2 name="guru_id" :value="isset($magang) ? $magang->guru_id : ''" label="Guru Pembimbing">
                                    @foreach ($guru as $item)
                                        <option value="{{ $item->nip }}"
                                            {{ (isset($magang) && $item->nip == $magang->guru_id) || old('guru_id') == $item->nip ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </x-form.select2>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <x-form.select2 name="keahlian_id" :value="isset($magang) ? $magang->keahlian_id : ''" label="Bidang Keahlian">
                                    @foreach ($keahlian as $item)
                                        <option value="{{ $item->id }}"
                                            {{ (isset($magang) && $item->id == $magang->keahlian_id) || old('keahlian_id') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}</option>
                                    @endforeach
                                </x-form.select2>
                            </div>
                            <div class="col-md">
                                <x-form.text-area name="alasan" :value="isset($magang) ? $magang->alasan : old('alasan')" label="Alasan"
                                    placeholder="Masukkan Alasan anda untuk bisa diterima magang yang telah dipilih!" />
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('magang.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customStyle')
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endpush

@push('customScript')
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
