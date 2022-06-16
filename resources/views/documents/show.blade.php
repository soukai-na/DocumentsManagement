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
                                <a href="">
                                    <button type="button" class="btn btn-outline-success btn-fw ">
                                        <i class="mdi mdi-pencil"></i>
                                        Modifier
                                    </button>
                                </a>
                                <a href="#">
                                    <button type="button" class="btn btn-outline-danger btn-fw ">
                                        <i class="mdi mdi-delete"></i>
                                        Supprimer
                                    </button>
                                </a>
                            </div>
                            <b>Mot clés:</b>
                            @foreach ($document->tags as $tag)
                                <label class="badge badge-info mb-5">{{ $tag->name }}</label>
                            @endforeach
                            <h4 class="card-title">{{ $document->designation }}</h4>
                            <p class="card-description">
                                Crée par: admin <br> {{ $document->created_at }}
                            </p>
                            <p class="card-description">
                                {{ $document->description }}
                            </p>

                            @switch($document->type)
                                @case('image')
                                    <center>
                                        <img src="{{ url('documents/' . $document->file) }}" alt="image" />
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
