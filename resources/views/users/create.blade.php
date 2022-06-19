@extends('base')

@section('content')
      <div class="main-panel">
        <div class="content-wrapper">
              <div class="row">
                
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Créer un utilisateur</h4>
                        <p class="card-description">
                          
                        </p>
                        <form class="forms-sample" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <strong>Image:</strong>
                                 <input type="file" name="image" class="form-control file-upload-info" placeholder="Image d'utilisateur">
                                @error('image')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                               @enderror
                            </div>
                          <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" placeholder="Le nom d'utilisateur"/>
                            @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" class="form-control @error('prenom') is-invalid @enderror" placeholder="Le prénom d'utilisateur"/>
                            @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="nomar">Nom en arabe</label>
                            <input type="text" name="nomar" class="form-control @error('nomar') is-invalid @enderror" placeholder="Le nom en arabe d'utilisateur"/>
                            @error('nomar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="prenomar">Prénom en arabe</label>
                            <input type="text" name="prenomar" class="form-control @error('prenomar') is-invalid @enderror" placeholder="Le prénom en arabe d'utilisateur"/>
                            @error('prenomar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email d'utilisateur"/>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Mot de passe d'utilisateur"/>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="telephone">Téléphone</label>
                            <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" placeholder="Téléphone d'utilisateur"/>
                            @error('telephone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="folder">Service</label>
                            <select name="folder" class="form-control">
                             @foreach ($folders as $folder)
                                 <option value="{{ $folder->id }}">{{ $folder->designation}}</option>
                             @endforeach    
                            </select> 
                          </div>
                          <div class="form-group">
                            <label for="groupe">Groupe</label>
                            <select name="groupe" class="form-control">
                             @foreach ($groupes as $groupe)
                                 <option value="{{ $groupe->id }}">{{ $groupe->nom}}</option>
                             @endforeach    
                            </select> 
                          </div>
                          <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control">
                                 <option value="ADMIN">ADMIN</option>
                                 <option value="USER">USER</option>
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                 <option value="ACTIVE">ACTIVE</option>
                                 <option value="INACTIVE">INACTIVE</option>
                            </select> 
                        </div>
                          <button type="submit" class="btn btn-primary mr-2">Ajouter l'utilisateur</button>
                          
                        </form><a href=" {{ Route('users') }}">
                            <br>
                            <button class="btn btn-light">Cancel</button></a>
                      </div>
                    </div>
                  </div>
                
                
                
              
            <!-- content-wrapper ends -->
            
          </div>
        <!-- content-wrapper ends -->
        
      </div>
@endsection