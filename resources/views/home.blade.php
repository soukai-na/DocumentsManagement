@extends('base')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row mb-3">
                <div class="col-sm-12 mb-4 mb-xl-0">
                    <h4 class="font-weight-bold text-dark">Bonjour, {{ Auth::user()->nom }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <p class="card-description">

                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>
                                                label
                                            </th>
                                            <th>
                                                Designation
                                            </th>
                                            <th>
                                                Arabe designation
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach ($folders as $folder)
                                        @if (empty($folder->folder_id))
                                            <tbody>
                                                <tr>
                                                    <td class="py-1"
                                                        onclick="document.location='{{ route('folders.tri', $folder->id) }}'"
                                                        style="cursor:pointer;">
                                                        <img src="../../images/folder.png"
                                                            style="border-radius: 0%; cursor: pointer;" alt="image" />
                                                    </td>
                                                    <td>
                                                        {{ $folder->designation }}
                                                    </td>
                                                    <td>
                                                        {{ $folder->designationar }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->

    </div>
    <!-- main-panel ends -->
@endsection
