@extends('base3')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Page d'accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('documents') }}">Documents</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $document->designation }}</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <div class="float-right mb-3">
                                <a href="{{ route('documents.download', $document->id) }}">
                                    <button type="button" class="btn btn-outline-info btn-fw ">
                                        <i class="mdi mdi-download"></i>
                                        Télécharger
                                    </button>
                                </a>
                                <a href="{{ route('documents.edit',$document->id) }}">
                                    <button type="button" class="btn btn-outline-success btn-fw ">
                                        <i class="mdi mdi-pencil"></i>
                                        Modifier
                                    </button>
                                </a>
                                <button type="button" class="btn btn-outline-danger btn-fw" onclick="document.getElementById('model-open-{{ $document->id }}').style.display='block'">
                                    <i class="mdi mdi-delete"></i> Supprimer
                                </button>
                                <form action="{{ route('documents.delete' , $document->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <div class="modal" id="model-open-{{ $document->id }}">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">La suppression d'un document définitivement</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"onclick="document.getElementById('model-open-{{ $document->id }}').style.display='none'" aria-label="Close">
                                              <span aria-hidden="true"></span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Etes-vous sùr de vouloir supprimer ce document?</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Oui</button>
                                            <button type="button" class="btn btn-secondary" onclick="document.getElementById('model-open-{{ $document->id }}').style.display='none'" data-bs-dismiss="modal">Annuler</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                   </form>
                            </div>
                            <b>Mots clés:</b>
                            @foreach ($document->tags as $tag)
                                <label class="badge badge-info mb-5">{{ $tag->name }}</label>
                            @endforeach
                            <h2 class="card-title">{{ $document->designation }}</h2>
                            <p class="card-description">
                                <b style="color:#3774fc;">Crée par:</b> admin <br>
                                <b style="color:#3774fc;">Taille de fichier:</b>  {{ $fileSize }}<br>
                                <b style="color:#3774fc;">Date de création:</b> {{ $document->dateFormatted() }}
                            </p>
                            <p class="card-description">
                                <b style="color:#3774fc;">Description:</b><br>{{ $document->description }}
                            </p>

                            @switch($document->type)
                                @case('image')
                                    <center>
                                        <img src="{{ url('documents/' . $document->file) }}" style="width: 100%; max-width: 720px" alt="image" />
                                    </center>
                                @break

                                @case('video')
                                    <center>
                                        <video controls width="500" autoplay>

                                            <source src="{{ url('documents/' . $document->file) }}">

                                        </video>
                                    </center>
                                @break

                                @case('audio')
                                    <center>
                                        <figure>
                                            <audio controls src="{{ url('documents/' . $document->file) }}">
                                            </audio>
                                        </figure>
                                    </center>
                                @break

                                @case('excel')
                                    <center>
                                        <a href="{{ url('documents/' . $document->file) }}" target="_blank">Ouvrir le fichier
                                            excel</a>
                                    </center>
                                @break

                                @case('word')
                                    <center>
                                        <a href="{{ url('documents/' . $document->file) }}" target="_blank">Ouvrir le fichier
                                            word</a>
                                    </center>
                                @break

                                @case('txt')
                                    <center>
                                        <object data="{{ url('documents/' . $document->file) }}" type="text/plain" width="700">
                                            <a href="{{ url('documents/' . $document->file) }}">No Support?</a>
                                        </object>
                                    </center>
                                @break

                                @default
                                    <center>
                                        <embed src="{{ url('documents/' . $document->file) }}" width="800" height="700">
                                    </center>
                            @endswitch

                        </div>
                    </div>
                </div>



            </div>

        </div>
        <!-- content-wrapper ends -->

    </div>
    <!-- content-wrapper ends -->
@endsection
