@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>{{ isset($kategori) ? 'Edit' : 'Tambah' }} Kategori Nilai</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Components</a></div>
      <div class="breadcrumb-item">{{ isset($kategori) ? 'Edit' : 'Tambah' }} Nilai</div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">{{ isset($kategori) ? 'Edit' : 'Tambah' }} Nilai</h2>
    <div class="card">
      <form action="{{ isset($kategori) ? route('nilai.kategori.update', $kategori) : route('nilai.kategori.store') }}"
        method="POST">
        <div class="card-header">
          <h4>Validasi {{ isset($kategori) ? 'Edit' : 'Tambah' }} Data Nilai</h4>
        </div>
        <div class="card-body">
          @csrf
          {!! isset($kategori) ? method_field('PUT') : '' !!}
          <x-form.input name="name" :value="isset($kategori) ? $kategori->name : ''" label="Nama Kategori"
            @isset($kategori) readonly @endisset />
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Submit</button>
          <a class="btn btn-secondary" href="{{ route('nilai.kategori.index') }}">Cancel</a>
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