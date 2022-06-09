@extends('layouts.main')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
@endpush
@section('content')
@component('component.form')
    @slot('action', !isset($data['detail']) ? route('expedisi-jemput.store') : route('expedisi-jemput.store'))
    @isset ($data['detail'])
        @slot('method','POST')
    @else
        @slot('method','POST')
    @endisset
    @slot('content')
    <h3>detailrmasi Penjemputan</h3>

    <div class="form-group mb-3">
        <label class="required">Nama</label>
        <input type="hidden" value="{{ !isset($data['detail']) ? '' : $data['detail'][0]->expedisi_jemput_id }}" name="id">
        <input type="hidden" value="{{ !isset($data['detail']) ? '' : $data['detail'][0]->id }}" name="permintaan_laundry_id">
        <input value="{{ !isset($data['detail']) ? old('nama') : old('nama', $data['detail'][0]->name) }}" type="text" name="nama" class="form-control mb-2 @error('nama') is-invalid @enderror" placeholder="nama" autocomplete="off" readonly>
    </div>

    <div class="form-group mb-3">
        <label class="required">Alamat</label>
        <input value="{{ !isset($data['detail']) ? old('alamat') : old('alamat', $data['detail'][0]->alamat) }}" type="text" name="alamat" class="form-control flatpickr-input active mb-2 @error('alamat') is-invalid @enderror" placeholder="alamat" id="basic-datepicker" readonly>
    </div>

    <div class="form-group mb-3">
        <label class="required">Tanggal</label>
        <input value="{{ !isset($data['detail']) ? old('tanggal') : old('tanggal', $data['detail'][0]->tanggal) }}" type="text" name="tanggal" class="form-control flatpickr-input active mb-2 @error('tanggal') is-invalid @enderror" placeholder="tanggal" readonly>
    </div>

    <div class="form-group mb-3">
        <label class="required">Waktu</label>
        <input value="{{ !isset($data['detail']) ? old('waktu') : old('waktu', $data['detail'][0]->waktu) }}" type="text" name="waktu" class="form-control flatpickr-input active mb-2 @error('waktu') is-invalid @enderror" placeholder="waktu" readonly>
    </div>

    <h3>&nbsp;</h3>
    <h3>Catatan Expedisi</h3>
    <h3>&nbsp;</h3>

    <div class="form-group mb-3">
        <label class="required">Titip Saldo</label>
        <input value="{{ !isset($data['detail']) ? old('titip_saldo') : old('titip_saldo', $data['detail'][0]->titip_saldo) }}" type="text" name="titip_saldo" class="form-control flatpickr-input active mb-2 @error('titip_saldo') is-invalid @enderror" placeholder="titip saldo">
        <input value="{{ !isset($data['detail']) ? old('image') : old('image', $data['detail'][0]->image) }}" type="hidden" name="image" class="form-control flatpickr-input active mb-2 @error('image') is-invalid @enderror" placeholder="image">
    </div>
    
    <div class="form-group mb-3">
        <label class="required">Catatan</label>
        <textarea value="" type="text" name="catatan" class="form-control mb-2">
        {{ !isset($data['detail']) ? old('catatan') : old('catatan', $data['detail'][0]->catatan) }}
        </textarea>
        @if($errors->has('catatan'))
            <div class="text-danger"> {{ $errors->first('catatan')}} </div>
        @endif
    </div>


<div class="modal fade" id="modal-member" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Data Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-hover" id="state-saving-datatable" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

    @endslot
@endcomponent
@endsection
@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script>
    function ambil_member(){
        $('#modal-member').modal('show');
            $("#state-saving-datatable").DataTable().destroy(); 
            $('#state-saving-datatable tbody').remove(); 
            $('#state-saving-datatable').DataTable({
                responsive: true,
                processing: true,
                "lengthMenu": [[5, 10], [5, 10]],
                "language": {
                    "lengthMenu": "_MENU_"
                },
                serverSide: true,
                method: "POST",
                scrollX: true,
                ajax: {
                    url: "{!! route('top-up.get-data-member') !!}",
                    type: "POST",
                    dataType: "JSON"
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'address', name: 'address'}
                ]
            });

        var datatable = $('#state-saving-datatable').DataTable();

        $('#state-saving-datatable tbody').on('click', 'tr', function () {
            var data = datatable.row(this).data();
            $("#member_id").val(data.id);
            $("#nama").val(data.name);
            
            $('#modal-member').modal('hide');   
        });           
    }
</script>
@endpush
