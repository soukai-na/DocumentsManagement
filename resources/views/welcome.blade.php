@extends('base')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row mb-3">
                <div class="col-sm-12 mb-4 mb-xl-0">
                    <h4 class="font-weight-bold text-dark">Bonjour, {{ Auth::user()->nom }}</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-sm mb-4 stretch-card transparent">
                    <div class="card card-tale" style="background: #C4DDFF;color: white; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="mb-2"><i class="mdi  mdi-file-image"></i> Images</h5>
                            <h3 class="mb-2">{{ $images }}</h3>
                            <p>(jpg, jpeg, png, svg, gif...)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-4 stretch-card transparent">
                    <div class="card card-dark-blue" style="background: #7FB5FF;color: white; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="mb-2"><i class="mdi  mdi-file-video"></i> Vidéos</h5>
                            <h3 class="mb-2">{{ $videos }}</h3>
                            <p> (mp4, mov...)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-4  stretch-card transparent">
                    <div class="card card-light-blue" style="background: #001D6E;color: white; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="mb-2"><i class="mdi  mdi-file-music"></i> Audios</h5>
                            <h3 class="mb-2">{{ $audios }}</h3>
                            <p>(mp3...)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-4 stretch-card transparent">
                    <div class="card card-light-danger" style="background: #FEE2C5;color: white; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="mb-2"><i class="mdi  mdi-file-pdf"></i>Fichier PDF</h5>
                            <h3 class="mb-2">{{ $pdf }}</h3>
                            <p>(pdf...)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-4 stretch-card transparent">
                    <div class="card card-tale" style="background: #C4DDFF;color: white; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="mb-2"><i class="mdi mdi-file-word"></i>Fichier Word</h5>
                            <h3 class="mb-2">{{ $word }}</h3>
                            <p>(doc, docx...)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-4 stretch-card transparent">
                    <div class="card card-tale" style="background: #7FB5FF;color: white; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="mb-2"><i class="mdi mdi-file-excel"></i>Fichier Excel</h5>
                            <h3 class="mb-2">{{ $excel }}</h3>
                            <p>(csv, xlx, xls...)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-4 stretch-card transparent">
                    <div class="card card-tale" style="background: #001D6E;color: white; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="mb-2"><i class="mdi  mdi-file-document"></i> Fichier texte</h5>
                            <h3 class="mb-2">{{ $txt }}</h3>
                            <p>(txt...)</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm mb-4 stretch-card transparent">
                    <div class="card card-tale" style="background: #FEE2C5;color: white; border-radius: 20px;">
                        <div class="card-body">
                            <h5 class="mb-2"><i class="mdi   mdi-package-variant-closed"></i> Total</h5>
                            <h3 class="mb-2">{{ $total }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card ">
                        <div class="card-body justify-content-center">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h2 class="font-weight-bold mb-4 justify-content-center">Rechercher</h2>
                            </div>

                            <form class="forms-sample" method="GET" action="{{ route('search') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="doc" class="form-control"
                                            placeholder="Rechercher par nom de document" aria-label="Recipient's username">
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="text" name="tag" class="form-control"
                                            placeholder="Rechercher par mots clés" aria-label="Recipient's username">
                                        <div class="input-group-append">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="typeDoc" id="exampleSelectGender">
                                        <option selected disabled>Type de fichier</option>
                                        <option value="image">Image</option>
                                        <option value="video">Vidéo</option>
                                        <option value="pdf">PDF</option>
                                        <option value="word">Word</option>
                                        <option value="excel">Excel</option>
                                        <option value="txt">Fichier texte</option>
                                    </select>
                                </div>
                                <div class="form-group justify-content-center">
                                    <button type="submit" class="btn btn-primary mb-2 float-right">Rechercher</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <p class="card-description">

                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>

                                            </th>
                                            <th>
                                                Designation
                                            </th>
                                            <th>
                                                Arabe designation
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach ($folders as $folder)
                                        @if (empty($folder->folder_id))
                                            <tbody>
                                                <tr onclick="document.location='{{ route('folders.tri', $folder->id) }}'"
                                                        style="cursor:pointer;">
                                                    <td class="py-1">
                                                        <img src="../../images/folder.png"
                                                            style="border-radius: 0%; cursor: pointer;" alt="image" />
                                                    </td>
                                                    <td>
                                                        {{ $folder->designation }}
                                                    </td>
                                                    <td>
                                                        {{ $folder->designationar }}
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
        <!-- content-wrapper ends -->

    </div>
    <!-- main-panel ends -->
@endsection
