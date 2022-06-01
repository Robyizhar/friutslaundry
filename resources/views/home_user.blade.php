@extends('layouts.main_user')
@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <!-- <form class="form-inline">
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
                            </form> -->
                        </div>
                        <h4 class="page-title">Halaman Utama</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-12 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/money.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate"><u>Total Saldo</u></p>
                                    <h2 class="mt-1">Rp <span data-plugin="counterup">58.947</span></h2>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/order.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">&nbsp;</p>
                                    <h3 class="mt-1">Buat Permintaan<br>Laundry</h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/clock.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">&nbsp;</p>
                                    <h3 class="mt-1">History Pemesanan</h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box" data-toggle="modal" data-target="#right-modal">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/pickup.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">Status Pengerjaan :</p>
                                    <h4 class="mt-1">Dalam Proses Penjemputan</h4>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box" data-toggle="modal" data-target="#right-modal">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/qc.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">Status Transaksi</p>
                                    <h4 class="mt-1">Dalam Proses QC</h4>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box" data-toggle="modal" data-target="#right-modal">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/cuci.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">Status Transaksi</p>
                                    <h4 class="mt-1">Dalam Proses Cuci</h4>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box" data-toggle="modal" data-target="#right-modal">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/kering.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">Status Transaksi</p>
                                    <h4 class="mt-1">Dalam Proses Pengeringan</h4>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box" data-toggle="modal" data-target="#right-modal">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/setrika.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">Status Transaksi</p>
                                    <h4 class="mt-1">Dalam Proses Setrika</h4>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box" data-toggle="modal" data-target="#right-modal">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/packing.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">Status Transaksi</p>
                                    <h4 class="mt-1">Dalam Proses Packing</h4>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box" data-toggle="modal" data-target="#right-modal">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/antar.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">Status Transaksi</p>
                                    <h4 class="mt-1">Dalam Proses Antar</h4>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-box" data-toggle="modal" data-target="#right-modal">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/diterima.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">Status Transaksi</p>
                                    <h4 class="mt-1">Telah diterima</h4>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

            </div>
            <!-- end row-->
        </div>

    </div>

</div>

<div id="right-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <label class="mt-0">No Transaksi: </label><label class="mt-0">#VL2537</label>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                    <!-- <div class="text-center"> -->
                        <div class="track-order-list">
                            <ul class="list-unstyled">
                                <li class="completed">
                                    <h5 class="mt-0 mb-1">Proses Penjemputan</h5>
                                    <p class="text-muted">28 Mei 2022 <small class="text-muted">07:22</small> </p>
                                </li>
                                <li class="completed">
                                    <h5 class="mt-0 mb-1">Proses QC</h5>
                                    <p class="text-muted">28 Mei 2022 <small class="text-muted">12:16</small></p>
                                </li>
                                <li>
                                    <span class="active-dot dot"></span>
                                    <h5 class="mt-0 mb-1">Proses Cuci</h5>
                                    <p class="text-muted">28 Mei 2022 <small class="text-muted">14:20</small></p>
                                </li>
                                <li>
                                    <h5 class="mt-0 mb-1">Proses Pengeringan</h5>
                                    <p class="text-muted"></p>
                                </li>
                                <li>
                                    <h5 class="mt-0 mb-1"> Proses Setrika</h5>
                                    <p class="text-muted"></p>
                                </li>
                                <li>
                                    <h5 class="mt-0 mb-1"> Proses Pack</h5>
                                    <p class="text-muted"></p>
                                </li>
                                <li>
                                    <h5 class="mt-0 mb-1"> Proses Pengantaran</h5>
                                    <p class="text-muted"></p>
                                </li>
                                <li>
                                    <h5 class="mt-0 mb-1"> Selesai</h5>
                                    <p class="text-muted"></p>
                                </li>
                            </ul>

                            <div class="text-center mt-4">
                                <a href="#" class="btn btn-danger" data-dismiss="modal" >Tutup</a>
                            </div>
                            <br>
                        </div>
                    <!-- </div> -->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection

