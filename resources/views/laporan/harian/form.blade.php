@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($laporan) ? 'Edit' : 'Tambah' }} Laporan Harian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($laporan) ? 'Edit' : 'Tambah' }} Laporan</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($laporan) ? 'Edit' : 'Tambah' }} Laporan</h2>
            <div class="card">
                <form
                    action="{{ isset($laporan) ? route('laporan.harian.update', $laporan) : route('laporan.harian.store') }}"
                    method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($laporan) ? 'Edit' : 'Tambah' }} Laporan Harian</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($laporan) ? method_field('PUT') : '' !!}
                        <x-form.input type="date" name="tanggal" :value="isset($laporan) ? $laporan->tanggal : now()->toDateString()" label="Tanggal" />
                        <x-form.input name="kegiatan" label="Kegiatan" :value="isset($laporan) ? $laporan->kegiatan : ''" />
                        <x-form.file-upload name="image" label="Gambar" :value="isset($laporan) ? $laporan->image : ''" />
                        <x-form.text-area name="keterangan" :value="isset($laporan) ? $laporan->keterangan : ''" label="Keterangan"
                            placeholder="Masukkan Keterangan" />
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('laporan.harian.index') }}">Cancel</a>
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
