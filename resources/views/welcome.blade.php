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
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Page d'accueil</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
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
                                            placeholder="Rechercher par mot clé" aria-label="Recipient's username">
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="type" id="exampleSelectGender">
                                        <option selected disabled>Type de dossier</option>
                                        <option value="service">Service</option>
                                        <option value="sousservice">Sous Service</option>
                                        <option value="theme">Thème</option>
                                        <option value="soustheme">Sous Thème</option>
                                        <option value="dossier">Dossier</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="type" id="exampleSelectGender">
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
            </div>
        </div>
        <!-- content-wrapper ends -->

    </div>
    <!-- main-panel ends -->
@endsection
