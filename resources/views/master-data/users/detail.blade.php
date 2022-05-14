@extends('layouts.main')
@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
@endpush
@section('content')
@component('component.form')
    @slot('action', '#')
    @isset ($data['detail'])
        @slot('method','PUT')
    @else
        @slot('method','POST')
    @endisset
    @slot('content')
    <div class="form-group mb-3">
        <label class="required">Nama</label>
        <input disabled style="background-color: #e5e5e5;" value="{{ !isset($data['detail']) ? old('name') : old('name', $data['detail']->name) }}" type="text"  class="form-control mb-2" />
    </div>
    <div class="form-group mb-3">
        <label class="required">Email</label>
        <input disabled style="background-color: #e5e5e5;" value="{{ !isset($data['detail']) ? old('email') : old('email', $data['detail']->email) }}" type="text" class="form-control mb-2" />
    </div>
    <div class="form-group mb-3">
        <label class="required">Roles</label>
        <input disabled style="background-color: #e5e5e5;" value="{{ !isset($user_role) ? '' : $user_role->name }}" type="text" class="form-control mb-2" />
    </div>
    <div class="form-group mb-3">
        <label class="required">QR Login</label>
        @php $accounts = json_encode([ 'email' => $data['detail']->email, 'password' => $data['detail']->qr_code ]); @endphp
        <div class="row mb-2">
            <div class="col-12" id="image-qr">
                {!! QrCode::size(300)->generate($accounts); !!}
            </div>
            <div class="col mt-3">
                <button type="button" style="width: 300px;" id="save-qr" class="btn btn-block btn-sm btn-success waves-effect waves-light">
                    <i class="fas fa-cloud-download-alt"></i>
                    Download QR Code
                </button>
            </div>
            <canvas style="display: none;" id="canvas-image-qr"></canvas>
        </div>
    </div>
    @endslot
@endcomponent
@endsection
@push('script')
<script>
var div = document.getElementById('image-qr');
svg = div.querySelector('svg');
document.getElementById('save-qr').addEventListener('click', function () {
    var canvas = document.getElementById('canvas-image-qr');
    svg.setAttribute('width', 300);
    svg.setAttribute('height', 300);
    canvas.width = 300;
    canvas.height = 300;
    var data = new XMLSerializer().serializeToString(svg);
    var win = window.URL || window.webkitURL || window;
    var img = new Image();
    img.style = 'border: 3px solid #FFF';
    var blob = new Blob([data], { type: 'image/svg+xml' });
    var url = win.createObjectURL(blob);
    img.onload = function () {
        canvas.getContext('2d').drawImage(img, 0, 0);
        win.revokeObjectURL(url);
        var uri = canvas.toDataURL('image/png').replace('image/png', 'octet/stream');
        var a = document.createElement('a');
        document.body.appendChild(a);
        a.style = 'display: none';
        a.href = uri
        a.download = ('login-qr') + '.png';
        a.click();
        window.URL.revokeObjectURL(uri);
        document.body.removeChild(a);
    };
    // console.log(img);
    img.src = url;
});
</script>
@endpush
