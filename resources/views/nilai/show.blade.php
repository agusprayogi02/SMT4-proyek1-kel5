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
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Nilai</th>
                            <th>Keterangan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $key => $item)
                        <!-- <li class="list-group-item"><b>{{ $item->kategori->name }} : </b>{{ $item->nilai }}</li> -->
                        <tr>
                            <td>{{ ($kategori->currentPage() - 1) * $kategori->perPage() + $key + 1 }}</td>
                            <td>{{ $item->kategori->name }}</td>
                            <td>{{ $item->nilai }}</td>
                            <td>{{ $item->keterangan }}</td>
                            <td>
                                @can('nilai.edit')
                                <form action="{{ route('nilai.delNilai', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm btn-icon confirm-delete"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-right">
                @can('nilai.create')
                <button type="button" data-toggle="modal" data-target="#myModal" data-id="123"
                    class="btn btn-sm btn-primary btn-icon mr-2"><i class="fas fa-plus"></i>
                    Beri Nilai</button>
                @endcan
                <a class="btn btn-secondary" href="{{ route('nilai.index') }}">Back</a>
            </div>
        </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Nilai</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-message"></div>
                <x-form.select2 name="kategori_id" label="Kategori Nilai" value="">
                    <option value="">Pilih Kategori Nilai</option>
                </x-form.select2>
                <input type="hidden" id="nilai-id" value="{{ $nilai->id }}">
                <x-form.input name="nilai" type="number" value="" label="Nilai" />
                <x-form.input name="keterangan" type="text" value="" label="Keterangan" />
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="select2-submit">Submit</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('customScript')
<script src="{{ asset('assets/js/select2.min.js')}}"></script>
<!-- File JavaScript DataTables -->
<script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.2/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        // Fungsi untuk mengambil data dari server berdasarkan ID
        function fetchData(id) {
            return $.ajax({
                url: '/nilai/{id}/select2'.replace('{id}', id),
                method: 'GET',
                dataType: 'json'
            });
        }

        // Event handler saat tombol/modal diklik
        $('#myModal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var id = $('#nilai-id').val();

            var select2Element = $('#kategori_id');

            // Buat permintaan ke server untuk mendapatkan data berdasarkan ID
            fetchData(id).done(function(data) {
                // Hapus opsi yang ada pada Select2
                select2Element.empty();

                // Tambahkan opsi baru ke Select2 berdasarkan data yang diterima dari server
                $.each(data, function(index, item) {
                    select2Element.append($('<option></option>').attr('value', item.id).text(item.name));
                });

                // Inisialisasi Select2 pada elemen <select>
                select2Element.select2();
            });
        });

        // Event handler saat tombol "Pilih" diklik
        $('#select2-submit').on('click', function() {
            var kategori = $('#kategori_id').val();
            var nilai = $('#nilai').val();
            var id = $('#nilai-id').val();
            var ket = $('#keterangan').val();

            var data = {
                category_id: kategori,
                nilai: nilai,
                keterangan: ket,
            };
            console.log(data);

            $.ajax({
                    url: '/nilai/{id}/beri'.replace('{id}', id),
                    method: 'POST',
                    dataType: 'json',
                    data: data,
                })
                .done(function(data) {
                    $('.form-message').html('');

                    console.log(data);
                    $('#nilai').val('');
                    $('#kategori_id').val('');
                    $('#keterangan').val('')
                    $('.form-message').html('');
                    $('#modal_mahasiswa').modal('hide');
                    alert(data.message);
                    location.reload();
                })
                .fail(function(xhr) {
                    if (xhr.status === 422) {
                        // Tangani kesalahan validasi
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(field, messages) {
                            console.log(messages);
                            $.each(messages, function(index, message) {
                                $('.form-message').append('<span class="alert alert-danger" style="width: 100%">' + message + '</span><br>');
                            });
                        });
                    } else {
                        // Tangani kesalahan lainnya
                        console.error(xhr.statusText);
                    }
                });
        });
    });
</script>
@endpush

@push('customStyle')
<link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">
<!-- File CSS DataTables dengan tema Bootstrap 4 -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/dataTables.bootstrap4.min.css">
@endpush