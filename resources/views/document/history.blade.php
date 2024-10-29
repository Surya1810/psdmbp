@extends('layouts.app')

@section('title')
    Document History
@endsection

@push('css')
@endpush

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Document History</h1>
                    <ol class="breadcrumb text-black-50">
                        <li class="breadcrumb-item"><a class="text-warning" href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a class="text-warning" href="{{ route('document.index') }}">Document</a>
                        </li>
                        <li class="breadcrumb-item active"><strong>Document History</strong></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-warning">27 Oktober 2024</span>
                        </div>
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-pencil bg-warning"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> yesterday</span>
                                <h3 class="timeline-header">Dokumen dibuat</h3>

                                <div class="timeline-body">
                                    Document dengan nomor <strong class="text-warning">{{ $document->number }}</strong>
                                    perihal <strong class="text-warning">{{ $document->name }}</strong> telah dibuat oleh
                                    <strong class="text-warning">{{ $document->created_by->name }}</strong>
                                    ditujukan untuk
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-signs-post bg-warning"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> yesterday</span>
                                <h3 class="timeline-header">Dokumen Menuju Departemen Keuangan</h3>

                                <div class="timeline-body">
                                    Document dengan nomor <strong class="text-warning">{{ $document->number }}</strong>
                                    perihal <strong class="text-warning">{{ $document->name }}</strong> telah dibuat oleh
                                    <strong class="text-warning">{{ $document->created_by->name }}</strong>
                                    ditujukan untuk
                                </div>
                            </div>
                        </div>
                        <!-- timeline time label -->
                        <div class="time-label">
                            <span class="bg-warning">28 Oktober 2024</span>
                        </div>
                        <!-- /.timeline-label -->
                        <div>
                            <i class="fas fa-signs-post bg-warning"></i>
                            <div class="timeline-item bg-danger">
                                <span class="time text-white"><i class="fas fa-clock"></i> 2 hours ago</span>
                                <h3 class="timeline-header text-white">Dokumen Sampai di Departemen PPK</h3>

                                <div class="timeline-body bg-danger">
                                    Document dengan nomor <strong class="text-warning">{{ $document->number }}</strong>
                                    perihal <strong class="text-warning">{{ $document->name }}</strong> telah dibuat oleh
                                    <strong class="text-warning">{{ $document->created_by->name }}</strong>
                                    ditujukan untuk
                                </div>
                            </div>
                        </div>
                        <div>
                            <i class="fas fa-signs-post bg-warning"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                                <h3 class="timeline-header">Dokumen Sampai Departemen Keuangan</h3>

                                <div class="timeline-body">
                                    Document dengan nomor <strong class="text-warning">{{ $document->number }}</strong>
                                    perihal <strong class="text-warning">{{ $document->name }}</strong> telah dibuat oleh
                                    <strong class="text-warning">{{ $document->created_by->name }}</strong>
                                    ditujukan untuk
                                </div>
                            </div>
                        </div>
                        <!-- END timeline item -->
                        <div>
                            <i class="fas fa-clock bg-gray"></i>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
