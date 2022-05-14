<!-- Vendor js -->
<script src="{{ asset('assets/js/vendor.min.js')}}"></script>

<!-- Plugins js-->
<script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js')}}"></script>

<script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js')}}"></script>

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
