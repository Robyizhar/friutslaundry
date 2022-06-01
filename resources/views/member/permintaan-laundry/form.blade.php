@extends('layouts.main_user')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
@endpush
@section('content')
@component('component.form')
    @slot('action', !isset($data['detail']) ? route('permintaan-laundry.store') : route('permintaan-laundry.update'))
    @isset ($data['detail'])
        @slot('method','PUT')
    @else
        @slot('method','POST')
    @endisset
    @slot('content')
    <div class="form-group mb-3">
        <label class="required">Tanggal Penjemputan</label>
        <input type="hidden" value="{{ !isset($data['detail']) ? '' : $data['detail']->id }}" name="id">
        <input type="text" value="{{ !isset($data['detail']) ? '0' : $data['detail']->member_id }}" name="member_id">
        <input value="{{ !isset($data['detail']) ? old('tanggal') : old('name', $data['detail']->tanggal) }}" type="text" name="tanggal" class="form-control flatpickr-input active mb-2 @error('tanggal') is-invalid @enderror" placeholder="tanggal penjemputan" id="basic-datepicker">
        @if($errors->has('tanggal'))
            <div class="text-danger"> {{ $errors->first('tanggal')}} </div>
        @endif
    </div>

    <div class="form-group mb-3">
        <label class="required">Waktu Penjemputan</label><label style="color:red; font-size:10px;">&nbsp;*Format 24 Jam</label>
        <input value="{{ !isset($data['detail']) ? old('waktu') : old('waktu', $data['detail']->waktu) }}" type="text" name="waktu" class="form-control clockpicker mb-2" placeholder="waktu penjemputan" data-autoclose="true">
        @if($errors->has('waktu'))
            <div class="text-danger"> {{ $errors->first('waktu')}} </div>
        @endif
    </div>
    <div class="form-group mb-3">
        <label class="required">Alamat Penjemputan</label>
        <input value="{{ !isset($data['detail']) ? old('alamat') : old('alamat', $data['detail']->alamat) }}" type="text" name="alamat" class="form-control mb-2" placeholder="alamat penjemputan" />
        @if($errors->has('alamat'))
            <div class="text-danger"> {{ $errors->first('alamat')}} </div>
        @endif
    </div>
    <div class="form-group mb-3">
        <label class="required">Catatan</label>
        <textarea value="{{ !isset($data['detail']) ? old('catatan') : old('catatan', $data['detail']->catatan) }}" type="text" name="catatan" class="form-control mb-2">
        @if($errors->has('catatan'))
            <div class="text-danger"> {{ $errors->first('catatan')}} </div>
        @endif
        </textarea>
    </div>
    @endslot
@endcomponent
@endsection
@push('script')
<script>

</script>
@endpush
