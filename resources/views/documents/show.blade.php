@extends('base3')

@section('content')

          <div class="main-panel">
            <div class="content-wrapper">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="{{ route('welcome')}}">Page d'accueil</a></li>
                      <li class="breadcrumb-item"><a href="{{ route('documents')}}">Documents</a></li>
                      <li class="breadcrumb-item active" aria-current="page">{{$document->designation}}</li>
                    </ol>
                  </nav>
              <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">{{$document->designation}}</h4>
                        <p class="card-description">
                          Crée par: admin <br> {{$document->created_at}}
                        </p>
                        <p class="card-description">
                            {{$document->description}}
                          </p>
                        <center>
                            <embed src="{{ url('documents/'.$document->file) }}"  width="800" height="500" >
                        </center>
                      </div>
                    </div>
                  </div>
                
                
                
              </div>
              
            </div>
            <!-- content-wrapper ends -->
            
          </div>
        <!-- content-wrapper ends -->
    
@endsection