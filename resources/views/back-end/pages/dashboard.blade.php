@extends('back-end.layouts.app')
@section('backContent')
    <!-- pageheader  -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">School Dashboard </h2>

                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">school Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

   {{-- <div class="ecommerce-widget">

        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Total Etablissement</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1"></h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                        </div>
                    </div>
                    <div id="sparkline-revenue"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Total Etudiants</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1"></h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            <span><i class="fa fa-fw fa-arrow-up"></i></span><span>5.86%</span>
                        </div>
                    </div>
                    <div id="sparkline-revenue2"></div>
                </div>
            </div>--}}
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body">
                            <h5 class="text-muted">Etablissements</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{$etablissements->count()}}</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="card border-3 border-top border-top-primary">
                        <div class="card-body">
                            <h5 class="text-muted">Etudiants</h5>
                            <div class="metric-value d-inline-block">
                                <h1 class="mb-1">{{$etudiants->count()}}</h1>
                            </div>
                            <div class="metric-label d-inline-block float-right text-success font-weight-bold">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Etablissemnts </h5>
                    <div class="card-body">
                        <div class="ct-chart " style="height: 354px;"></div>

                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Etudiants</h5>
                    <div class="card-body">
                        <div class="ct-chart2" style="height: 354px;"></div>

                    </div>
                </div>
            </div>
            </div>
            {{-- <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Refunds</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">0.00</h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-primary font-weight-bold">
                            <span>N/A</span>
                        </div>
                    </div>
                    <div id="sparkline-revenue3"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="text-muted">Avg. Revenue Per User</h5>
                        <div class="metric-value d-inline-block">
                            <h1 class="mb-1">$28000</h1>
                        </div>
                        <div class="metric-label d-inline-block float-right text-secondary font-weight-bold">
                            <span>-2.00%</span>
                        </div>
                    </div>
                    <div id="sparkline-revenue4"></div>
                </div>
            </div> --}}
        </div>
        <!-- end pageheader  -->
        <script>
            var _labels = JSON.parse('{!! json_encode($etablissementMonth) !!}');
            var _labels2 = JSON.parse('{!! json_encode($etudiantMonth) !!}');
            var _data_etablissements = JSON.parse('{!! json_encode($etablissementCount) !!}');
            var _data_etudiants = JSON.parse('{!! json_encode($etudiantCount) !!}');
        </script>


    @endsection
