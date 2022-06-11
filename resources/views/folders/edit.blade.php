@extends('base3')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Modifier dossier</h4>
                <p class="card-description">
                  
                </p>
                <form class="forms-sample"  method="POST" action="{{ route('folders.update',$folder->id) }}">
                    @method('PUT')
                    @csrf
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" value="{{$folder->designation}}" class="form-control  @error('designation') is-invalid @enderror"  id="exampleInputName1" placeholder="designation">
                    @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                  </div>
                  <div class="form-group">
                    <label for="designationar">Arabe designation</label>
                    <input type="text" name="designationar" value="{{$folder->designationar}}" class="form-control @error('designationar') is-invalid @enderror"  id="exampleInputName1" placeholder="arabe designation">
                    @error('designationar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="type">Type de dossier</label>
                      <select class="form-control" name="type" id="exampleSelectGender">
                        <option value="service" {{ 'service' === $folder->type ? 'selected' : '' }}>Service</option>
                        <option value="sousservice" {{ 'sousservice' === $folder->type ? 'selected' : '' }}>Sous Service</option>
                        <option value="theme" {{ 'theme' === $folder->type ? 'selected' : '' }}>Thème</option>
                        <option value="soustheme" {{ 'soustheme' === $folder->type ? 'selected' : '' }}>Sous Thème</option>
                        <option value="dossier" {{ 'dossier' === $folder->type ? 'selected' : '' }}>Dossier</option>
                      </select>
                    </div>
                  <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                </form>
                <br>
                <a href=" {{ Route('folders.index') }}">
                    <button class="btn btn-light">Cancel</button>
                </a>
              </div>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection