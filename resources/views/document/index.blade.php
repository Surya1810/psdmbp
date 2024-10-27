@extends('layouts.app')

@section('title')
    All Document
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
                    <h1>All Document</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-warning" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active"><strong>All Document</strong></li>
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
                                    <h3 class="card-title">All Document</h3>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="float-right btn btn-sm btn-warning rounded-partner"
                                        data-toggle="modal" data-target="#addDocument">
                                        <i class="fas fa-plus"></i> Add New
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <table id="DocumentTable" class="table table-bordered text-sm">
                                <thead class="table-light bg-warning">
                                    <tr>
                                        <th>
                                            Number
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Created by
                                        </th>
                                        <th>
                                            Department
                                        </th>
                                        <th>
                                            Last Checked
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            RFID Number
                                        </th>
                                        <th style="width: 15%">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($documents as $data)
                                        <tr>
                                            <td>{{ $data->number }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->created_by->name }}</td>
                                            <td>{{ $data->created_by->department->name }}</td>
                                            <td></td>
                                            <td>{{ $data->status }}</td>
                                            <td>{{ $data->tag->number }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-warning rounded-partner"
                                                    data-toggle="modal" data-target="#editDocument{{ $data->id }}">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <a href="{{ route('document.history', $data->id) }}"
                                                    class="btn btn-sm btn-info rounded-partner">
                                                    <i class="fas fa-solid fa-clock-rotate-left"></i>
                                                </a>
                                                <button class="btn btn-sm btn-danger rounded-partner"
                                                    onclick="deleteDocument({{ $data->id }})"><i
                                                        class="fas fa-trash"></i></button>
                                                <form id="delete-form-{{ $data->id }}"
                                                    action="{{ route('document.destroy', $data->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
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

    <!-- Modal Add Document-->
    <div class="modal fade" id="addDocument" tabindex="-1" aria-labelledby="addDocumentLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addDocumentLabel">Add New Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name" class="mb-0 form-label col-form-label-sm">Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" placeholder="Enter document name" value="{{ old('name') }}">
                            @error('name')
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

    <!-- Modal Edit Document-->
    @foreach ($documents as $data)
        <div class="modal fade" id="editDocument{{ $data->id }}" tabindex="-1" aria-labelledby="editDocumentLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editDocumentLabel">Edit Document</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('document.update', $data->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name" class="mb-0 form-label col-form-label-sm">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Enter document name"
                                    value="{{ $data->name }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-warning rounded-partner">Update</button>
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
            $('#DocumentTable').DataTable({
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

        function deleteDocument(id) {
            Swal.fire({
                title: 'Are you sure?',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Delete'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-' + id).submit();
                } else if (
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe !',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
