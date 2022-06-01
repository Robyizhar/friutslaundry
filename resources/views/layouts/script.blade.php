<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js')}}"></script>

<!-- Plugins css -->
<link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css" />
<!-- <link href="{{ asset('assets/libs/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet" type="text/css" /> -->
<link href="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Plugins js-->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{ asset('assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<script src="{{ asset('assets/libs/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

<!-- Init js-->
<script src="{{ asset('assets/js/pages/form-pickers.init.js')}}"></script>

<!-- App js-->
<script src="{{ asset('assets/js/app.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.14/dist/sweetalert2.all.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@include('sweetalert::alert')
@stack('script')
<script>
    $(document).ready(function () {
        $(document).on('click', '.btn-delete', function(e){
            e.preventDefault();
            let detele_url = $(this).attr("href");
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
                    $.ajax({
                        type: "GET",
                        url: detele_url,
                        success: function (response) {
                            if (response == 'false') {
                                Swal.fire( 'Berhasil!', 'Data tidak dapat dihapus.', 'error' );
                            } else {
                                $('#state-saving-datatable').DataTable().ajax.reload();
                                Swal.fire( 'Berhasil!', 'Data berhail dihapus.', 'success' );
                            }
                        }
                    });
                }
            })
        });
    });
</script>
