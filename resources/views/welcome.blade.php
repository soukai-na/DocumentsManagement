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
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale" style="background: #2196f3;color: white; border-radius: 20px;">
                            <div class="card-body">
                                <p class="mb-4">Today’s Bookings</p>
                                <p class="fs-30 mb-2">4006</p>
                                <p>10.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-dark-blue" style="background: #3f51b5;color: white; border-radius: 20px;">
                            <div class="card-body">
                                <p class="mb-4">Total Bookings</p>
                                <p class="fs-30 mb-2">61344</p>
                                <p>22.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4  stretch-card transparent">
                        <div class="card card-light-blue" style="background: #8bc34a;color: white; border-radius: 20px;">
                            <div class="card-body">
                                <p class="mb-4">Number of Meetings</p>
                                <p class="fs-30 mb-2">34040</p>
                                <p>2.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-light-danger" style="background: #009688;color: white; border-radius: 20px;">
                            <div class="card-body">
                                <p class="mb-4">Number of Clients</p>
                                <p class="fs-30 mb-2">47033</p>
                                <p>0.22% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale" style="background: #965bff;color: white; border-radius: 20px;">
                            <div class="card-body">
                                <p class="mb-4">Today’s Bookings</p>
                                <p class="fs-30 mb-2">4006</p>
                                <p>10.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale" style="background: #e95889;color: white; border-radius: 20px;">
                            <div class="card-body">
                                <p class="mb-4">Today’s Bookings</p>
                                <p class="fs-30 mb-2">4006</p>
                                <p>10.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4 stretch-card transparent">
                        <div class="card card-tale" style="background: #607d8b;color: white; border-radius: 20px;">
                            <div class="card-body">
                                <p class="mb-4">Today’s Bookings</p>
                                <p class="fs-30 mb-2">4006</p>
                                <p>10.00% (30 days)</p>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card ">
                        <div class="card-body justify-content-center">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h2 class="font-weight-bold mb-4 justify-content-center">Rechercher</h2>
                            </div>

                            <form class="forms-sample" method="GET" action="{{ route('search') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="doc" class="form-control"
                                            placeholder="Rechercher par nom de document" aria-label="Recipient's username">
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="tag" class="form-control"
                                            placeholder="Rechercher par mots clés" aria-label="Recipient's username">
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="typeFolder" id="exampleSelectGender">
                                        <option selected disabled>Type de dossier</option>
                                        <option value="service">Service</option>
                                        <option value="sousservice">Sous Service</option>
                                        <option value="theme">Thème</option>
                                        <option value="soustheme">Sous Thème</option>
                                        <option value="dossier">Dossier</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="typeDoc" id="exampleSelectGender">
                                        <option selected disabled>Type de fichier</option>
                                        <option value="image">Image</option>
                                        <option value="video">Vidéo</option>
                                        <option value="pdf">PDF</option>
                                        <option value="word">Word</option>
                                        <option value="excel">Excel</option>
                                        <option value="txt">Fichier texte</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="date" name="date" class="form-control"
                                            placeholder="Par date de création" aria-label="Recipient's username">
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group justify-content-center">
                                    <button type="submit" class="btn btn-primary mb-2 float-right">Rechercher</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 grid-margin stretch-card">
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
