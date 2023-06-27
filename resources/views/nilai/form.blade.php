@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ isset($nilai) ? 'Edit' : 'Tambah' }} Nilai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">{{ isset($nilai) ? 'Edit' : 'Tambah' }} Nilai</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ isset($nilai) ? 'Edit' : 'Tambah' }} Nilai</h2>
            <div class="card">
                <form action="{{ isset($nilai) ? route('nilai.update', $nilai) : route('nilai.store') }}" method="POST">
                    <div class="card-header">
                        <h4>Validasi {{ isset($nilai) ? 'Edit' : 'Tambah' }} Data Nilai</h4>
                    </div>
                    <div class="card-body">
                        @csrf
                        {!! isset($nilai) ? method_field('PUT') : '' !!}
                        <x-form.select2 name="siswa_id" :value="isset($nilai) ? $nilai->siswa_id : old('siswa_id')" label="Siswa">
                            @foreach ($siswa as $item)
                                <option value="{{ $item->nisn }}">
                                    {{ isset($nilai) ? ($nilai->siswa_id === $item->nisn ? 'selected' : '') : '' }}
                                    {{ $item->nisn }} - {{ $item->nama }}
                                </option>
                            @endforeach
                        </x-form.select2>
                        {{--
                    <x-form.input name="name" :value="isset($user) ? $user->name : ''" label="Nama" /> --}}
                        {{-- <x-form.input type="number" name="total" :value="isset($nilai) ? $nilai->total : old('total')"
                        label="Total" />
                    <x-form.file-upload type="file" name="sertifikat" label="Sertifikat"
                        :value="isset($nilai) ? $nilai->sertifikat : old('sertifikat')" /> --}}
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
