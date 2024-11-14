@extends('template.main')
@section('konten')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
   <div class="container-fluid px-4">
      <div class="page-header-content">
         <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
               <h1 class="page-header-title">
                  <div class="page-header-icon"><i data-feather="folder"></i></div>
                  Daftar Sertifikat SNI Award
               </h1>
            </div>
            <div class="col-12 col-xl-auto mb-3">
               {{-- <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
               <i class="me-1" data-feather="users"></i>
               Manage Groups
               </a> --}}
               <a class="btn btn-sm btn-light text-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahModal">
               <i class="me-1" data-feather="folder-plus"></i>
               Tambah Data
               </a>
            </div>
         </div>
      </div>
   </div>
</header>
<!-- Main page content-->
<div class="container-fluid px-4">
    <div class="card">
       <div class="card-body">
          @include('template.tabel')
       </div>
    </div>
 </div>


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
            $('#ids').val(id);
            $('#namas').val(nama);
            $('#nos').val(no);
            $('#tglt').val(terbit);
            $('#tglk').val(kadaluwarsa);
            $('#instansis').val(instansi);
            $('#jenis').val(jenis);
            $('#dokumens').val(dokumen);
        });
    </script>

@endsection
