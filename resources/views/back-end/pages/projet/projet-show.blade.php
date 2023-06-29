@extends('back-end.layouts.app')
@section('backContent')
    <div class="row">
        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <div class="card-header p-4">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mx-auto d-block">
                                <h2 class="mb-0"> PROJET</h2>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-sm-6">
                            <h3 class="mb-3">Titre</h3>
                            <p>{{ $projet->titre }}</p>
                            <h3 class="mb-3">Debut Projet </h3>
                            <p>{{ $projet->debut }}</p>
                            <h3 class="text-dark mb-1">Type prestation </h3>
                            <p>{{ $projet->type_prestation }}</p>
                            <h3 class="text-dark mb-1">Description </h3>
                            <p> {{ $projet->description }}</p>
                            <h3 class="text-dark mb-1">Lieu </h3>
                            <p> {{ $projet->lieu }}</p>
                            <h3 class="text-dark mb-1">Categorie </h3>
                            <p> {{ $projet->categorie_id }}</p>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </div>
    </div>
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    @include('back-end.partials.footer')
    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
    </div>
@endsection
