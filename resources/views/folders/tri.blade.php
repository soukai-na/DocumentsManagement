@extends('base2')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Page d'accueil</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('folders.index') }}">services</a></li>
                    @foreach ($folders as $folder)
                        <li class="breadcrumb-item active" aria-current="page">{{ $desg }}</li>
                    @endforeach
                </ol>
            </nav>
            <div class="row">
                <div class="row d-block mb-3">
                    <a href="">
                        <button type="button" class="btn btn-inverse-success btn-fw">
                            <i class="mdi mdi-upload"></i>
                            Scanner un fichier
                        </button>
                    </a>
                    <a href="{{ route('documents.create', $f_id) }}">
                        <button type="button" class="btn btn-inverse-primary btn-fw">
                            <i class="mdi mdi-upload"></i>
                            Importer un fichier
                        </button>
                    </a>
                    @if (Auth::user()->role == 'ADMIN')
                        <a href="{{ route('folders.tricreate', $f_id) }} ">
                            <button type="button" class="btn btn-inverse-info btn-fw">
                                <i class="mdi mdi-plus"></i>
                                Ajouter un dossier
                            </button>
                        </a>
                    @endif
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-3 mb-5 d-flex">
                                <i class="mdi mdi-menu-right mdi-36px" style="color:#f5d360;"></i>
                                <h2>{{ $desg }}
                                </h2>
                            </div>
                            <h4 class="card-title">
                                <div class="form-group">
                                    <input type="text" id="myInput" onkeyup="myFunction()" class="form-control"
                                        placeholder="Rechercher">
                                </div>
                            </h4>
                            <p class="card-description">

                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped" id="myTable">

                                    <tbody>
                                        @foreach ($folders as $folder)
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
                                                    <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                                        data-toggle="modal" data-target="#show{{ $folder->id }}">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    <div class="modal fade" id="show{{ $folder->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        {{ $folder->type }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul class="list-star">
                                                                        <li><strong>Designation:</strong>
                                                                            {{ $folder->designation }}</li>
                                                                        <li><strong>Arabe Designation:</strong>
                                                                            {{ $folder->designationar }}</li>
                                                                        <li><strong>Crée le:</strong>
                                                                            {{ $folder->created_at }}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('folders.edit', $folder->id) }}">
                                                        <button type="button" class="btn btn-success btn-rounded btn-icon">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </button>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-rounded btn-icon"
                                                        onclick="document.getElementById('model-open-{{ $folder->id }}').style.display='block'">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                    <form action="{{ route('folders.delete', $folder->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal" id="model-open-{{ $folder->id }}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">La suppression d'un dossier
                                                                            définitivement</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"onclick="document.getElementById('model-open-{{ $folder->id }}').style.display='none'"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true"></span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Etes-vous sùr de vouloir supprimer ce dossier?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Oui</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            onclick="document.getElementById('model-open-{{ $folder->id }}').style.display='none'"
                                                                            data-bs-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($documents as $document)
                                            <tr>
                                                <td class="py-1"
                                                    onclick="document.location='{{ route('documents.show', $document->id) }}'"
                                                    style="cursor:pointer;">
                                                    <img src="../../images/file.png"
                                                        style="border-radius: 0%; cursor: pointer;" alt="image" />
                                                </td>
                                                <td>
                                                    {{ $document->designation }}
                                                </td>
                                                <td>{{ $document->type }}</td>
                                                <td>{!! DNS2D::getBarcodeHTML($document->file, 'QRCODE', 3, 3) !!}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                                        data-toggle="modal" data-target="#show{{ $document->id }}">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    <div class="modal fade" id="show{{ $document->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-scrollable" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        {{ $document->designation }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @switch($document->type)
                                                                        @case('image')
                                                                            <center>
                                                                                <img src="{{ url('documents/' . $document->file) }}"
                                                                                    style="width: auto !important; height: auto !important; border-radius: 0%; max-width: 720px"
                                                                                    alt="image" />
                                                                            </center>
                                                                        @break

                                                                        @case('video')
                                                                            <center>
                                                                                <video controls width="100%" autoplay>

                                                                                    <source
                                                                                        src="{{ url('documents/' . $document->file) }}">

                                                                                </video>
                                                                            </center>
                                                                        @break

                                                                        @case('audio')
                                                                            <center>
                                                                                <figure>
                                                                                    <audio controls
                                                                                        src="{{ url('documents/' . $document->file) }}">
                                                                                    </audio>
                                                                                </figure>
                                                                            </center>
                                                                        @break

                                                                        @case('excel')
                                                                            <center>
                                                                                <a href="{{ url('documents/' . $document->file) }}"
                                                                                    target="_blank">Ouvrir le fichier
                                                                                    excel</a>
                                                                            </center>
                                                                        @break

                                                                        @case('word')
                                                                            <center>
                                                                                <a href="{{ url('documents/' . $document->file) }}"
                                                                                    target="_blank">Ouvrir le fichier
                                                                                    word</a>
                                                                                <iframe
                                                                                    src="https://view.officeapps.live.com/op/view.aspx?src={{ url('documents/' . $document->file) }}"
                                                                                    frameborder="0"></iframe>
                                                                            </center>
                                                                        @break

                                                                        @case('txt')
                                                                            <center>
                                                                                <object
                                                                                    data="{{ url('documents/' . $document->file) }}"
                                                                                    type="text/plain" width="100%"
                                                                                    height="700px">
                                                                                    <a
                                                                                        href="{{ url('documents/' . $document->file) }}">No
                                                                                        Support?</a>
                                                                                </object>
                                                                            </center>
                                                                        @break

                                                                        @default
                                                                            <center>
                                                                                <iframe
                                                                                    src="{{ url('documents/' . $document->file) }}"
                                                                                    width="100%" height="700px"></iframe>
                                                                            </center>
                                                                    @endswitch
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('documents.show', $document->id) }}"
                                                                        type="button" class="btn btn-primary">Afficher
                                                                        plus</a>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('documents.edit', $document->id) }}">
                                                        <button type="button"
                                                            class="btn btn-success btn-rounded btn-icon">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </button>
                                                    </a>
                                                    <button type="button" class="btn btn-danger btn-rounded btn-icon"
                                                        onclick="document.getElementById('model-open-{{ $document->id }}').style.display='block'">
                                                        <i class="mdi mdi-delete"></i>
                                                    </button>
                                                    <form action="{{ route('documents.delete', $document->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal" id="model-open-{{ $document->id }}">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">La suppression d'un
                                                                            document définitivement</h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-bs-dismiss="modal"onclick="document.getElementById('model-open-{{ $document->id }}').style.display='none'"
                                                                            aria-label="Close">
                                                                            <span aria-hidden="true"></span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>Etes-vous sùr de vouloir supprimer ce document?
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Oui</button>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            onclick="document.getElementById('model-open-{{ $document->id }}').style.display='none'"
                                                                            data-bs-dismiss="modal">Annuler</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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

        </div>

    </div>
@endsection
@section('scripts')

@endsection
