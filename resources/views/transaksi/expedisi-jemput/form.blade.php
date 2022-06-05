@extends('layouts.main')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
@endpush
@section('content')
@component('component.form')
    @slot('action', !isset($data['detail']) ? route('top-up.store') : route('top-up.update'))
    @isset ($data['detail'])
        @slot('method','PUT')
    @else
        @slot('method','POST')
    @endisset
    @slot('content')
    <h3>Informasi Penjemputan</h3>

    <div class="form-group mb-3">
        <label class="required">Nama</label>
        <input type="hidden" value="{{ !isset($data['detail']) ? '' : $data['detail'][0]->id }}" name="id">
        <input type="hidden" value="{{ !isset($data['detail']) ? '' : $data['detail'][0]->id }}" name="permintaan_laundry_id">
        <input value="{{ !isset($data['detail']) ? old('nama') : old('nama', $data['detail'][0]->name) }}" type="text" name="nama" class="form-control mb-2 @error('nama') is-invalid @enderror" placeholder="nama" autocomplete="off" />
    </div>

    <div class="form-group mb-3">
        <label class="required">Alamat</label>
        <input value="{{ !isset($data['detail']) ? old('alamat') : old('alamat', $data['detail'][0]->alamat) }}" type="text" name="alamat" class="form-control flatpickr-input active mb-2 @error('alamat') is-invalid @enderror" placeholder="alamat" id="basic-datepicker">
    </div>

    <div class="form-group mb-3">
        <label class="required">Tanggal</label>
        <input value="{{ !isset($data['detail']) ? old('tanggal') : old('tanggal', $data['detail'][0]->tanggal) }}" type="text" name="tanggal" class="form-control flatpickr-input active mb-2 @error('tanggal') is-invalid @enderror" placeholder="tanggal" id="basic-datepicker">
    </div>

    <div class="form-group mb-3">
        <label class="required">Waktu</label>
        <input value="{{ !isset($data['detail']) ? old('waktu') : old('waktu', $data['detail'][0]->waktu) }}" type="text" name="waktu" class="form-control flatpickr-input active mb-2 @error('waktu') is-invalid @enderror" placeholder="waktu" id="basic-datepicker">
    </div>

    <div class="form-group mb-3">
        <label class="required">Member</label>
        <div class="input-group">
            <input value="{{ !isset($data['detail']) ? old('member_id') : old('member_id', $data['detail'][0]->member_id) }}" type="hidden" name="member_id" id="member_id" class="form-control mb-2 @error('member_id') is-invalid @enderror" placeholder="member_id" autocomplete="off"/>
            <input value="{{ !isset($data['detail']) ? old('nama') : old('nama', $data['detail'][0]->name) }}" type="text" name="nama" id="nama" class="form-control mb-2 @error('nama') is-invalid @enderror" placeholder="nama" autocomplete="off" readonly>
            <div class="input-group-append">
                <button class="btn btn-dark waves-effect waves-light mb-2" type="button" data-toggle="modal" onclick="ambil_member()"> Cari Member</button>
            </div>
            @if($errors->has('nama'))
                <div class="text-danger"> {{ $errors->first('nama')}} </div>
            @endif
        </div>
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
