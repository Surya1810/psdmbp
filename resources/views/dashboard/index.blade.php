@extends('layouts.app')

@section('title')
    Dashboard
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
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-12 text-center">
                    <a href="{{ route('document.masuk') }}">
                        <div class="info-box bg-black">
                            <span class="info-box-icon"><i class="fa-solid fa-envelope-open-text"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Kotak Masuk</span>
                                <span class="info-box-number">1</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-12 text-center">
                    <a href="{{ route('document.keluar') }}">
                        <div class="info-box bg-black">
                            <span class="info-box-icon"><i class="fa-solid fa-envelope-open"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Kotak Keluar</span>
                                <span class="info-box-number">1</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-12 text-center">
                    <a href="{{ route('document.tersimpan') }}">
                        <div class="info-box bg-black">
                            <span class="info-box-icon"><i class="fa-solid fa-envelope-circle-check"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Kotak Tersimpan</span>
                                <span class="info-box-number">1</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-12 text-center">
                    <a type="button" data-toggle="modal" data-target="#addDocument" class="w-100">
                        <div class="info-box bg-warning">
                            <span class="info-box-icon"><i class="fa-solid fa-pencil-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text">Buat Dokumen</span>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- ./col -->
            </div>
        </div>
    </section>

    <!-- Modal Add Document-->
    <div class="modal fade" id="addDocument" aria-labelledby="addDocumentLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocumentLabel">Buat Dokumen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('dokumen.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="rfid" class="mb-0 form-label col-form-label-sm">PIC</label>
                            <select class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning"
                                style="width: 100%;" name="rfid" id="rfid">
                                <option></option>
                                @foreach ($rfids as $data)
                                    <option value="{{ $data->id }}" @selected(old('rfid') == $data->id)>
                                        {{ $data->number }}</option>
                                @endforeach
                            </select>
                            @error('rfid')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="nomor" class="mb-0 form-label col-form-label-sm">Nomor</label>
                            <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor"
                                name="nomor" placeholder="Nomor Dokumen" value="{{ old('nomor') }}">
                            @error('nomor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="perihal" class="mb-0 form-label col-form-label-sm">Perihal</label>
                            <input type="text" class="form-control @error('perihal') is-invalid @enderror" id="perihal"
                                name="perihal" placeholder="Perihal Dokumen" value="{{ old('perihal') }}">
                            @error('perihal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="tujuan_berikutnya" class="mb-0 form-label col-form-label-sm">Tujuan
                                Berikutnya</label>
                            <select class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning"
                                style="width: 100%;" name="tujuan_berikutnya" id="tujuan_berikutnya">
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
                            <label for="tujuan_akhir" class="mb-0 form-label col-form-label-sm">Tujuan Akhir</label>
                            <select class="form-control select2 select2-warning" data-dropdown-css-class="select2-warning"
                                style="width: 100%;" name="tujuan_akhir" id="tujuan_akhir">
                                <option></option>
                                @foreach ($users as $data)
                                    <option value="{{ $data->id }}" @selected(old('tujuan_akhir') == $data->id)>
                                        {{ $data->name }} - {{ $data->department->name }}</option>
                                @endforeach
                            </select>
                            @error('tujuan_akhir')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-warning rounded-partner">Buat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
            //Initialize Select2 Elements
            $('#tujuan_berikutnya').select2({
                placeholder: "Pilih Tujuan",
                allowClear: true,
            })
            $('#tujuan_akhir').select2({
                placeholder: "Pilih Tujuan",
                allowClear: true,
            })
            $('#rfid').select2({
                placeholder: "Pilih RFID Tag",
                allowClear: true,
            })
        })

        $(function() {
            $('#DocumentTable').DataTable({
                "paging": true,
                'processing': true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                // "scrollX": true,
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
