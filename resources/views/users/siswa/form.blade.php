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
                    <x-form.input name="nisn" :value="isset($siswa) ? $siswa->nisn : ''" label="NISN" @isset($siswa)
                        readonly @endisset />
                    {{--
                    <x-form.select name="kelas_id" :value="isset($siswa) ? $siswa->kelas->id : ''" label="Kelas" />
                    --}}
                    {{--
                    <x-form.select name="smk_id" :value="isset($siswa) ? $siswa->smk->id : ''" label="Asal SMK" /> --}}
                    <x-form.input name="name" :value="isset($user) ? $user->name : ''" label="Nama" />
                    <label for="g">Jenis Kelamin</label>
                    <div class="row" id="g">
                        <div class="col-md-6">
                            <x-form.radio id="gender1" name="gender" value="L" label="Laki-Laki" />
                        </div>
                        <div class="col-md-6">
                            <x-form.radio id="gender2" name="gender" value="P" label="Perempuan" />
                        </div>
                    </div>
                    <x-form.select name="agama" :init-values="$agama" :value="isset($siswa) ? $siswa->agama : ''"
                        label="Agama" />
                    <x-form.input name="tempat_lahir" :value="isset($siswa) ? $siswa->tempat_lahir : ''"
                        label="Tempat Lahir" />
                    <x-form.input type="date" name="tanggal_lahir" :value="isset($siswa) ? $siswa->tanggal_lahir : ''"
                        label="Tanggal Lahir" />
                    <x-form.text-area name="alamat" :value="isset($siswa) ? $siswa->alamat : ''" label="Alamat" />
                    <x-form.input name="no_telp" :value="isset($siswa) ? $siswa->no_telp : ''" label="No Telp"
                        type="number" />
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