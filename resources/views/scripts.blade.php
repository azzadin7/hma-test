<script>
    function confirmDelete(id)
    {
        Swal.fire({
            title: 'Konfirmasi Hapus User',
            text: 'Apakah anda yakin untuk menghapus user berikut?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Submit deletion form request
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>