@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <section class="section">
        <div class="section-header">
            <h1>Menu Magang</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Table</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">Magang Management</h2>

            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Menu Magang</h4>
                            <div class="card-header-action">
                                @can('magang.create')
                                    <a class="btn btn-icon icon-left btn-primary" href="{{ route('magang.create') }}">Daftar
                                        Magang</a>
                                @endcan
                                <a class="btn btn-info btn-primary active search"> <i class="fa fa-search"
                                        aria-hidden="true"></i> Search
                                    Magang</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="show-search mb-3" style="display: none">
                                <form id="search" method="GET" action="{{ route('magang.index') }}">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="role">Group</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Group Name">
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                                        <a class="btn btn-secondary" href="{{ route('magang.index') }}">Reset</a>
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tbody>
                                        <tr>
                                            <th>No</th>
                                            <th>Ket</th>
                                            <th>Nama Siswa</th>
                                            <th>Nama DUDI</th>
                                            <th>Bidang</th>
                                            <th>Alasan</th>
                                            <th>Status</th>
                                            @can('magang.edit')
                                                <th class="text-right">Action</th>
                                            @endcan
                                        </tr>
                                        @foreach ($magang as $key => $item)
                                            <tr>
                                                <td>{{ $magang->firstItem() + $key }}</td>
                                                <td>{!! $item->rekomendasi == 10 ? '<span class="badge badge-danger">Rekomendasi</span>' : '' !!}
                                                </td>
                                                <td>{{ $item->siswa->nama }}</td>
                                                <td>{{ $item->dudi->nama }}</td>
                                                <td>{{ $item->keahlian->nama }}</td>
                                                <td>{{ $item->alasan }}</td>
                                                <td>{{ $item->status }}</td>
                                                @can('magang.edit')
                                                    <td class="text-right">
                                                        <div class="d-flex justify-content-end">
                                                            <a href="{{ route('magang.ajukan', $item->id) }}"
                                                                class="btn btn-sm btn-info btn-icon mr-2"><i
                                                                    class="fas fa-check"></i>
                                                                Ajukan Magang</a>
                                                            <a href="{{ route('magang.recom', $item->id) }}"
                                                                class="btn btn-sm btn-success btn-icon mr-2"><i
                                                                    class="fas fa-arrow-up"></i>
                                                                Rekomendasi</a>
                                                        </div>
                                                    </td>
                                                @endcan
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {{ $magang->withQueryString()->links() }}
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

        function reject(id) {
            Swal.fire({
                title: 'Beri keterangan',
                input: 'text',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonText: 'Look up',
                showLoaderOnConfirm: true,
                preConfirm: (ket) => {
                    return $.ajax({
                        url: `/magang/${id}/reject`,
                        type: 'PUT',
                        data: {
                            keterangan: ket,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            return response.message;
                        },
                        error: function(error) {
                            Swal.showValidationMessage(
                                `Request failed: ${error}`
                            )
                        }
                    });
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                        'Berhasil',
                        result.value,
                        'success'
                    );
                    window.location.reload();
                }
            });
        }
    </script>
@endpush

@push('customStyle')
@endpush
