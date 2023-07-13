@extends('back-end.layouts.app')
@section('backContent')
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    {{-- <h2 class="pageheader-title">Data Tables</h2>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p> --}}
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Listes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Liste des inscriptions</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Liste des inscriptions</h5>
                    <div class="col-md-4 offset-md-7">
                        <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Ajouter d'une inscription
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Année scolaire</th>
                                        <th>Filière</th>
                                        <th>etudiant</th>





                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inscriptions as $inscription)
                                        <tr>
                                            <td>{{ $inscription->id }}</td>
                                            <td>{{ $inscription->annneScolaire->nom }}</td>
                                            <td>{{ $inscription->filliere->nom }}</td>
                                            <td>{{ $inscription->etudiant->nom }}</td>



                                            <td>



                                                <a href="{{ route('admin.inscription.show', [($id = $inscription->id)]) }}">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        data-toggle="modal">
                                                        <i class="fa fa-eye"></i> Modifier

                                                    </button>
                                                </a>

                                                <button type="button" onclick="deleteData({{ $inscription->id }})"
                                                    class="btn btn-danger btn-sm waves-effect waves-light"
                                                    data-toggle="modal" data-target="#modalConfirmDeletes">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>

                                            </td>

                                        </tr>
                                    @endforeach



                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Id</th>
                                        <th>Année scolaire</th>
                                        <th>Filière</th>
                                        <th>etudiant</th>

                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {!! $inscriptions->withQueryString()->links('pagination::bootstrap-5') !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>


    </div>
    <!-- Modal d'ajout -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout Inscription</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.inscription.create') }}">

                        @csrf

                        <label for="exampleFormControlSelect1">Annee scolaire</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="annee_scolaire_id" required>
                            <option>choisir</option>
                            @foreach ($anneeScolaires as $anneeScolaire)
                                <option value="{{ $anneeScolaire->id }}">{{ $anneeScolaire->nom }}</option>
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Etudiant</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="etudiant_id" required>
                            <option>choisir</option>
                            @foreach ($etudiants as $etudiant)
                                <option value="{{ $etudiant->id }}">{{ $etudiant->nom . ' ' . $etudiant->prenom }}
                                </option>
                            @endforeach

                        </select>

                        <label for="exampleFormControlSelect1">Filliere</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="filliere_id"
                            style="margin-bottom: 10px">
                            <option>choisir</option>
                            @foreach ($fillieres as $filliere)
                                <option value="{{ $filliere->id }}">{{ $filliere->nom }}</option>
                            @endforeach

                        </select>



                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>

    </div>


    <!--Modal: modalConfirmDelete-->
    <div class="modal fade" id="modalConfirmDeletes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
            <!--Content-->
            <div class="modal-content text-center">
                <!--Header-->
                <div class="modal-header d-flex justify-content-center">
                    <p class="heading">Vous êtes sûr de supprimer cet projet ?</p>
                </div>

                <!--Body-->
                <div class="modal-body">

                    <i class="fas fa-times fa-4x animated rotateIn"></i>

                </div>

                <!--Footer-->
                <div class="modal-footer flex-center">
                    <form method="GET" id="deleteForm" action="">

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-outline-danger">Oui</button>
                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Non</button>
                    </form>

                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: modalConfirmDelete-->
    <script>
        function deleteData(id) {
            var id = id;
            var url = '{{ route('admin.inscription.delete', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
