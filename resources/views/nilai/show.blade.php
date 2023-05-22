@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Nilai</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item"> Nilai </div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Nilai</h2>
            <div class="card">
                <div class="card-header">
                    <h4>Nilai</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($nilai->Kategori as $item)
                            <li class="list-group-item"><b>{{ $item->kategori }} : </b>{{ $item->nilai }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer text-right">
                    <a class="btn btn-secondary" href="{{ route('nilai.index') }}">Back</a>
                </div>
            </div>
        </div>
    </section>
@endsection
