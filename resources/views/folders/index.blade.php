@extends('base')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Page d'accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">services</li>
                </ol>
            </nav>
            <div class="row">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @elseif (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('folders.create') }}">
                                <button type="button" class="btn btn-inverse-info btn-fw">
                                    <i class="mdi mdi-plus"></i>
                                    Ajouter un service
                                </button>
                            </a>
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
                                            <th>
                                                Actions
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
                                                                                {{ $folder->dateFormatted() }}</li>
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
                                                            <button type="button"
                                                                class="btn btn-success btn-rounded btn-icon">
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
                                                                            <h5 class="modal-title">La suppression d'un
                                                                                dossier définitivement</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"onclick="document.getElementById('model-open-{{ $folder->id }}').style.display='none'"
                                                                                aria-label="Close">
                                                                                <span aria-hidden="true"></span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Etes-vous sùr de vouloir supprimer ce
                                                                                dossier?</p>
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

    </div>
@endsection
