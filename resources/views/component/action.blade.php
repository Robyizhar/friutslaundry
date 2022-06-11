<div class="text-center">
    @if (isset($url_detail))
        <a href="{{ $url_detail }}" class="btn btn-sm btn-info btn-rounded waves-effect waves-light" title="Info">
            <i class="fas fa-exclamation-circle"></i>
        </a>
    @endif
    @if (isset($url_edit))
        <a href="{{ $url_edit }}" class="btn btn-sm btn-warning btn-rounded waves-effect waves-light" title="Edit">
            <i class="fas fa-align-left"></i>
        </a>
    @endif
    @if (isset($url_destroy))
        <a href="{{ $url_destroy }}" class="btn btn-sm btn-danger btn-delete btn-rounded waves-effect waves-light" title="Hapus">
            <i class="fas fa-trash"></i>
        </a>
    @endif
</div>
<div class="text-left get-action">
    @if (isset($valid))
        <a href="#" data-id="{{ $valid }}" class="btn btn-sm btn-success waves-effect waves-light valid" title="Valid">
            <i class="far fa-check-circle"></i>
        </a>
    @endif
    @if (isset($invalid))
        <a href="#" data-id="{{ $valid }}" class="btn btn-sm btn-danger waves-effect waves-light invalid" title="Invalid">
            <i class="far fa-times-circle"></i>
        </a>
    @endif
    @if (isset($input_satuan))
        <input type="text" class="form-control quantity_satuan" style="padding: 0;" name="quantity_qc" autocomplete="off" onkeypress="return isNumber(event)">
    @endif
    @if (isset($input_kg))
        <input class="form-control text-left quantity_kg" style="padding: 0;" step=".01" maxlength="9" type="number" name="quantity_kg" autocomplete="off" />
    @endif
</div>
