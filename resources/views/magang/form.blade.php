@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
    <h1>{{ isset($magang) ? 'Edit' : 'Buat' }} Daftar Magang</h1>
    <div class="section-header-breadcrumb">
      <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
      <div class="breadcrumb-item"><a href="#">Components</a></div>
      <div class="breadcrumb-item">{{ isset($magang) ? 'Edit' : 'Buat' }} Daftar Magang</div>
    </div>
  </div>
  <div class="section-body">
    <h2 class="section-title">{{ isset($magang) ? 'Edit' : 'Buat' }} Daftar Magang</h2>
    <div class="card">
      <form action="{{ isset($magang) ? route('magang.update', $magang) : route('magang.store') }}" method="POST">
        <div class="card-header">
          <h4>Validasi {{ isset($magang) ? 'Edit' : 'Buat' }} Daftar Magang</h4>
        </div>
        <div class="card-body">
          @csrf
          {!! isset($magang) ? method_field('PUT') : '' !!}

          <x-form.text-area name="alasan" :value="isset($magang) ? $magang->alasan : ''" label="Alasan"
            placeholder="Masukkan Alasan anda untuk bisa diterima magang yang telah dipilih!" />
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-primary">Submit</button>
          <a class="btn btn-secondary" href="{{ route('magang.index') }}">Cancel</a>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection