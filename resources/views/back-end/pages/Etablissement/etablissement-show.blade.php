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
                            <input id="inputUserName" type="text" name="nom" data-parsley-trigger="change"
                                required="" placeholder="Fondacteur" autocomplete="off" class="form-control"
                                value="{{ $etablissement->fondateur }}">
                            <input id="inputUserName" type="text" name="nom" data-parsley-trigger="change"
                                required="" placeholder="Telephone" autocomplete="off" class="form-control"
                                value="{{ $etablissement->telephone }}">
                            <input id="inputUserName" type="text" name="nom" data-parsley-trigger="change"
                                required="" placeholder="Adresse" autocomplete="off" class="form-control"
                                value="{{ $etablissement->adresse }}">
                        </div>
                    
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
