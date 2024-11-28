<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $(document).on('click', '#delete', function(e) {
            var id = $(this).attr("data-id");
            $('#idsertiff').val(id);
        });

        $(document).on('click', '#edit', function(e) {
            var id = $(this).attr("data-id");
            var nama = $(this).attr("data-nama");
            var no = $(this).attr("data-no");
            var terbit = $(this).attr("data-terbit");
            var kadaluwarsa = $(this).attr('data-kadaluwarsa');
            var instansi = $(this).attr('data-instansi');
            var jenis = $(this).attr('data-jenis');
            var dokumen = $(this).attr('data-dokumen');
            var keterangan = $(this).attr('data-keterangan');
            var user = $(this).attr('data-user');
            $('#id').val(id);
            $('#namae').val(nama);
            $('#no').val(no);
            $('#tgl_t').val(terbit);
            $('#tgl_k').val(kadaluwarsa);
            $('#instansii').val(instansi);
            $('#jenis').val(jenis);
            $('#dokumenn').val(dokumen);
            $('#ayam').val(keterangan);
            $('#useridd').val(user);
        });
    </script>

<script>
    window.addEventListener('DOMContentLoaded', event => {
        // Simple-DataTables
        // https://github.com/fiduswriter/Simple-DataTables/wiki


        new simpleDatatables.DataTable('#datatablesSimple', {
            searchable: true,
            paging: true,
        });

        // const datatablesSimple = document.getElementById('datatablesSimple');
        // if (datatablesSimple) {
        //     new simpleDatatables.DataTable(datatablesSimple);
        // }
    });
</script>
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables/datatables-simple-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
<sb-customizer project="sb-admin-pro"></sb-customizer>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8c5e4dc4fc620499","version":"2024.8.0","serverTiming":{"name":{"cfExtPri":true,"cfL4":true}},"token":"6e2c2575ac8f44ed824cef7899ba8463","b":1}' crossorigin="anonymous"></script>
