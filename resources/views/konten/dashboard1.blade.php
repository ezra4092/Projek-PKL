@extends('template.main')
@section('konten')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
   <div class="container-fluid px-4">
      <div class="page-header-content">
         <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
               <h1 class="page-header-title">
                  <div class="page-header-icon"><i data-feather="award"></i></div>
                  Daftar Sertifikat
               </h1>
            </div>
            <div class="col-12 col-xl-auto mb-3">
               {{-- <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
               <i class="me-1" data-feather="users"></i>
               Manage Groups
               </a> --}}
               <a class="btn btn-sm btn-light text-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahData">
               <i class="me-1" data-feather="plus"></i>
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
         <table id="datatablesSimple" class="table table-striped">
            <thead>
               <tr>
                  <th width="2%">No.</th>
                  <th>Nama Sertifikat</th>
                  <th>Nomor Sertifikat</th>
                  <th>Tanggal Terbit</th>
                  <th>Tanggal Kadaluwarsa</th>
                  <th>Instansi Yang Mengeluarkan</th>
                  <th>Jenis</th>
                  <th>Dokumen</th>
                  <th>Aksi</th>
               </tr>
            </thead>

            <tfoot>
               <tr>
                <th width="2%">No.</th>
                <th>Nama Sertifikat</th>
                <th>Nomor Sertifikat</th>
                <th>Tanggal Terbit</th>
                <th>Tanggal Kadaluwarsa</th>
                <th>Instansi Yang Mengeluarkan</th>
                <th>Jenis</th>
                <th>Dokumen</th>
                <th>Aksi</th>
               </tr>
            </tfoot>

            <tbody>
               @php $no = 1; @endphp
               @foreach ($data as $sertif)
               <tr>
                  <td width="5%">{{$no++}}</td>
                  <td>{{$sertif->nama_sertif}}</td>
                  <td>{{$sertif->no_sertif}}</td>
                  <td>{{$sertif->tgl_terbit}}</td>
                  <td>{{$sertif->tgl_kadaluwarsa}}</td>
                  <td>{{$sertif->instansi}}</td>
                  <td>{{$sertif->jenis}}</td>
                  <td><a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="dokumen/{{$sertif->dokumen}}"  target="_blank"><i data-feather="download"></i></a></td>
                  <td>
                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" id="edit"
                    data-id='{{ $sertif->id_sertif }}'
                    data-nama='{{ $sertif->nama_sertif }}'
                    data-no='{{ $sertif->no_sertif }}'
                    data-terbit='{{ $sertif->tgl_terbit }}'
                    data-kadaluwarsa='{{ $sertif->tgl_kadaluwarsa }}'
                    data-instansi='{{ $sertif->instansi }}'
                    data-jenis='{{ $sertif->jenis }}'
                    data-dokumen='{{ $sertif->dokumen }}' data-bs-toggle="modal" data-bs-target="#editModal"><i data-feather="edit"></i></button>
                    <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark"
                        data-bs-toggle="modal" data-bs-target="#hapusModal" id="hapus"
                        data-id='{{ $sertif->id_sertif }}'><i class="fa-solid fa-trash"></i></button>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>

         {{-- Modal edit data --}}
         @foreach ($data as $sertif )
         <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Sertifikat</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                            <form class="user" action="{{ url('edit-sertif/'.$sertif->id_sertif) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id_sertif" value="{{$sertif->id_sertif}}" id="id_sertif">
                                <div class="mb-3">
                                   <label class="small mb-1" for="nama_sertif">Nama Sertifikat</label>
                                   <input class="form-control" id="nama_sertif" name="nama_sertif" type="text" placeholder="Masukkan nama sertifikat" value="{{$sertif->nama_sertif}}" />
                                </div>
                                <div class="mb-3">
                                   <label class="small mb-1" for="no_sertif">Nomor Sertifikat</label>
                                   <input class="form-control" id="no_sertif" name="no_sertif" type="text" placeholder="Masukkan nomor sertifikat" value="{{$sertif->no_sertif}}" />
                                </div>
                                <div class="mb-3">
                                   <label class="small mb-1" for="tgl_terbit">Tanggal Terbit Sertifikat</label>
                                   <input class="form-control" id="tgl_terbit" name="tgl_terbit" type="date" placeholder="Masukkan tanggal terbit sertifikat" value="{{$sertif->tgl_terbit}}" />
                                </div>
                                <div class="mb-3">
                                   <label class="small mb-1" for="tgl_kadaluwarsa">Tanggal Kadaluwarsan Sertifikat</label>
                                   <input class="form-control" id="tgl_kadaluwarsa" name="tgl_kadaluwarsa" type="date" placeholder="Masukkan tanggal kadaluwarsa sertifikat" value="{{$sertif->tgl_kadaluwarsa}}" />
                                </div>
                                <div class="mb-3">
                                   <label class="small mb-1" for="instansi">Instansi Yang Mengeluarkan</label>
                                   <input class="form-control" id="instansi" name="instansi" type="text" placeholder="Masukkan Instansi Yang Mengeluarkan" value="{{$sertif->instansi}}" />
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1">Jenis Sertifikat</label>
                                    <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                                        <option disabled {{ $sertif->jenis == null ? 'selected' : '' }}>Pilih jenis sertifikat</option>
                                        <option value="Sertifikat Umum" {{ $sertif->jenis == 'Sertifikat Umum' ? 'selected' : '' }}>Sertifikat Umum</option>
                                        <option value="Sertifikat CSR" {{ $sertif->jenis == 'Sertifikat CSR' ? 'selected' : '' }}>Sertifikat CSR</option>
                                        <option value="Penghargaan Umum" {{ $sertif->jenis == 'Penghargaan Umum' ? 'selected' : '' }}>Penghargaan Umum</option>
                                        <option value="Sertifikat ISO 9001 : 2015" {{ $sertif->jenis == 'Sertifikat ISO 9001 : 2015' ? 'selected' : '' }}>Sertifikat ISO 9001 : 2015</option>
                                        <option value="Sertifikat ISO 14001 : 2015" {{ $sertif->jenis == 'Sertifikat ISO 14001 : 2015' ? 'selected' : '' }}>Sertifikat ISO 14001 : 2015</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="small mb-1">Masukan file</label>
                                    <input class="form-control" name="dokumen" type="file" id="dokumen" >
                                 </div>
                                <!-- Submit button-->
                                <div class="d-flex justify-content-between">
                                   <button class="btn btn-primary" type="submit">Edit Data</button>
                                   <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                                </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>

         @endforeach
         {{-- Modal tambah data --}}
         <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Tambah Data Sertifikat</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form class="user" action="{{ route('tambah-sertif') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                           <label class="small mb-1" for="nama_sertif">Nama Sertifikat</label>
                           <input class="form-control" id="nama_sertif" name="nama_sertif" type="text" placeholder="Masukkan nama sertifikat" value="" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="no_sertif">Nomor Sertifikat</label>
                           <input class="form-control" id="no_sertif" name="no_sertif" type="text" placeholder="Masukkan nomor sertifikat" value="" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="tgl_terbit">Tanggal Terbit Sertifikat</label>
                           <input class="form-control" id="tgl_terbit" name="tgl_terbit" type="date" placeholder="Masukkan tanggal terbit sertifikat" value="" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="tgl_kadaluwarsa">Tanggal Kadaluwarsan Sertifikat</label>
                           <input class="form-control" id="tgl_kadaluwarsa" name="tgl_kadaluwarsa" type="date" placeholder="Masukkan tanggal kadaluwarsa sertifikat" value="" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="instansi">Instansi Yang Mengeluarkan</label>
                           <input class="form-control" id="instansi" name="instansi" type="text" placeholder="Masukkan Instansi Yang Mengeluarkan" value="" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1">Jenis Sertifikat</label>
                           <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                              <option selected="" disabled="">Pilih jenis sertifikat</option>
                              <option value="Sertifikat CSR">Sertifikat CSR</option>
                              <option value="Sertifikat HSE">Sertifikat HSE</option>
                              <option value="Penghargaan">Penghargaan</option>
                              <option value="Proper">Proper</option>
                              <option value="SWA">SWA</option>
                              <option value="SNI Award">SNI Award</option>
                              <option value="Sertifikat ISO 9001 : 2015">Sertifikat ISO 9001 : 2015</option>
                              <option value="Sertifikat ISO 14001 : 2015">Sertifikat ISO 14001 : 2015</option>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label for="formFile" class="small mb-1">Masukan file</label>
                           <input class="form-control" name="dokumen" type="file" id="dokumen">
                        </div>
                        <!-- Submit button-->
                        <div class="d-flex justify-content-between">
                           <button class="btn btn-primary" type="submit">Tambah Data</button>
                           <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                        </div>
                     </form>
                  </div>
                  {{--
                  <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save changes</button></div>
                  --}}
               </div>
            </div>
         </div>

         {{-- Modal hapus data --}}
         <div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Delete Data Sertifikat</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <p>Apakah yakin ingin menghapus data?</p>
                     <form action="{{ route('hapus-sertif') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_sertif" id="id_sertif">
                  </div>
                  <div class="modal-footer"><button class="btn btn-secondary" type="button"
                     data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-danger" type="submit">Delete</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>


    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
        $(document).on('click', '#hapus', function(e) {
            var id = $(this).attr("data-id");
            $('#id_sertif').val(id);
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
            $('#id_sertif').val(id);
            $('#nama_sertif').val(nama);
            $('#no_sertif').val(no);
            $('#tgl_terbit').val(terbit);
            $('#tgl_kadaluwarsa').val(kadaluwarsa);
            $('#instansi').val(instansi);
            $('#jenis').val(jenis);
            $('#dokumen').val(dokumen);
    });
    </script>

@endsection
