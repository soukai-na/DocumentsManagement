@extends('base3')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Ajouter un dossier</h4>
                <p class="card-description">
                  
                </p>
                <form class="forms-sample"  method="POST" action="{{ route('folders.store') }}">
                    @csrf
                  <div class="form-group">
                    <label for="designation">Designation</label>
                    <input type="text" name="designation" class="form-control  @error('designation') is-invalid @enderror"  id="exampleInputName1" placeholder="designation">
                    @error('designation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                  </div>
                  <div class="form-group">
                    <label for="designationar">Arabe designation</label>
                    <input type="text" name="designationar" class="form-control @error('designationar') is-invalid @enderror"  id="exampleInputName1" placeholder="arabe designation">
                    @error('designationar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label for="type">Type de dossier</label>
                      <select class="form-control" name="type" id="exampleSelectGender">
                        <option value="service">Service</option>
                        <option value="sousservice">Sous Service</option>
                        <option value="theme">Thème</option>
                        <option value="soustheme">Sous Thème</option>
                        <option value="dossier">Dossier</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="folder" value="{{ $folder->id }}" class="form-control @error('folder') is-invalid @enderror"  id="exampleInputName1" >
                        @error('folder')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                      </div>
                  <button type="submit" class="btn btn-primary mr-2">Ajouter</button>
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