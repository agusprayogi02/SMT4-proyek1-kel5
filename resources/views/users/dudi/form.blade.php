@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($dudi) ? 'Edit' : 'Tambah' }} DUDI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($dudi) ? 'Edit' : 'Tambah' }} DUDI</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($dudi) ? 'Edit' : 'Tambah' }} DUDI</h2>
            <div class="card">
                {{-- handle errors with ul li --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $errors)
                                <li>{{ $errors }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ isset($dudi) ? route('dudi.update', $dudi->nib) : route('dudi.store') }}" method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($dudi) ? 'Edit' : 'Tambah' }} Data DUDI</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($dudi) ? method_field('PUT') : '' !!}
                        <x-form.input name="nib" :value="isset($dudi) ? $dudi->nib : old('nib')" label="NIB" :readonly="isset($dudi)" />
                        <x-form.input name="nama" :value="isset($dudi) ? $dudi->nama : old('nama')" label="Nama" />
                        <x-form.input name="email" :value="isset($dudi) ? $dudi->user->email : old('email')" label="Email" />
                        @if (!isset($dudi))
                            <x-form.input name="password" :value="old('password')" label="Password" type="password" />
                        @endif
                        <x-form.input name="nama_pemilik" :value="isset($dudi) ? $dudi->nama_pemilik : old('nama_pemilik')" label="Nama Pemilik" />
                        <x-form.text-area name="alamat" :value="isset($dudi) ? $dudi->alamat : old('alamat')" label="Alamat" placeholder="Masukkan Alamat" />
                        <x-form.input type="number" name="no_telp" :value="isset($dudi) ? $dudi->no_telp : old('no_telp')" label="No Telpon DuDi" />
                        <x-form.input type="number" name="kuota" :value="isset($dudi) ? $dudi->kuota : old('kuota')" label="Jumlah Kuota Magang" />
                        <div class="form-group">
                            <label>Keahlian</label>
                            <select name="keahlian[]" class="form-control select2" multiple>
                                @foreach ($keahlian as $item)
                                    <option value="{{ $item->id }}"
                                        {{ isset($dudi) ? ($dudi->keahlian()->find($item->id) ? 'selected' : '') : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('keahlian')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('dudi.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="/assets/js/select2.min.js"></script>
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
    <link rel="stylesheet" href="/assets/css/select2.min.css">
@endpush
