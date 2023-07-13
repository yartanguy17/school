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
                                <li class="breadcrumb-item active" aria-current="page">Liste des etablissement</li>
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
                    <h5 class="card-header">Liste des etablissements</h5>
                    <div class="col-md-4 offset-md-7">
                        <button type="button" class="btn btn-primary btn-block mb-3" data-toggle="modal"
                            data-target="#exampleModal">
                            Ajouter etablissement
                        </button>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">id</th>
                                        <th style="text-align: center">Nom</th>
                                        <th style="text-align: center">Fondacteur</th>
                                        <th style="text-align: center">Telephone</th>
                                        <th style="text-align: center">Adresse</th>
                                        <th style="text-align: center">Type etablissement</th>
                                        <th style="text-align: center">Zones</th>
                                        <th style="text-align: center">Categories</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($etablissements as $etablissement)
                                        <tr>
                                            <td style="text-align: center">{{ $etablissement->id }}</td>
                                            <td style="text-align: center">{{ $etablissement->nom }}</td>
                                            <td style="text-align: center">{{ $etablissement->fondateur }}</td>
                                            <td style="text-align: center">{{ $etablissement->telephone }}</td>
                                            <td style="text-align: center">{{ $etablissement->adresse }}</td>
                                            <td style="text-align: center">{{ $etablissement->type_etablissement->nom }}
                                            </td>
                                            <td style="text-align: center">{{ $etablissement->zone->nom }}</td>
                                            <td style="text-align: center">{{ $etablissement->categorie->nom }}</td>
                                            <td style="text-align: center">
                                                <button type="button" onclick="deleteData({{ $etablissement->id }})"
                                                    class="btn btn-danger btn-sm waves-effect waves-light"
                                                    data-toggle="modal" data-target="#modalConfirmDeletes">
                                                    <i class="fa fa-trash"></i> Supprimer
                                                </button>
                                                <a
                                                    href="{{ route('admin.etablissement.show', [($id = $etablissement->id)]) }}">
                                                    <button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        data-toggle="modal">
                                                        <i class="fa fa-eye"></i> Modifier

                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th style="text-align: center">id</th>
                                        <th style="text-align: center">Nom</th>
                                        <th style="text-align: center">Fondacteur</th>
                                        <th style="text-align: center">Telephone</th>
                                        <th style="text-align: center">Adresse</th>
                                        <th style="text-align: center">Type etablissement</th>
                                        <th style="text-align: center">Zones</th>
                                        <th style="text-align: center">Categories</th>
                                        <th style="text-align: center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                            {!! $etablissements->withQueryString()->links('pagination::bootstrap-5') !!}

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
                    <h5 class="modal-title" id="exampleModalLabel">Ajout etablissement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.etablissement.create') }}" enctype="multipart/form-data">

                        @csrf

                        <div class="form-group">
                            <input type="text" id="" name="id" value="0" hidden>
                            <label for="exampleInputPassword1">Nom</label>
                            <input type="text" class="form-control" id="" required
                                name="nom"placeholder="Nom ">
                            <label for="exampleInputPassword1">Numero manuel</label>
                            <input type="text" class="form-control" id="" required
                                name="numero_manuel"placeholder="Numero nanuel ">
                            <label for="exampleInputPassword1">Fondateur</label>
                            <input type="text" class="form-control" id="" required
                                name="fondateur"placeholder="fondateur ">
                            <label for="exampleInputPassword1">telephone</label>
                            <input type="text" class="form-control" id="" required
                                name="telephone"placeholder="telephone ">
                            <label for="exampleInputPassword1">Adresse</label>
                            <input type="text" class="form-control" id="" required
                                name="adresse"placeholder="adresse ">


                            <label for="exampleInputPassword1">Type etablissement</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="type_etablissement_id"
                                required>
                                <option>choisir</option>
                                @foreach ($type_etablissements as $type_etablissement)
                                    <option value=" {{ $type_etablissement->id }}">{{ $type_etablissement->nom }}
                                    </option>
                                @endforeach

                            </select>



                            <label for="exampleInputPassword1">Zones</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="zones_id" id=""
                                required>
                                <option>choisir</option>
                                @foreach ($zones as $zone)
                                    <option value=" {{ $zone->id }}">{{ $zone->nom }}</option>
                                @endforeach
                            </select>

                            <label for="exampleInputPassword1">Categories</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="categories_id"
                                id="" required>
                                <option>choisir</option>
                                @foreach ($categories as $categorie)
                                    <option value=" {{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                        </div>

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
                    <p class="heading">Vous êtes sûr de supprimer cet etablissement ?</p>
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
            var url = '{{ route('admin.etablissement.delete', ':id') }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
@endsection
