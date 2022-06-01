@extends('layouts.main')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
@endpush
@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            @include('component.breadcrumb')
            <div class="row">
                <div class="col-12">
                    {{-- <a href="{{ route('harga.create') }}" class="btn btn-primary waves-effect waves-light mb-3">Add</a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3"> Basic Wizard</h4>
                            <div id="basicwizard">
                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-4">
                                    <li class="nav-item">
                                        <a href="#barang_masuk" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" style="border: 1px solid #c9c1c1;">
                                            <i class="fas fa-sign-in-alt"></i>
                                            <span class="d-none d-sm-inline">Barang Masuk</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#barang_keluar" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2" style="border: 1px solid #c9c1c1;">
                                            <i class="fas fa-sign-out-alt"></i>
                                            <span class="d-none d-sm-inline">Barang Keluar</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content b-0 mb-0 pt-0">
                                    <div class="tab-pane" id="barang_masuk">
                                        <div class="row">
                                            <div class="col-12">
                                                <form method="POST" enctype="multipart/form-data" action="{{ route('kasir.store') }}">
                                                    @csrf
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label">Kategori Layanan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" name="kategori" id="selectize-tags" tabindex="-1" class="selectized" style="display: none;">
                                                            <div class="selectize-control multi">
                                                                <div class="selectize-input items not-full has-options has-items">
                                                                    <div class="item" data-value="reguler">REG</div>
                                                                    <div class="item" data-value="express">EXPRESS</div>
                                                                    <div class="item" data-value="super_express">SUPER EXPRESS</div>
                                                                    <input type="text" autocomplete="off" tabindex="" id="selectize-tags-selectized" style="width: 4px; opacity: 0; position: absolute; left: -10000px;"></div>
                                                                    <div class="selectize-dropdown multi" style="display: none;"><div class="selectize-dropdown-content"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label">Kategori Pelanggan</label>
                                                        <div class="col-md-9">
                                                            <input type="text" id="selectize-pelanggan" tabindex="-1" class="selectized" style="display: none;">
                                                            <div class="selectize-control multi">
                                                                <div class="selectize-input items not-full has-options has-items">
                                                                    <div class="item-pelanggan" data-value="non_member">NON MEMBER</div>
                                                                    <div class="item-pelanggan" data-value="member">MEMBER</div>
                                                                    {{-- <div class="item-pelanggan" data-value="khusus">KHUSUS</div> --}}
                                                                    <input type="text" autocomplete="off" tabindex="" id="selectize-pelanggan-selectized" style="width: 4px; opacity: 0; position: absolute; left: -10000px;"></div>
                                                                    <div class="selectize-dropdown multi" style="display: none;"><div class="selectize-dropdown-content"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3 pilih_member" style="display: none;">
                                                        <label class="col-md-3 col-form-label" for="pilih_member">Pilih Member</label>
                                                        <div class="col-md-4">
                                                            <button type="button" id="show-member" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-search"></i></button>
                                                            {{-- <input type="text" class="form-control" id="pilih_member" name="pilih_member" value="Coderthemes"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="nama">Nama</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="nama" name="nama" value="Coderthemes">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="alamat">Alamat</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="alamat" name="alamat" value="Coderthemes">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="no_handphone">No Handphone</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="no_handphone" name="no_handphone" value="Coderthemes">
                                                        </div>
                                                    </div>
                                                    <ul class="list-inline wizard mb-0">
                                                        <li class="next list-inline-item float-right">
                                                            <button type="submit" class="btn btn-secondary">Cetak Struk</button>
                                                        </li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="barang_keluar">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="name"> First name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="name" name="name" class="form-control" value="Francis">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="surname"> Last name</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="surname" name="surname" class="form-control" value="Brinkman">
                                                    </div>
                                                </div>
                                                <div class="form-group row mb-3">
                                                    <label class="col-md-3 col-form-label" for="email">Email</label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="email" name="email" class="form-control" value="cory1979@hotmail.com">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-member" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">List Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th width="10%">Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script>
    $(document).ready(function () {

        $('.item').click(function (e) {
            e.preventDefault();
            let value = $(this).data('value');
            $('.item').not(this).each(function(){
                $(this).css("background-color", "#edeff1");
            });
            $(this).css("background-color", "#6c757d");
            $('#selectize-tags').val(value);
        });

        $('.item-pelanggan').click(function (e) {
            e.preventDefault();
            let value = $(this).data('value');
            $('.item-pelanggan').not(this).each(function(){
                $(this).css("background-color", "#edeff1");
            });
            $(this).css("background-color", "#6c757d");
            $('#selectize-pelanggan').val(value);
            if (value == 'member') {
                $('.pilih_member').css("display", "flex");
            } else {
                $('.pilih_member').css("display", "none");
            }
            // console.log(value);
        });

        $('#show-member').click(function (e) {
            e.preventDefault();
            $('#state-saving-datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                method: "POST",
                scrollX: true,
                bDestroy: true,
                ajax: {
                    url: "{!! route('user-member.get-data') !!}",
                    type: "POST",
                    dataType: "JSON"
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'user.name', name: 'user.name'},
                    {data: 'user.email', name: 'user.email'},
                    {
                        mRender: function(data, type, row, meta) {
                            let action_button = '<div class="text-center">';
                            action_button += '<input type="radio" name="radio" id="radio1" value="option1" checked="">';
                            action_button += ' </div>';
                            return action_button;
                        }
                    },
                ]
            });
            $('#state-saving-datatable').find('tbody').find('tr').css("cursor", "pointer");
        });



    });
</script>
{{-- <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script> --}}
{{-- <script src="{{ asset('assets/js/pages/dashboard-1.init.js')}}"></script> --}}
@endpush
