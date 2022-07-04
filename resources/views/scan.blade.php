@extends('base2')
@section('styles')
    <script type="text/javascript" src="../Resources/dynamsoft.webtwain.initiate.js"></script>
    <script type="text/javascript" src="../Resources/dynamsoft.webtwain.config.js"></script>
    <meta name="_token" content="" />
@endsection
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Scanner un document</h4>
                            <p class="card-description">

                            </p>
                            <form class="forms-sample" method="POST" action="{{ route('documents.store', $folder->id) }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" name="designation"
                                        class="form-control @error('designation') is-invalid @enderror"
                                        placeholder="Le nom de la designation" />
                                    @error('designation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea id="exampleTextarea1" rows="4" name="description"
                                        class="form-control @error('description') is-invalid @enderror"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div><br>
                                <div class="form-group">
                                    <label for="document">Document</label>
                                    <br>
                                    <input type="button" class="btn btn-outline-info btn-fw " value="Scan document"
                                        onclick="acquireImage();" />

                                    <div id="dwtcontrolContainer"></div>
                                    @error('file')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" class="form-control">
                                        <option value="image">Image</option>
                                        <option value="video">Vidéo</option>
                                        <option value="audio">Audio</option>
                                        <option value="pdf" selected>PDF</option>
                                        <option value="word">Word</option>
                                        <option value="excel">Excel</option>
                                        <option value="txt">Fichier texte</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Mots clés:</label>
                                    <br />
                                    <input type="text" name="tags" data-role="tagsinput">
                                    @if ($errors->has('tags'))
                                        <span class="text-danger">{{ $errors->first('tags') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="folder" value="{{ $folder->id }}"
                                        class="form-control @error('folder') is-invalid @enderror" />
                                    @error('folder')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">

                                    <input type="hidden" name="user"
                                        class="form-control @error('user') is-invalid @enderror"
                                        value="{{ Auth::user()->id }}" />

                                </div>
                                <button type="submit" class="btn btn-primary mr-2" id="btnUpload"
                                    onclick="upload()">Ajouter le document</button>

                            </form><a href=" {{ Route('documents') }}">
                                <br>
                                <button class="btn btn-light">Cancel</button></a>
                        </div>
                    </div>
                </div>



            </div>

        </div>
        <!-- content-wrapper ends -->
    @endsection
    @section('scripts')
    @endsection
