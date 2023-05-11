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
                <form action="{{ isset($siswa) ? route('users.siswa.update', $siswa) : route('users.siswa.store') }}"
                    method="{{ isset($siswa) ? 'GET' : 'POST' }}">
                    <div class="card-header">
                        <h4>Validasi {{ isset($siswa) ? 'Edit' : 'Buat' }} Data User</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($siswa) ? method_field('PUT') : '' !!}
                        <x-form.input name="nisn" :value="isset($siswa) ? $siswa->nisn : ''" label="Nisn" />
                        {{-- <x-form.input name="kelas_id" :value="isset($siswa) ? $siswa->kelas->id : ''" label="Kelas_id" /> --}}
                        {{-- <x-form.input name="smk_id" :value="isset($siswa) ? $siswa->smk->id : ''" label="Smk_id" /> --}}
                        <x-form.input name="nama" :value="isset($siswa) ? $siswa->nama : ''" label="Nama" />
                        {{-- <x-form.radio name="gender" :value="isset($siswa) ? $siswa->gender : ''" label="Gender" /> --}}
                        <x-form.radio name="agama" :value="isset($siswa) ? $siswa->agama : ''" label="Agama" />
                        <x-form.input name="tempat_lahir" :value="isset($siswa) ? $siswa->tempat_lahir : ''" label="Tempat_lahir" />
                        <x-form.date name="tanggal_lahir" :value="isset($siswa) ? $siswa->tanggal_lahir : ''" label="Tanggal_lahir" />
                        <x-form.input name="alamat" :value="isset($siswa) ? $siswa->alamat : ''" label="Alamat" />
                        <x-form.input name="no_telp" :value="isset($siswa) ? $siswa->no_telp : ''" label="No_telp" />
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
