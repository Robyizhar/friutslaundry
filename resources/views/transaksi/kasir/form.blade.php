@extends('layouts.main')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
<style>

</style>
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
                                        <form method="POST" enctype="multipart/form-data" action="{{ route('kasir.store') }}">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12">
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
                                                        <label class="col-md-3 col-form-label" for="show-member">Pilih Member</label>
                                                        <div class="col-md-4">
                                                            <button type="button" id="show-member" class="btn btn-secondary" data-toggle="modal" data-target="#modal-member"><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </div>
                                                    {{-- <div class="form-group row mb-3 pilih_layanan">
                                                        <label class="col-md-3 col-form-label" for="show-layanan">Pilih Layanan</label>
                                                        <div class="col-md-4">
                                                            <button type="button" id="show-layanan" class="btn btn-secondary" data-toggle="modal" data-target="#modal-layanan"><i class="fas fa-search"></i></button>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="nama">Nama</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control data-pelanggan" id="nama" name="nama">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="alamat">Alamat</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control data-pelanggan" id="alamat" name="alamat">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="no_handphone">No Handphone</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control data-pelanggan" id="no_handphone" name="no_handphone">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row mb-3">
                                                        <label class="col-md-3 col-form-label" for="parfume">Parfume</label>
                                                        <div class="col-md-9">
                                                            <input type="text" class="form-control" id="parfume" name="parfume">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="table-responsive-md">
                                                        <table class="table activate-select dt-responsive nowrap w-100 table-bordered" id="table-data-layanan">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center" width="15%">Nama Layanan</th>
                                                                    <th class="text-center" width="15%">Harga Satuan</th>
                                                                    <th class="text-center">Quantity Satuan</th>
                                                                    <th class="text-center">Quantity KG</th>
                                                                    <th class="text-center">Special Treatment</th>
                                                                    <th class="text-center">Quantity Special Treatment</th>
                                                                    <th class="text-center">Harga Special Treatment</th>
                                                                    <th class="text-center" width="15%">Total</th>
                                                                    <th class="text-center action-buton" width="4%">Aksi</th>
                                                                </tr>
                                                            </thead>
                                                        </table>

                                                        <table class="table activate-select dt-responsive nowrap w-100" id="table-data-layanan-subtotal">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="text-right" width="15%">Sub Total</th>
                                                                    <th class="text-right" width="15%">Rp. <span class="sub_layanan_harga_satuan">0</span></th>
                                                                    <th class="text-right"><span class="sub_layanan_qty_satuan">0</span></th>
                                                                    <th class="text-right"><span class="sub_layanan_qty_kg">0</span></th>
                                                                    <th class="text-right"></th>
                                                                    <th class="text-right"><span class="sub_special_teatment_qty_satuan">0</span></th>
                                                                    <th class="text-right"><span class="sub_special_teatment_qty_harga">0</span></th>
                                                                    <th class="text-right" width="15%"><span class="sub_all_qty_harga">0</span></th>
                                                                    <th class="text-right action-buton" width="4%">
                                                                        {{-- <a class='btn btn-sm btn-success' type='button'><i class="fas fa-circle-notch"></i></a> --}}
                                                                    </th>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div style="float: left;" class="row">
                                                <div class="col sm 3">
                                                    <button type="button" class="btn btn-dark btn-square triggerLayanan">Tambah Layanan</button>
                                                </div>
                                            </div>
                                            <div style="float: right;" class="row mt-5">
                                                <ul class="list-inline wizard mb-0">
                                                    <li class="next list-inline-item float-right">
                                                        <button type="submit" class="btn btn-secondary">Cetak Struk</button>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
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
<table class="template-layanan-selected" style="display: none;">
    <tr class="template-layanan-selected-list" childidx="0" style="position: relative;">
        <td class="text-left" width="15%">
            <span class="show-layanan layanan_nama_label"  style="cursor: pointer;">
                Pilih Layanan
                <i class="fas fa-search"></i>
            </span>
			<input data-toggle="modal" readonly required class="form-control text-left show-layanan layanan_nama" type="hidden" name="layanan[0][nama]" autocomplete="off" />
        </td>
		<td class="text-left" width="15%">
            <span class="layanan_harga_label">
            </span>
			<input data-toggle="modal" readonly class="form-control text-left show-layanan layanan_harga" type="hidden" name="layanan[0][harga]" autocomplete="off" />
        </td>
		<td class="text-center">
			<input class="form-control text-left layanan_qty_satuan" disabled style="background-color: #cfcece;" type="text" name="layanan[0][qty_satuan]" autocomplete="off" onkeypress="return isNumber(event)" />
        </td>
		<td class="text-center">
			<input class="form-control text-left layanan_qty_kg" disabled style="background-color: #cfcece;" type="text" name="layanan[0][qty_kg]" autocomplete="off" onkeypress="return isNumber(event)" />
        </td>
		<td class="text-center">
			<input class="form-control text-left layanan_special_treatment" disabled style="background-color: #cfcece;" type="text" name="layanan[0][special_treatment]" autocomplete="off" />
        </td>
		<td class="text-center">
			<input class="form-control text-left layanan_qty_special_treatment" disabled style="background-color: #cfcece;" type="text" name="layanan[0][qty_special_treatment]" autocomplete="off" onkeypress="return isNumber(event)" />
        </td>
        <td class="text-center">
			<input class="form-control text-left layanan_harga_special_treatment" disabled style="background-color: #cfcece;" type="text" name="layanan[0][harga_special_treatment]" autocomplete="off" onkeypress="return isNumber(event)" />
        </td>
        <td class="text-left" width="15%">
            <span class="layanan_total_label">
            </span>
			<input data-toggle="modal" readonly class="form-control text-left show-layanan layanan_total" type="hidden" name="layanan[0][total]" autocomplete="off" />
        </td>
        <td class="action-buton" width="4%">
            <a class='btn btn-sm btn-danger removelayanan' type='button'><i class="fas fa-trash-alt"></i></a>
			<input class="data-id" type="hidden" autocomplete="off" />
        </td>
    </tr>
</table>
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
                                <table id="state-saving-datatable" style="cursor:pointer" class="table activate-select dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="45%">Nama</th>
                                            <th width="44%">No Telepon</th>
                                            <th width="5%">Pilih</th>
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
<div id="modal-layanan" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabelLayanan" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabelLayanan">List Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" class="index_row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="state-saving-datatable-layanan" style="cursor:pointer" class="table activate-select dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="44%">Kode</th>
                                            <th width="45%">Nama</th>
                                            <th width="45%">Harga</th>
                                            <th width="5%">Pilih</th>
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

    const isNumber = (evt) => {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }

    const numberFormater = (params) => {
        let number_value = Number(params).toLocaleString('en', {
            maximumFractionDigits: 2,
            minimumFractionDigits: 2,
            currency: 'INR'
        });
        return number_value;
    }

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
                $(".data-pelanggan").prop('readonly', true);
                $(".data-pelanggan").css('background-color', '#cfcece');
                $(".data-pelanggan").css('cursor', 'no-drop');
            } else {
                $('.pilih_member').css("display", "none");
                $(".data-pelanggan").prop('readonly', false);
                $(".data-pelanggan").css('background-color', '#fff');
                $(".data-pelanggan").css('cursor', 'auto');
            }
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
                    {
                        mRender: function(data, type, row, meta) {
                            if (row.phone == '' || row.phone == 0) {
                                return '-';
                            } else {
                                let phone = '0' + row.phone;
                                return row.phone;
                            }
                        }
                    },
                    {
                        mRender: function(data, type, row, meta) {
                            let action_button = '<div>';
                            action_button += '<input type="radio" name="radio" class="radio1" value="'+row.user.name+'" data-phone="'+row.phone+'" data-address="'+row.address+'">';
                            action_button += ' </div>';
                            return action_button;
                        }
                    },
                ]
            });
        });

        var member_table = $('#state-saving-datatable').DataTable();

        $('#state-saving-datatable tbody').on( 'click', 'tr', function () {
            var row = $(this);
            row.find('.input[type="radio"]').attr('checked', 'checked');
            let name = row.find('input[type="radio"]').val();
            let phone = row.find('input[type="radio"]').data('phone');
            let address = row.find('input[type="radio"]').data('address');
            $('#nama').val(name)
            $('#no_handphone').val(phone)
            $('#alamat').val(address)
            $('#modal-member').modal('hide');
        });

        $(document).on('click', '.show-layanan', function (e) {
            e.preventDefault();
            let kategori_layanan = $('.selectized').val();
            if(kategori_layanan == ''){
                $('#modal-layanan').modal('hide');
                Swal.fire("Warning!", "Silahkan Pilih Kategori Layanan.", "warning");
                return false;
            }
            let index_row = $(this).parent().parent().attr('childidx');
            let table = $('#state-saving-datatable-layanan').DataTable();
            table.destroy();
            $('#modal-layanan').modal('show');
            $('.index_row').val(index_row)
            $('#state-saving-datatable-layanan').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                method: "POST",
                scrollX: true,
                // bDestroy: true,
                ajax: {
                    url: "{!! route('kasir.get-data-layanan') !!}",
                    type: "POST",
                    dataType: "JSON",
                    data: ({
                        kategori: kategori_layanan
                    })
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'kode', name: 'kode'},
                    {data: 'nama', name: 'nama'},
                    {
                        mRender: function(data, type, row, meta) {
                            if (row.harga == '' || row.harga == 0) {
                                return '-';
                            } else {
                                let harga = 'Rp. ' + row.harga;
                                return harga;
                            }
                        }
                    },
                    {
                        mRender: function(data, type, row, meta) {
                            let action_button = '<div>';
                            action_button += '<input type="radio" name="radio" class="radio1" value="'+row.kode+'" data-nama="'+row.nama+'" data-harga="'+row.harga+'"  data-harga_member="'+row.harga_member+'">';
                            action_button += ' </div>';
                            return action_button;
                        }
                    },
                ]
            });

        });

        $('#state-saving-datatable-layanan tbody').on( 'click', 'tr', function () {
            var row = $(this);
            row.find('.input[type="radio"]').attr('checked', 'checked');
            let kode = row.find('input[type="radio"]').val();
            let nama = row.find('input[type="radio"]').data('nama');
            let harga = row.find('input[type="radio"]').data('harga');
            let index_row = $('.index_row').val();
            let this_row = $(document).find(`.layanan-selected-list[childidx=${index_row}]`);
            this_row.find(".form-control").prop('disabled', false);
            this_row.find(".form-control").css('background-color', '#FFF');
            this_row.find('.layanan_nama_label').html(nama);
            let harga_label = numberFormater(parseInt(harga));
            this_row.find('.layanan_harga_label').html('Rp. '+harga_label);
            this_row.find('.layanan_nama').val(nama);
            this_row.find('.layanan_harga').val(harga);

            let sum = 0;
            $(document).find(".layanan_harga").each(function(){
                sum += +$(this).val();
            });
            sum = numberFormater(sum);
            $(".sub_layanan_harga_satuan").html(sum);

            let sum_total = 0;
            $(document).find(".layanan_total").each(function(){
                sum_total += +$(this).val();
            });
            sum_total = numberFormater(sum_total);
            $(".sub_all_qty_harga").html(sum_total);

            let table = $('#state-saving-datatable-layanan').DataTable();
            table.destroy();
            $('#modal-layanan').modal('hide');
        });

        $(document).on('keyup', '.layanan_qty_kg', function (e) {
            if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
            }
            let this_row = $(this).parent().parent();
            let harga = this_row.find('.layanan_harga').val() || 0;
            let layanan_qty_special_treatment = this_row.find('.layanan_qty_special_treatment').val() || 0;
            let layanan_harga_special_treatment = this_row.find('.layanan_harga_special_treatment').val() || 0;
            let total_special_treatment = parseInt(layanan_qty_special_treatment) * parseInt(layanan_harga_special_treatment) || 0;
            let quantity = $(this).val() || 0;
            if (layanan_harga_special_treatment >= 0 && quantity >= 0 && layanan_qty_special_treatment >= 0) {
                let total_harga = parseInt(harga) * parseInt(quantity);
                let sub_total_harga_this_row = parseInt(total_harga) + parseInt(total_special_treatment) || 0;

                let sub_total_harga_this_row_label = numberFormater(parseInt(sub_total_harga_this_row));
                this_row.find('.layanan_total_label').html('Rp. '+sub_total_harga_this_row_label);
                this_row.find('.layanan_total').val(sub_total_harga_this_row);

                let sum = 0;
                $(document).find(".layanan_qty_kg").each(function(){
                    sum += +$(this).val();
                });
                $(".sub_layanan_qty_kg").html(sum);

                let sum_total = 0;
                $(document).find(".layanan_total").each(function(){
                    sum_total += +$(this).val();
                });
                sum_total = numberFormater(sum_total);
                $(".sub_all_qty_harga").html(sum_total);
            }
        });

        $(document).on('keyup', '.layanan_qty_satuan', function (e) {
            if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
            }
            let this_row = $(this).parent().parent();
            let harga = this_row.find('.layanan_harga').val() || 0;
            let layanan_qty_special_treatment = this_row.find('.layanan_qty_special_treatment').val() || 0;
            let layanan_harga_special_treatment = this_row.find('.layanan_harga_special_treatment').val() || 0;
            let total_special_treatment = parseInt(layanan_qty_special_treatment) * parseInt(layanan_harga_special_treatment) || 0;
            let quantity = $(this).val() || 0;
            if (layanan_harga_special_treatment >= 0 && quantity >= 0 && layanan_qty_special_treatment >= 0) {
                let total_harga = parseInt(harga) * parseInt(quantity);
                let sub_total_harga_this_row = parseInt(total_harga) + parseInt(total_special_treatment) || 0;

                let sub_total_harga_this_row_label = numberFormater(parseInt(sub_total_harga_this_row));
                this_row.find('.layanan_total_label').html('Rp. '+sub_total_harga_this_row_label);
                this_row.find('.layanan_total').val(sub_total_harga_this_row);

                let sum = 0;
                $(document).find(".layanan_qty_satuan").each(function(){
                    sum += +$(this).val();
                });
                $(".sub_layanan_qty_satuan").html(sum);

                let sum_total = 0;
                $(document).find(".layanan_total").each(function(){
                    sum_total += +$(this).val();
                });
                sum_total = numberFormater(sum_total);
                $(".sub_all_qty_harga").html(sum_total);
            }
        });

        $(document).on('keyup', '.layanan_qty_special_treatment', function (e) {
            if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
            }
            let this_row = $(this).parent().parent();

            let harga = this_row.find('.layanan_harga').val() || 0;
            let quantity = this_row.find('.layanan_qty_satuan').val() || 0;

            let layanan_qty_special_treatment = this_row.find('.layanan_qty_special_treatment').val() || 0;
            let layanan_harga_special_treatment = this_row.find('.layanan_harga_special_treatment').val() || 0;
            let total_special_treatment = parseInt(layanan_qty_special_treatment) * parseInt(layanan_harga_special_treatment) || 0;

            if (layanan_harga_special_treatment >= 0 && quantity >= 0 && layanan_qty_special_treatment >= 0) {
                let total_harga = parseInt(harga) * parseInt(quantity);
                let sub_total_harga_this_row = parseInt(total_harga) + parseInt(total_special_treatment) || 0;

                let sub_total_harga_this_row_label = numberFormater(parseInt(sub_total_harga_this_row));
                this_row.find('.layanan_total_label').html('Rp. '+sub_total_harga_this_row_label);
                this_row.find('.layanan_total').val(sub_total_harga_this_row);

                let sum = 0;
                $(document).find(".layanan_qty_special_treatment").each(function(){
                    sum += +$(this).val();
                });
                $(".sub_special_teatment_qty_satuan").html(sum);

                let sum_total = 0;
                $(document).find(".layanan_total").each(function(){
                    sum_total += +$(this).val();
                });
                sum_total = numberFormater(sum_total);
                $(".sub_all_qty_harga").html(sum_total);
            }
        });

        $(document).on('keyup', '.layanan_harga_special_treatment', function (e) {
            if (/^0/.test(this.value)) {
                this.value = this.value.replace(/^0/, "")
            }
            let this_row = $(this).parent().parent();

            let harga = this_row.find('.layanan_harga').val() || 0;
            let quantity = this_row.find('.layanan_qty_satuan').val() || 0;

            let layanan_qty_special_treatment = this_row.find('.layanan_qty_special_treatment').val() || 0;
            let layanan_harga_special_treatment = this_row.find('.layanan_harga_special_treatment').val() || 0;
            let total_special_treatment = parseInt(layanan_qty_special_treatment) * parseInt(layanan_harga_special_treatment) || 0;

            if (layanan_harga_special_treatment >= 0 && quantity >= 0 && layanan_qty_special_treatment >= 0) {
                let total_harga = parseInt(harga) * parseInt(quantity);
                let sub_total_harga_this_row = parseInt(total_harga) + parseInt(total_special_treatment) || 0;

                let sub_total_harga_this_row_label = numberFormater(parseInt(sub_total_harga_this_row));
                this_row.find('.layanan_total_label').html('Rp. '+sub_total_harga_this_row_label);
                this_row.find('.layanan_total').val(sub_total_harga_this_row);

                let sum = 0;
                $(document).find(".layanan_harga_special_treatment").each(function(){
                    sum += +$(this).val();
                });

                let sum_total = 0;
                $(document).find(".layanan_total").each(function(){
                    sum_total += +$(this).val();
                });
                sum_total = numberFormater(sum_total);
                $(".sub_all_qty_harga").html(sum_total);

                sum = numberFormater(sum);
                $(".sub_special_teatment_qty_harga").html(sum);
            }
        });

        $('.triggerLayanan').on('click', function () {
            getLayanan();
        });

        function getLayanan() {
            var tr_clone = $(".template-layanan-selected-list").clone();
            tr_clone.removeClass('template-layanan-selected-list');
            tr_clone.addClass('layanan-selected-list');
            $("#table-data-layanan").append(tr_clone);
            renderDataLayanan();
        }
        // layanan_nama
        function renderDataLayanan (){
            var index = 0;
            $(".layanan-selected-list").each(function () {
                var another = this;
                search_index = $(this).attr("childidx");
                $(this).find('input,select').each(function () {
                    this.name = this.name.replace('[' + search_index + ']', '[' + index + ']');
                    $(another).attr("childidx", index);
                });
                $(this).find('span').each(function () {
                    this.id = this.id.replace('[' + search_index + ']', '[' + index + ']');
                    $(another).attr("childidx", index);
                });
                index++;
            });
        }
        $(document).on('click', '.removelayanan', function (e) {
            e.preventDefault();
            let this_row = $(this).parent().parent();
            Swal.fire({
                title: 'Hapus data ini ?',
                text: "Anda tidak akan dapat memulihkan data ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus!'
                }).then((result) => {
                if (result.isConfirmed) {
                    this_row.remove();
                    Swal.fire("Berhasil!", "Berhasil dihapus.", "success");
                    renderDataLayanan();
                }
            })
        });

    });
</script>
@endpush
