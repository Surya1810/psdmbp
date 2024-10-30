@extends('layouts.app')

@section('title')
    Dokumen Masuk
@endsection

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets/adminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/adminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dokumen Masuk</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-warning" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>Dokumen Masuk</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline rounded-partner card-warning">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-6">
                                    <h3 class="card-title">Dokumen Masuk</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="DocumentTable" class="table table-bordered text-sm">
                                <thead class="table-light bg-warning">
                                    <tr>
                                        <th>
                                            RFID
                                        </th>
                                        <th>
                                            Nomor
                                        </th>
                                        <th>
                                            Perihal
                                        </th>
                                        <th>
                                            Dibuat Oleh
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $data)
                                        <tr>
                                            <td>{{ $data->tag->number }}</td>
                                            <td>{{ $data->number }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->created_by->name }} <br>
                                                <strong>{{ $data->created_by->position->name }}
                                                    {{ $data->created_by->department->name }}</strong>
                                            </td>
                                            <td>{{ $data->status }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-success rounded-partner"
                                                    data-toggle="modal" data-target="#addTujuan{{ $data->id }}">
                                                    <i class="fas fa-arrow-right"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach ($documents as $data)
        <!-- Modal Add Tujuan-->
        <div class="modal fade" id="addTujuan{{ $data->id }}" tabindex="-1" aria-labelledby="addTujuanLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTujuanLabel">Tujuan Berikutnya</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('dokumen.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tujuan_berikutnya" class="mb-0 form-label col-form-label-sm">Tujuan
                                    Berikutnya</label>
                                <select class="form-control select2 select2-warning"
                                    data-dropdown-css-class="select2-warning" style="width: 100%;" name="tujuan_berikutnya"
                                    id="tujuan_berikutnya">
                                    <option></option>
                                    @foreach ($users as $data)
                                        <option value="{{ $data->id }}" @selected(old('tujuan_berikutnya') == $data->id)>
                                            {{ $data->name }} - {{ $data->department->name }}</option>
                                    @endforeach
                                </select>
                                @error('tujuan_berikutnya')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning rounded-partner">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/adminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/jszip/jszip.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/adminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/adminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script> --}}
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/adminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

    <script type="text/javascript">
        $(function() {
            $(function() {
                //Initialize Select2 Elements
                $('#tujuan_berikutnya').select2({
                    placeholder: "Pilih Tujuan",
                    allowClear: true,
                })
            })

            $('#TujuanTable').DataTable({
                "paging": true,
                'processing': true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                "scrollX": true,
                // width: "700px",
                // columnDefs: [{
                //     className: 'dtr-control',
                //     orderable: false,
                //     targets: -8
                // }]
            });
        });
    </script>
@endpush
