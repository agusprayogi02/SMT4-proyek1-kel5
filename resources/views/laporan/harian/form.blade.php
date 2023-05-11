@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>{{ isset($laporan)?'Edit':'Buat' }} Laporan Harian</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Components</a></div>
      <div class="breadcrumb-item">{{ isset($laporan)?'Edit':'Buat' }} Laporan</div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">{{ isset($laporan)?'Edit':'Buat' }} Laporan</h2>
    <div class="card">
      <form action="{{ isset($laporan)?route('laporan.harian.update', $laporan):route('laporan.harian.store') }}"
        method="{{ isset($laporan)?'GET':'POST' }}">
        <div class="card-header">
          <h4>Validasi {{ isset($laporan)?'Edit':'Buat' }} Data User</h4>
        </div>
        <div class="card-body">
          @csrf
          {!! isset($laporan)?method_field('PUT'):''!!}
          <x-form.file-upload name="image" label="Gambar" :value="isset($laporan)?$laporan->keterangan:''" />
          <x-form.text-area name="keterangan" :value="isset($laporan)?$laporan->keterangan:''" label="Keterangan" />
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