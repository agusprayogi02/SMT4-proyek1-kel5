@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Menu DUDI</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">DUDI Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Menu DUDI</h4>
                            <div class="card-header-action">
                                @can('dudi.create')
                                    <a class="btn btn-icon icon-left btn-primary" href="{{ route('dudi.create') }}">Create New
                                        DUDI</a>
                                @endcan
                                <a class="btn btn-info btn-primary active search"> <i class="fa fa-search"
                                        aria-hidden="true"></i> Search DUDI</a>
                            </div>
                        </div>
                        <div class="card-body">
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
                                        <a class="btn btn-secondary" href="{{ route('dudi.index') }}">Reset</a>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>NIB</th>
                                            <th>Nama</th>
                                            <th>Pemilik</th>
                                            <th>Alamat</th>
                                            <th>No. Telp</th>
                                            @can('dudi.edit')
                                                <th class="text-right">Action</th>
                                            @endcan
                                        </tr>
                                        @foreach ($dudi as $key => $item)
                                            <tr>
                                                <td>{{ $dudi->firstItem() + $key }}</td>
                                                <td>{{ $item->nib }}</td>
                                                <td>{{ $item->user->name }}</td>
                                                <td>{{ $item->nama_pemilik }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->no_telp }}</td>
                                                @can('dudi.edit')
                                                    <td class="text-right">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ route('dudi.edit', $item->nib) }}"
                                                                class="btn btn-sm btn-info btn-icon "><i
                                                                    class="fas fa-edit"></i>
                                                                Edit</a>
                                                            <form action="{{ route('dudi.destroy', $item->nib) }}"
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
                                    {{ $dudi->withQueryString()->links() }}
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
