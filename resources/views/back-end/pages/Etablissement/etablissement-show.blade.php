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
                                <li class="breadcrumb-item active" aria-current="page">Modifier etablissement</li>
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
                <h5 class="card-header">Etablissement</h5>
                <div class="card-body">
                    <form action="{{ route('admin.etablissement.update', $id = $etablissement->id) }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="inputUserName">Nom</label>
                            <input id="inputUserName" type="text" name="nom" data-parsley-trigger="change"
                                required="" placeholder="Nom" autocomplete="off" class="form-control"
                                value="{{ $etablissement->nom }}">
                        </div>

                        <div class="form-group">
                            <label for="inputUserName">Numero namuel</label>
                            <input id="inputUserName" type="text" name="numero_namuel" data-parsley-trigger="change"
                                required="" placeholder="Numero manuel" autocomplete="off" class="form-control"
                                value="{{ $etablissement->numero_manuel }}">
                        </div>

                        <div class="form-group">
                            <label for="inputUserName">Fondateur</label>
                            <input id="inputUserName" type="text" name="fondateur" data-parsley-trigger="change"
                                required="" placeholder="Fondacteur" autocomplete="off" class="form-control"
                                value="{{ $etablissement->fondateur }}">
                        </div>

                        <div class="form-group">
                            <label for="inputUserName">Telephone</label>
                            <input id="inputUserName" type="text" name="telephone" data-parsley-trigger="change"
                                required="" placeholder="Telephone" autocomplete="off" class="form-control"
                                value="{{ $etablissement->telephone }}">
                        </div>

                        <div class="form-group">
                            <label for="inputUserName">Addresse</label>
                            <input id="inputUserName" type="text" name="adresse" data-parsley-trigger="change"
                                required="" placeholder="Adresse" autocomplete="off" class="form-control"
                                value="{{ $etablissement->adresse }}">
                        </div>

                        <label for="exampleFormControlSelect1">Zone</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="zones_id" required>

                            @foreach ($zones as $zone)
                                @if ($etablissement->zones_id == $zone->id)
                                    <option value="{{ $zone->id }}" selected>{{ $zone->nom }}</option>
                                @else
                                    <option value="{{ $zone->id }}">{{ $zone->nom }}</option>
                                @endif
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Categorie</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="categories_id" required>

                            @foreach ($categories as $categorie)
                                @if ($etablissement->categories_id == $categorie->id)
                                    <option value="{{ $categorie->id }}" selected>{{ $categorie->nom }}</option>
                                @else
                                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endif
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Type etablisssement</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="type_etablissement_id" required>

                            @foreach ($type_etablissements as $type_etablissement)
                                @if ($etablissement->type_etablissements_id == $type_etablissement->id)
                                    <option value="{{ $type_etablissement->id }}" selected>{{ $type_etablissement->nom }}
                                    </option>
                                @else
                                    <option value="{{ $type_etablissement->id }}">{{ $type_etablissement->nom }}</option>
                                @endif
                            @endforeach

                        </select>

                        <div class="col-sm-6 pl-0" style="margin-top: 10px">
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
