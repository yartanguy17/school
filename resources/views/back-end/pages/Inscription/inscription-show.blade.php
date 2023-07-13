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
                                <li class="breadcrumb-item active" aria-current="page">Modifier inscription</li>
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

                    <form method="POST" action="{{ route('admin.inscription.update', $id = $inscription->id) }}">

                        @csrf

                        <label for="exampleFormControlSelect1">Annee scolaire</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="annee_scolaire_id" required>
                            <option>choisir</option>
                            @foreach ($anneeScolaires as $anneeScolaire)
                                @if ($inscription->annee_scolaire_id == $anneeScolaire->id)
                                    <option value="{{ $anneeScolaire->id }}" selected>{{ $anneeScolaire->nom }}</option>
                                @else
                                    <option value="{{ $anneeScolaire->id }}">{{ $anneeScolaire->nom }}</option>
                                @endif
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Etudiant</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="etudiant_id" required>
                            <option>choisir</option>
                            @foreach ($etudiants as $etudiant)
                                @if ($inscription->etudiant_id == $etudiant->id)
                                    <option value="{{ $etudiant->id }}" selected>
                                        {{ $etudiant->nom . ' ' . $etudiant->prenom }}
                                    </option>
                                @else
                                    <option value="{{ $etudiant->id }}">{{ $etudiant->nom . ' ' . $etudiant->prenom }}
                                    </option>
                                @endif
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Filliere</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="filliere_id"
                            style="margin-bottom: 10px">
                            <option>choisir</option>
                            @foreach ($fillieres as $filliere)
                                @if ($inscription->filliere_id == $filliere->id)
                                    <option value="{{ $filliere->id }}" selected>{{ $filliere->nom }}</option>
                                @else
                                    <option value="{{ $filliere->id }}">{{ $filliere->nom }}</option>
                                @endif
                            @endforeach

                        </select>

                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button class="btn btn-space btn-secondary">Cancel</button>
                    </form>



                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic form -->
        <!-- ============================================================== -->
    @endsection
