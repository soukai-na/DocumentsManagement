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
                    <a href="{{ route('documents.create', $f_id) }}">
                        <button type="button" class="btn btn-inverse-primary btn-fw">
                            <i class="mdi mdi-upload"></i>
                            Importer un fichier
                        </button>
                    </a>
                    <a href="{{ route('folders.tricreate', $f_id) }} ">
                        <button type="button" class="btn btn-inverse-info btn-fw">
                            <i class="mdi mdi-plus"></i>
                            Ajouter un dossier
                        </button>
                    </a>
                </div>

                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="mt-3 mb-5 d-flex">

                                <h2>
                                    <img src="../../images/folder.png"
                                        style="border-radius: 0%; cursor: pointer; max-width:4%;" alt="image" />
                                    {{ $desg }}
                                </h2>
                            </div>
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
                                                Actions
                                            </th>
                                        </tr>
                                    </thead>
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
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                                        data-toggle="modal" data-target="#show{{ $document->id }}">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    <div class="modal fade" id="show{{ $document->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
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
                                                                    Ici!
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="">
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
