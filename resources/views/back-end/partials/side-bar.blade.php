<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>

                    {{--  <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-2">Parametre</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">


                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.categorie.index') }}">Categorie</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.sousCategorie.index') }}">Sous
                                        Categorie</a>
                                </li>



                            </ul>
                        </div>
                    </li> --}}



                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.categorie.index') }}">Categories</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.typeEtablissement.index') }}">Type etablissement</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.zone.index') }}">Zone</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.etablissement.index') }}">Etablissement</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.filiere.index') }}">Filière</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.anneeScolaire.index') }}">Année scolaire</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.classe.index') }}">Classe</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.etudiant.index') }}"> Etudiant</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.inscription.index') }}"> Incription</a>
                    </li>



                    <!--  <li class="nav-divider">
                        Features
                    </li> -->




                </ul>
            </div>
        </nav>
    </div>
</div>
