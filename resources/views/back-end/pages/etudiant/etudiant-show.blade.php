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
                                <li class="breadcrumb-item active" aria-current="page">Modifier etudiant</li>
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

                    <form method="POST" action="{{ route('admin.etudiant.update', $id = $etudiant->id) }}">

                        @csrf
                        <div class="form-group  ">

                            <label for="debut">Nom </label>
                            <input type="text" class="form-control" id="debut" placeholder="nom" name="nom"
                                required value="{{ $etudiant->nom }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Prenom</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="prenom"
                                placeholder="Prenom" value="{{ $etudiant->prenom }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Sexe</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="sexe"
                                placeholder="Sexe" value="{{ $etudiant->sexe }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Date de naissance</label>
                            <input type="date" class="form-control" id="datepicker" name="date_naissance"
                                value="{{ $etudiant->date_naissance }}">

                        </div>



                        <div class="form-group">
                            <label for="exampleInputPassword1">Lieu de naissance</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required
                                name="lieu_naissance" placeholder="Lieu naissance" value="{{ $etudiant->lieu_naissance }}">
                        </div>



                        <div class="form-group">
                            <label for="debut">Adresse</label>
                            <input type="text" class="form-control" id="debut" placeholder="Adresse" name="adresse"
                                value="{{ $etudiant->adresse }}">
                        </div>



                        <div class="form-group">
                            <label for="exampleInputPassword1">Contact</label>
                            <input type="text" class="form-control" id="exampleInputPassword1" required name="contact"
                                placeholder="Contact" value="{{ $etudiant->contact }}">
                        </div>


                        <div class="col-sm-6 pl-0">
                            <p class="text-right">
                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                <button class="btn btn-space btn-secondary">Cancel</button>
                            </p>
                        </div>
                    </form>



                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end basic form -->
        <!-- ============================================================== -->
    @endsection
