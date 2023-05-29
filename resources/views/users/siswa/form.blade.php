@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($siswa) ? 'Edit' : 'Buat' }} Siswa</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($siswa) ? 'Edit' : 'Buat' }} Siswa</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($siswa) ? 'Edit' : 'Buat' }} Siswa</h2>
            <div class="card">
                <form action="{{ isset($siswa) ? route('siswa.update', $siswa) : route('siswa.store') }}" method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($siswa) ? 'Edit' : 'Buat' }} Data Siswa</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($siswa) ? method_field('PUT') : '' !!}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h4>Terjadi Kesalahan!</h4>
                                <ul class="pl-4 my-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <x-form.input name="nisn" :value="isset($siswa) ? $siswa->nisn : old('nisn')" label="NISN" :readonly="isset($siswa)" />
                        <x-form.input name="nama" :value="isset($siswa) ? $siswa->nama : old('nama')" label="Nama" />
                        <x-form.input type="email" name="email" :value="isset($siswa) ? $siswa->user->email : old('email')" label="Email" />
                        @if (!isset($siswa))
                            <x-form.input type="password" name="password" :value="old('password')" label="Password" />
                        @endif
                        <x-form.select2 name="kelas_id" :value="isset($siswa) ? $siswa->kelas_id : old('kelas_id')" label="Kelas">
                            @foreach ($kelas as $item)
                                <option value="{{ $item->id }}"
                                    {{ isset($siswa) ? ($siswa->kelas_id === $item->id ? 'selected' : '') : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </x-form.select2>
                        <x-form.select2 name="smk_id" :value="isset($siswa) ? $siswa->smk_id : ''" label="SMK">
                            @foreach ($smk as $item)
                                <option value="{{ $item->npsn }}"
                                    {{ isset($siswa) ? ($siswa->smk_id === $item->npsn ? 'selected' : '') : '' }}>
                                    {{ $item->nama }}</option>
                            @endforeach
                        </x-form.select2>
                        <label for="g">Jenis Kelamin</label>
                        <div class="row" id="g">
                            <div class="col-md-6">
                                <x-form.radio id="gender1" name="gender" value="L" label="Laki-Laki"
                                    :checked="isset($siswa) && $siswa->gender == 'L'" />
                            </div>
                            <div class="col-md-6">
                                <x-form.radio id="gender2" name="gender" value="P" label="Perempuan"
                                    :checked="isset($siswa) && $siswa->gender == 'P'" />
                            </div>
                        </div>
                        <x-form.select name="agama" :init-values="$agama" :value="isset($siswa) ? $siswa->agama : ''" label="Agama" />
                        <x-form.input name="tempat_lahir" :value="isset($siswa) ? $siswa->tempat_lahir : old('tempat_lahir')" label="Tempat Lahir" />
                        <x-form.input type="date" name="tanggal_lahir" :value="isset($siswa) ? $siswa->tanggal_lahir : old('tanggal_lahir')" label="Tanggal Lahir" />
                        <x-form.text-area name="alamat" :value="isset($siswa) ? $siswa->alamat : old('alamat')" placeholder="Masukkan Alamat" label="Alamat" />
                        <x-form.input name="no_telp" :value="isset($siswa) ? $siswa->no_telp : old('no_telp')" label="No Telp" type="number" />
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('siswa.index') }}">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('customScript')
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
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
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css') }}">
@endpush
