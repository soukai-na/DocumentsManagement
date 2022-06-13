@extends('base')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('welcome')}}">Page d'accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Groupes</li>
                </ol>
              </nav>
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
            <div class="card-body">
              <a  href="{{ route('groupes.create') }}"> 
              <button type="button" class="btn btn-inverse-info btn-fw">
                <i class="mdi mdi-plus"></i> 
                Ajouter un groupe                                                                           
              </button>
            </a>
            <h4 class="card-title"></h4>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th>Nom </th>
                            <th> Description</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        @foreach ($groupes as $groupe)
                        <tbody>
                          <tr>
                            <td>
                                {{ $groupe->nom }}
                            </td>
                            <td>
                                {{ $groupe->description }}
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-rounded btn-icon" data-toggle="modal" data-target="#show{{ $groupe->id }}" >
                                    <i class="mdi mdi-eye"></i>
                                </button>
                              <div class="modal fade" id="show{{ $groupe->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">{{ $groupe->nom }}</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <ul  class="list-star">
                                        <li ><strong>Description:</strong>   {{ $groupe->description }}</li>
                                        <li><strong>Crée le:</strong>   {{ $groupe->created_at }}</li>
                                        <li><strong>Utlisateurs:</strong>   ...</li>
                                      </ul>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                <a href="{{ route('groupes.edit',$groupe->id) }}">
                                    <button type="button" class="btn btn-success btn-rounded btn-icon">
                                        <i class="mdi mdi-pencil"></i>
                                    </button>
                                  </a>
                                <button type="button" class="btn btn-danger btn-rounded btn-icon" onclick="document.getElementById('model-open-{{ $groupe->id }}').style.display='block'">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                                <form action="{{ route('groupes.delete' , $groupe->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <div class="modal" id="model-open-{{ $groupe->id }}">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">La suppression d'un groupe définitivement</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"onclick="document.getElementById('model-open-{{ $groupe->id }}').style.display='none'" aria-label="Close">
                                              <span aria-hidden="true"></span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <p>Etes-vous sùr de vouloir supprimer ce groupe?</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Oui</button>
                                            <button type="button" class="btn btn-secondary" onclick="document.getElementById('model-open-{{ $groupe->id }}').style.display='none'" data-bs-dismiss="modal">Annuler</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                   </form>
                                
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
                  {{ $groupes->links('vendor.pagination.custom') }}
              </div>
            </div>
            </div>
          </div>
          
            <!-- content-wrapper ends -->
            
          </div>
        <!-- content-wrapper ends -->
        
      </div>
@endsection