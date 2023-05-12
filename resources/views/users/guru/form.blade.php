@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($guru) ? 'Edit' : 'Buat' }} Guru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($guru) ? 'Edit' : 'Buat' }} Guru</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($guru) ? 'Edit' : 'Buat' }} Guru</h2>
            <div class="card">
                <form action="{{ isset($guru) ? route('guru.update', $guru) : route('guru.store') }}" method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($guru) ? 'Edit' : 'Buat' }} Data Guru</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($guru) ? method_field('PUT') : '' !!}
                        <x-form.input name="nip" :value="isset($guru) ? $guru->nip : ''" label="NIP" @isset($guru)
                            readonly @endisset />
                        <x-form.input name="name" :value="isset($user) ? $user->name : ''" label="Nama" />
                        {{-- <x-form.select name="smk_id" :value="isset($guru) ? $guru->smk->id : ''" label="Asal SMK" /> --}}
                        <x-form.text-area name="alamat" :value="isset($guru) ? $guru->alamat : ''" label="Alamat" />
                        <x-form.input name="no_telp" :value="isset($guru) ? $guru->no_telp : ''" label="No Telp" />
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
