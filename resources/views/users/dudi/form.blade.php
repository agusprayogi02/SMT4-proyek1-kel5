@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($dudi) ? 'Edit' : 'Buat' }} DUDI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($dudi) ? 'Edit' : 'Buat' }} DUDI</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($dudi) ? 'Edit' : 'Buat' }} DUDI</h2>
            <div class="card">
                <form action="{{ isset($dudi) ? route('dudi.update', $dudi) : route('dudi.store') }}" method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($dudi) ? 'Edit' : 'Buat' }} Data DUDI</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($dudi) ? method_field('PUT') : '' !!}
                        <x-form.input name="nib" :value="isset($dudi) ? $dudi->nib : ''" label="NIB" @isset($dudi)
                            readonly @endisset />
                        <x-form.input name="name" :value="isset($user) ? $user->name : ''" label="Nama" />
                        <x-form.input name="nama_pemilik" :value="isset($dudi) ? $dudi->nama_pemilik : ''" label="Nama Pemilik" />
                        <x-form.text-area name="alamat" :value="isset($dudi) ? $dudi->alamat : ''" label="Alamat" />
                        <x-form.input name="no_telp" :value="isset($dudi) ? $dudi->no_telp : ''" label="No Telp" />
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
