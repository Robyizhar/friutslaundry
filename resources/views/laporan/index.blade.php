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
                        <h4 class="text-center">LAPORAN</h4>
                        <h4 class="text-center">&nbsp;</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                
                <a class="col-md-4 col-xl-3" href="{{ route('laporan-outlet') }}">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/outlet.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">&nbsp;</p>
                                    <h3 class="mt-1">OUTLET</h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </a> <!-- end col-->

                <a class="col-md-4 col-xl-3" href="{{ route('laporan') }}">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-4">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/expedisi.png" width="100%" height="100%" alt="user-img" />
                                </div><br>
                                <div class="text-center">
                                    <p class="text-muted mb-1 text-truncate">&nbsp;</p><br>
                                    <h3 class="mt-1">EXPEDISI</h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </a> <!-- end col-->

                <a class="col-md-4 col-xl-3" href="{{ route('laporan-member') }}">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/member.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">&nbsp;</p>
                                    <h3 class="mt-1">REKAP MEMBER</h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </a> <!-- end col-->

                <a class="col-md-6 col-xl-3" href="{{ route('laporan') }}">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/frenchaise.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">&nbsp;</p>
                                    <h3 class="mt-1">REKAP FRENCHAISE</h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </a> <!-- end col-->

                <a class="col-md-6 col-xl-3" href="{{ route('laporan') }}">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/agen.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">&nbsp;</p>
                                    <h3 class="mt-1">REKAP MITRA AGEN</h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </a> <!-- end col-->

                <a class="col-md-6 col-xl-3" href="{{ route('laporan') }}">
                    <div class="widget-rounded-circle card-box">
                        <div class="row">
                            <div class="col-6">
                                <div class="text-right">
                                    <img src="../assets/images/laundry/absen.png" style="height:150px;" alt="user-img" />
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="text-left">
                                    <p class="text-muted mb-1 text-truncate">&nbsp;</p>
                                    <h3 class="mt-1">REKAP ABSEN</h3>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end widget-rounded-circle-->
                </a> <!-- end col-->

            </div><!-- end row-->


        </div>

    </div>

</div>
@endsection
@push('script')
<!-- Dashboar 1 init js-->
<script src="{{ asset('assets/js/pages/dashboard-1.init.js')}}"></script>
@endpush
