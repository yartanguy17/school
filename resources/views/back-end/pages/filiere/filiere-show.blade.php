@extends('back-end.layouts.app')
@section('backContent')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    {{-- <h2 class="pageheader-title">Data Tables</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> --}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Modifier</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Modifier filiere</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- basic table  -->
        <!-- ============================================================== -->

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <!-- ============================================================== -->
        <!-- basic form -->
        <!-- ============================================================== -->
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Basic Form</h5>
                <div class="card-body">
                    <form action="{{ route('admin.filiere.update', $id = $filiere->id) }}" method="POST">
                        @csrf
                        <label for="exampleInputPassword1">Etablissement</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="etablissement_id" required>
                            <option>choisir</option>
                            @foreach ($etablissements as $etablissement)
                                @if ($filiere->etablissement_id == $etablissement->id)
                                    <option value=" {{ $etablissement->id }}" selected>{{ $etablissement->nom }}
                                    </option>
                                @else
                                    <option value=" {{ $etablissement->id }}">{{ $etablissement->nom }}
                                    </option>
                                @endif
                            @endforeach

                        </select>

                        <div class="form-group">
                            <input type="text" id="" name="id" value="0" hidden>
                            <label for="exampleInputPassword1">Nom</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="nom"
                                placeholder="Nom " value="{{ $filiere->nom }}">
                        </div>


                        {{-- <div class="form-group">
                            <label for="inputImage">Ajouter une image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputImage"
                                        aria-describedby="inputImageAddon" name="image_path"
                                        value="{{ $categorie->image_path }}">
                                    <label class="custom-file-label" for="inputImage">Choisir un fichier</label>
                                </div>

                            </div>
                        </div> --}}


                        <div class="col-sm-6 pl-0">
                            <p class="text-right">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <button class="btn btn-space btn-secondary">Cancel</button>
                            </p>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end basic form -->
    <!-- ============================================================== -->
@endsection
