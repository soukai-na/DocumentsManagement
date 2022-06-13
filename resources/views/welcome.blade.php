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
            <div class="card " >
              <div class="card-body justify-content-center" >
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                <h2 class="font-weight-bold mb-4 justify-content-center">Rechercher</h2>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Rechercher par nom de document" aria-label="Recipient's username">
                    <div class="input-group-append">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Rechercher par ...</button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Services</a>
                        <a class="dropdown-item" href="#">Sous Services</a>
                        <a class="dropdown-item" href="#">Thèmes</a>
                        <a class="dropdown-item" href="#">Sous Thèmes</a>
                        <a class="dropdown-item" href="#">Dossiers</a>
                      </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Type de documents</button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Images</a>
                        <a class="dropdown-item" href="#">Vidéos</a>
                        <a class="dropdown-item" href="#">PDF</a>
                        <a class="dropdown-item" href="#">Word</a>
                        <a class="dropdown-item" href="#">Excel</a>
                        <a class="dropdown-item" href="#">Fichier texte</a>
                      </div>
                    </div>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="date" class="form-control" placeholder="Par date de création" aria-label="Recipient's username">
                    <div class="input-group-append">
                    </div>
                  </div>
                </div>
                <div class="form-group justify-content-center">
                  <button type="submit" class="btn btn-primary mb-2">Rechercher</button>
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