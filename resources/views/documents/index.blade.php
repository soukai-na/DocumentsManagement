@extends('base2')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Page d'accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Documents</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Designation </th>
                                            <th>Description</th>
                                            <th>File</th>
                                            <th>Type</th>
                                            <th>Date de création</th>
                                        </tr>
                                    </thead>
                                    @foreach ($documents as $document)
                                        <tbody>
                                            <tr onclick="document.location='{{ route('documents.show', $document->id) }}'"
                                                style="cursor:pointer;">
                                                <td>
                                                    {{ $document->designation }}
                                                </td>
                                                <td>
                                                    {{ $document->description }}
                                                </td>
                                                <td class="py-1">
                                                    <a target="_blank"
                                                        href="{{ url('documents/' . $document->file) }}">{{ $document->file }}</a>
                                                </td>
                                                <td>
                                                    {{ $document->type }}
                                                </td>
                                                <td>
                                                    {{ $document->dateFormatted() }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        <div class='d-flex justify-content-center mt-5'>
                            {{ $documents->links('vendor.pagination.custom') }}
                        </div>
                    </div>





                </div>
                <!-- content-wrapper ends -->

            </div>
            <!-- content-wrapper ends -->
        </div>
    </div>
@endsection
