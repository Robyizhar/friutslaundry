@extends('layouts.main')
@section('content')
<meta http-equiv="refresh" content="60">
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <!-- <div class="page-title-right">
                            <form class="form-inline">
                                <div class="form-group">
                                    <div class="input-group input-group-sm">
                                        <input type="text" class="form-control border" id="dash-daterange">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-blue border-blue text-white">
                                                <i class="mdi mdi-calendar-range"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-2">
                                    <i class="mdi mdi-autorenew"></i>
                                </a>
                                <a href="javascript: void(0);" class="btn btn-blue btn-sm ml-1">
                                    <i class="mdi mdi-filter-variant"></i>
                                </a>
                            </form>
                        </div> -->
                        <br>
                        <h4 class="text-center">CASH FLOW & LALU LINTAS BARANG</h4>
                        <h4 class="text-center">HARI SENIN 30 AGUSTUS 2022</h4>
                        <h4 class="text-center">&nbsp;</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Total Kiloan</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">250 Kg</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Total Satuan</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">506 Pcs</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Harga Cucian</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">Rp 4.125.600</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Total Nota Masuk</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">55 Nota</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Total Nota Keluar</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">45 Nota</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Harga Bayar</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">Rp 4.125.600</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Proses Registrasi</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">22 Nota</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Proses Cuci</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">19 Nota</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Proses Pengeringan</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">16 Nota</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Proses Setrika</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">22 Nota</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Antar</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">19 Titik</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

                <div class="col-lg-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-header bg-info py-3 text-white">
                            <div class="card-widgets">
                                <!-- <a href="#" data-toggle="remove"><i class="mdi mdi-close"></i></a> -->
                            </div>
                            <h4 class="card-title mb-0 text-center text-white">Jemput</h4>
                        </div>
                        <div id="cardCollpase7" class="collapse show">
                            <div class="card-body">
                                <h4 class="text-info text-center">16 Titik</h4>
                            </div>
                        </div>
                    </div> <!-- end card-->
                </div>

            </div><!-- end row-->


        </div>

    </div>

</div>
@endsection
@push('script')
<!-- Dashboar 1 init js-->
<!-- <script src="{{ asset('assets/js/pages/dashboard-1.init.js')}}"></script> -->
@endpush
