@extends('base')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Page d'accueil</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Utilisateurs</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('users.create') }}">
                                <button type="button" class="btn btn-inverse-info btn-fw">
                                    <i class="mdi mdi-plus"></i>
                                    Ajouter un utilisateur
                                </button>
                            </a>
                            <h4 class="card-title"></h4>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>User </th>
                                            <th> Nom</th>
                                            <th>Prénom</th>
                                            <th>Nom en arabe</th>
                                            <th>Prénom en arabe</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    @foreach ($users as $user)
                                        <tbody>
                                            <tr>
                                                <td class="py-1">
                                                    <img src="{{ url('images/users/' . $user->image) }}" alt="image" />
                                                </td>
                                                <td>
                                                    {{ $user->nom }}
                                                </td>
                                                <td>
                                                    {{ $user->prenom }}
                                                </td>
                                                <td>
                                                    {{ $user->nomar }}
                                                </td>
                                                <td>
                                                    {{ $user->prenomar }}
                                                </td>
                                                <td>
                                                    @if ($user->status == 'ACTIVE')
                                                        <label class="badge badge-success">{{ $user->status }}</label>
                                                    @else
                                                        <label class="badge badge-danger">{{ $user->status }}</label>
                                                    @endif

                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-rounded btn-icon"
                                                        data-toggle="modal" data-target="#show{{ $user->id }}">
                                                        <i class="mdi mdi-eye"></i>
                                                    </button>
                                                    <div class="modal fade" id="show{{ $user->id }}" tabindex="-1"
                                                        role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        {{ $user->role }}</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <ul class="list-star">
                                                                        <li><strong>Nom:</strong> {{ $user->nom }}</li>
                                                                        <li><strong>Prénom:</strong> {{ $user->prenom }}
                                                                        </li>
                                                                        <li><strong>Nom en arabe:</strong>
                                                                            {{ $user->nomar }}</li>
                                                                        <li><strong>Préom en arabe:</strong>
                                                                            {{ $user->prenomar }}</li>
                                                                        <li><strong>Téléphone:</strong>
                                                                            {{ $user->telephone }}</li>
                                                                        <li><strong>Service:</strong>
                                                                            {{ $user->folder->designation }}</li>
                                                                        @if ($user->groupe != null)
                                                                            <li><strong>Groupe:</strong>
                                                                                {{ $user->groupe->nom }}</li>
                                                                        @endif
                                                                        <li><strong>Crée le:</strong>
                                                                            {{ $user->dateFormatted() }}</li>
                                                                    </ul>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('users.edit', $user->id) }}">
                                                        <button type="button" class="btn btn-success btn-rounded btn-icon">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </button>
                                                    </a>
                                                    @if (Auth::user()->nom != $user->nom)
                                                        <button type="button" class="btn btn-danger btn-rounded btn-icon"
                                                            onclick="document.getElementById('model-open-{{ $user->id }}').style.display='block'">
                                                            <i class="mdi mdi-delete"></i>
                                                        </button>
                                                        <form action="{{ route('users.delete', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <div class="modal" id="model-open-{{ $user->id }}">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">La suppression d'un
                                                                                utilisateur définitivement</h5>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"onclick="document.getElementById('model-open-{{ $user->id }}').style.display='none'"
                                                                                aria-label="Close">
                                                                                <span aria-hidden="true"></span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Etes-vous sùr de vouloir supprimer cet
                                                                                utilisateur?</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Oui</button>
                                                                            <button type="button" class="btn btn-secondary"
                                                                                onclick="document.getElementById('model-open-{{ $user->id }}').style.display='none'"
                                                                                data-bs-dismiss="modal">Annuler</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    @endif

                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>



                <div class='d-flex justify-content-center mt-5'>
                    {{ $users->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>

    <!-- content-wrapper ends -->

    </div>
    <!-- content-wrapper ends -->

    </div>
@endsection
