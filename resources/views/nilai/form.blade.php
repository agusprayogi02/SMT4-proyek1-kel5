@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($nilai) ? 'Edit' : 'Buat' }} Nilai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($nilai) ? 'Edit' : 'Buat' }} Nilai</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($nilai) ? 'Edit' : 'Buat' }} Nilai</h2>
            <div class="card">
                <form action="{{ isset($nilai) ? route('nilai.update', $nilai) : route('nilai.store') }}" method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($nilai) ? 'Edit' : 'Buat' }} Data Nilai</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($nilai) ? method_field('PUT') : '' !!}
                        <x-form.input name="dudi" :value="isset($nilai) ? $nilai->dudi : ''" label="DUDI" @isset($nilai)
                            readonly @endisset />
                        {{-- <x-form.select name="siswa" :init-values="$" :value="isset($nilai) ? $nilai->siswa : ''" label="Siswa" /> --}}
                        {{-- <x-form.input name="name" :value="isset($user) ? $user->name : ''" label="Nama" /> --}}
                        <x-form.input name="nama_pemilik" :value="isset($nilai) ? $nilai->nama_pemilik : ''" label="Nama Pemilik" />
                        <x-form.text-area name="alamat" :value="isset($nilai) ? $nilai->alamat : ''" label="Alamat" placeholder="Alamat" />
                        <x-form.input name="no_telp" :value="isset($nilai) ? $nilai->no_telp : ''" label="No Telp" />
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('nilai.index') }}">Cancel</a>
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
