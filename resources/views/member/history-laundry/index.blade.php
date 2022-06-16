@extends('layouts.main_user')
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
                    <a href="{{ route('history-laundry.create') }}" class="btn btn-primary waves-effect waves-light mb-3">Add</a>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="state-saving-datatable" class="table activate-select dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>Alamat</th>
                                        <th>Parfume</th>
                                        <th width="10%">Aksi</th>
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
@endsection
@push('script')
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
<script>
    $(document).ready( function () {
        let datatable = $('#state-saving-datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            method: "POST",
            scrollX: true,
            ajax: {
                url: "{!! route('history-laundry.get-data') !!}",
                type: "POST",
                dataType: "JSON"
            },
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'waktu', name: 'waktu'},
                {data: 'alamat', name: 'alamat'},
                {data: 'nama_parfume', name: 'nama_parfume'},
                {data: 'action', name: 'action'}
            ]
        });
    });
</script>

<script>
    function like(id){
        $.ajax({
            type:'POST',
            url: "{!! route('history-laundry.store') !!}",
            data: ({ 
                    id : id,
                    status : 'like'          
                   }),
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {$("#input-modal").modal('hide');
                var oTable = $('#state-saving-datatable').dataTable();
                oTable.fnDraw(false);
            },
            error: function(data){
            console.log(data);
            }
        });
    } 

    function dislike(id){
        alert(id);
    } 

</script>
@endpush
