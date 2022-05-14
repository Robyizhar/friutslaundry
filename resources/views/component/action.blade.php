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

