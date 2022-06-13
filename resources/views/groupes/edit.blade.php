@extends('base3')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Modifier le groupe</h4>
                <p class="card-description">
                  
                </p>
                <form class="forms-sample" method="POST" action="{{ route('groupes.update',$groupe->id) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                  <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" value="{{ $groupe->nom }}" class="form-control @error('nom') is-invalid @enderror" placeholder="Le nom de groupe"/>
                    @error('nom')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <textarea  id="exampleTextarea1" rows="4" name="description"  class="form-control @error('description') is-invalid @enderror">{{ $groupe->description }}</textarea> 
                                          @error('description')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror              
                </div>
                  <button type="submit" class="btn btn-primary mr-2">Ajouter le groupe</button>
                  
                </form><a href=" {{ Route('groupes') }}">
                    <br>
                    <button class="btn btn-light">Cancel</button></a>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection