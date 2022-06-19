@extends('base2')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modifier le document</h4>
                            <p class="card-description">
                            <form class="forms-sample" method="POST"
                                action="{{ route('documents.updateFile', $document->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="form-group">
                                    <label for="file">Document</label>
                                    <input type="file" name="file" class="form-control file-upload-info"
                                        placeholder="document">
                                    <a href="{{ url('documents/' . $document->file) }}" target="_blank">
                                        {{ $document->file }}</a>
                                    @error('file')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" class="form-control">
                                         <option value="image" {{ 'image' === $document->type ? 'selected' : '' }}>Image</option>
                                         <option value="video" {{ 'video' === $document->type ? 'selected' : '' }}>Vidéo</option>
                                         <option value="audio" {{ 'audio' === $document->type ? 'selected' : '' }}>Audio</option>
                                         <option value="pdf" {{ 'pdf' === $document->type ? 'selected' : '' }}>PDF</option>
                                         <option value="word" {{ 'word' === $document->type ? 'selected' : '' }}>Word</option>
                                         <option value="excel" {{ 'excel' === $document->type ? 'selected' : '' }}>Excel</option>
                                         <option value="txt" {{ 'txt' === $document->type ? 'selected' : '' }}>Fichier texte</option>
                                    </select> 
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Changer le document</button>

                            </form>
                            </p>
                            <br>
                            <form class="forms-sample" method="POST"
                                action="{{ route('documents.update', $document->id) }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="form-group">
                                    <label for="designation">Designation</label>
                                    <input type="text" name="designation" value="{{ $document->designation }}"
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
                                        class="form-control @error('description') is-invalid @enderror">{{ $document->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="folder" value="{{ $document->folder_id }}"
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
                                        value="{{ $document->user_id }}" />

                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Modifier le document</button>

                            </form>
                            <a href=" {{ Route('documents') }}">
                                <br>
                                <button class="btn btn-light">Cancel</button></a>
                        </div>
                    </div>
                </div>



            </div>

        </div>
        <!-- content-wrapper ends -->
    @endsection
