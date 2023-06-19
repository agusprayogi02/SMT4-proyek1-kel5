@extends('layouts.app')

@section('content')
<!-- Main Content -->
<section class="section">
    <div class="section-header">
        <h1>Nilai List</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Table</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Nilai Management</h2>

        <div class="row">
            <div class="col-12">
                @include('layouts.alert')
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Nilai List</h4>
                        <div class="card-header-action">
                            @can('nilai.create')
                            <a class="btn btn-icon icon-left btn-primary" href="{{ route('nilai.create') }}">Buat
                                Penilaian Siswa</a>
                            @endcan
                            {{-- @can('nilai.import')
                            <a class="btn btn-info btn-primary active import">
                                <i class="fa fa-download" aria-hidden="true"></i>
                                Import Nilai</a>
                            @endcan
                            @can('nilai.export')
                            <a class="btn btn-info btn-primary active" href="{{ route('nilai.export') }}">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                                Export Nilai</a>
                            @endcan --}}
                            <a class="btn btn-info btn-primary active search">
                                <i class="fa fa-search" aria-hidden="true"></i>
                                Search Nilai</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="show-import" style="display: none">
                            {{-- <div class="custom-file">
                                <form action="{{ route('nilai.import') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <label class="custom-file-label" for="file-upload">Choose File</label>
                                    <input type="file" id="file-upload" class="custom-file-input" name="import_file">
                                    <br /> <br />
                                    <div class="footer text-right">
                                        <button class="btn btn-primary">Import File</button>
                                    </div>
                                </form>
                            </div> --}}
                        </div>
                        <div class="show-search mb-3" style="display: none">
                            <form id="search" method="GET" action="{{ route('nilai.index') }}">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="role">Nilai</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Nilai Name">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                    <a class="btn btn-secondary" href="{{ route('nilai.index') }}">Reset</a>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-md">
                                <tbody>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Total</th>
                                        <th>Avg</th>
                                        @can('nilai.show')
                                        <th class="text-right">Action</th>
                                        @endcan
                                    </tr>
                                    @foreach ($nilai as $key => $item)
                                    <tr>
                                        <td>{{ ($nilai->currentPage() - 1) * $nilai->perPage() + $key + 1 }}</td>
                                        <td>{{ $item->siswa->nama }}</td>
                                        <td>{{ $item->total }}</td>
                                        <td>{{ $item->avg }}</td>
                                        @can('nilai.show')
                                        <td class="text-right">
                                            <div class="d-flex justify-content-end">

                                                <a href="{{ route('nilai.show', $item->id) }}"
                                                    class="btn btn-sm btn-success btn-icon mr-2"><i
                                                        class="fas fa-eye"></i>
                                                    Lihat Nilai</a>
                                                {{-- <a href="{{ route('nilai.edit', $item->id) }}"
                                                    class="btn btn-sm btn-info btn-icon "><i class="fas fa-edit"></i>
                                                    Edit</a>
                                                <form action="{{ route('nilai.destroy', $item->id) }}" method="POST"
                                                    class="ml-2">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                        <i class="fas fa-times"></i> Delete </button>
                                                </form> --}}
                                            </div>
                                        </td>
                                        @endcan
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center">
                                {{ $nilai->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('customScript')
<script>
    $(document).ready(function() {
            $('.import').click(function(event) {
                event.stopPropagation();
                $(".show-import").slideToggle("fast");
                $(".show-search").hide();
            });
            $('.search').click(function(event) {
                event.stopPropagation();
                $(".show-search").slideToggle("fast");
                $(".show-import").hide();
            });
            //ganti label berdasarkan nama file
            $('#file-upload').change(function() {
                var i = $(this).prev('label').clone();
                var file = $('#file-upload')[0].files[0].name;
                $(this).prev('label').text(file);
            });
        });
</script>
@endpush