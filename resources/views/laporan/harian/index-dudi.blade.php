@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Menu Laporan Harian</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Laporan Harian Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Menu Laporan Harian</h4>
                            <div class="card-header-action">
                                @can('laporan-harian.create')
                                    <a class="btn btn-icon icon-left btn-primary"
                                        href="{{ route('laporan.harian.create') }}">Create New Laporan Harian</a>
                                @endcan
                                {{-- <a class="btn btn-info btn-primary active import">
                <i class="fa fa-download" aria-hidden="true"></i>
                Import dataName</a> --}}
                                {{-- <a class="btn btn-info btn-primary active" href="{{ route('menu-group.export') }}">
                <i class="fa fa-upload" aria-hidden="true"></i>
                Export dataName</a> --}}
                                <a class="btn btn-info btn-primary active search"> <i class="fa fa-search"
                                        aria-hidden="true"></i> Search
                                    Laporan Harian</a>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <div class="show-import" style="display: none">
              <div class="custom-file">
                <form action="{{ route('menu-group.import') }}" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  <label class="custom-file-label" for="file-upload">Choose File</label>
                  <input type="file" id="file-upload" class="custom-file-input" name="import_file">
                  <br /> <br />
                  <div class="footer text-right">
                    <button class="btn btn-primary">Import File</button>
                  </div>
                </form>
              </div>
            </div> --}}
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('menu-group.index') }}">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="role">Group</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Group Name">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        <a class="btn btn-secondary" href="{{ route('laporan.harian.index') }}">Reset</a>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Siswa</th>
                                            <th>Tanggal</th>
                                            <th>Kegiatan</th>
                                            <th>Gambar</th>
                                            <th>Keterangan</th>
                                            @can('laporan-harian.edit')
                                                <th class="text-right">Action</th>
                                            @endcan
                                        </tr>
                                        @foreach ($laporan as $key => $item)
                                            <tr>
                                                <td>{{ $laporan->firstItem() + $key }}</td>
                                                <td>{{ $item->siswa->nama }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->kegiatan }}</td>
                                                <td>
                                                    @if ($item->image)
                                                        <img width="100px" src="{{ asset('storage/' . $item->image) }}"
                                                            class="img-thumbnail rounded" alt="Gambar">
                                                    @else
                                                        Kosong
                                                    @endif
                                                </td>
                                                <td>{{ $item->keterangan }}</td>
                                                @can('laporan-harian.edit')
                                                    <td class="text-right">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ route('laporan.harian.edit', $item->id) }}"
                                                                class="btn btn-sm btn-info btn-icon "><i
                                                                    class="fas fa-edit"></i>
                                                                Edit</a>
                                                            <form action="{{ route('laporan.harian.destroy', $item->id) }}"
                                                                method="POST" class="ml-2">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token"
                                                                    value="{{ csrf_token() }}">
                                                                <button class="btn btn-sm btn-danger btn-icon confirm-delete"><i
                                                                        class="fas fa-times"></i>
                                                                    Delete </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $laporan->withQueryString()->links() }}
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

@push('customStyle')
@endpush
