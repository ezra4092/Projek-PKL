@extends('template.main')
@section('konten')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
   <div class="container-fluid px-4">
      <div class="page-header-content">
         <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
               <h1 class="page-header-title">
                  <div class="page-header-icon"><i data-feather="user"></i></div>
                  Daftar Sertifikat CSR
               </h1>
            </div>
            <div class="col-12 col-xl-auto mb-3">
               {{-- <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
               <i class="me-1" data-feather="users"></i>
               Manage Groups
               </a> --}}
               <a class="btn btn-sm btn-light text-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahModal">
               <i class="me-1" data-feather="user-plus"></i>
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
         <table id="datatablesSimple">
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
                  <td><a class="btn btn-datatable btn-icon btn-transparent-dark me-2" href="{{ asset($sertif->dokumen) }}"  target="_blank"><i data-feather="download"></i></a></td>
                  <td>
                    <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" id="edit"
                       data-id='{{ $sertif->idsertif }}'
                       data-nama='{{ $sertif->nama_sertif }}'
                       data-no='{{ $sertif->no_sertif }}'
                       data-terbit='{{ $sertif->tgl_terbit }}'
                       data-kadaluwarsa='{{ $sertif->tgl_kadaluwarsa }}'
                       data-instansi='{{ $sertif->instansi }}'
                       data-jenis='{{ $sertif->jenis }}'
                       data-dokumen='{{ $sertif->dokumen }}' data-bs-toggle="modal" data-bs-target="#editModal"><i data-feather="edit"></i></button>
                       <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark" data-bs-toggle="modal" data-bs-target="#hapusModal" id="delete"
                       data-id='{{ $sertif->idsertif }}'><i class="fa-solid fa-trash"></i></button>

                 </td>
               </tr>
               @endforeach
            </tbody>
         </table>


         {{-- Modal tambah data --}}
         <div class="modal fade" id="tambahModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
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
                           <input class="form-control" id="nama_sertif" name="nama_sertif" type="text" placeholder="Masukkan nama sertifikat" value="" required />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="no_sertif">Nomor Sertifikat</label>
                           <input class="form-control" id="no_sertif" name="no_sertif" type="text" placeholder="Masukkan nomor sertifikat" value="" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="tgl_terbit">Tanggal Terbit Sertifikat</label>
                           <input class="form-control" id="tgl_terbit" name="tgl_terbit" type="date" placeholder="Masukkan tanggal terbit sertifikat" value="" required />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="tgl_kadaluwarsa">Tanggal Kadaluwarsan Sertifikat</label>
                           <input class="form-control" id="tgl_kadaluwarsa" name="tgl_kadaluwarsa" type="date" placeholder="Masukkan tanggal kadaluwarsa sertifikat" value="" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="instansi">Instansi Yang Mengeluarkan</label>
                           <input class="form-control" id="instansi" name="instansi" type="text" placeholder="Masukkan Instansi Yang Mengeluarkan" value="" required />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1">Jenis Sertifikat</label>
                           <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                              <option selected="" disabled="">Pilih jenis sertifikat</option>
                              <option value="Sertifikat CSR">Sertifikat CSR</option>
                              <option value="Sertifikat HSE">Sertifikat HSE</option>
                              <option value="Penghargaan">Penghargaan</option>
                              <option value="Proper">Proper</option>
                              <option value="SNI Award">SNI Award</option>
                              <option value="SWA">SWA</option>
                              <option value="ISO 9001 : 2015">ISO 9001 : 2015</option>
                              <option value="ISO 14001 : 2015">ISO 14001 : 2015</option>
                              <option value="ISO 27001 : 2015">ISO 27001 : 2015</option>
                              <option value="ISO 37001 : 2016">ISO 37001 : 2016</option>
                              <option value="ISO 17025 : 2017">ISO 17025 : 2017</option>
                              <option value="ISO 45001 : 2018">ISO 45001 : 2018</option>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label for="formFile" class="small mb-1">Masukan file</label>
                           <input class="form-control" name="dokumen" type="file" id="dokumen" required>
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
         <div class="modal fade" id="hapusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm">
               <div class="modal-content">
                  <div class="modal-header">
                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data Sertifikat</h1>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <p>Apakah yakin ingin menghapus data?</p>
                     <form action="{{route('hapus-sertif')}}" method="post">
                        @csrf
                        <input type="hidden" name="idsertif" id="idsertiff" >
                  </div>
                  <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                  <button class="btn btn-danger" type="submit">Hapus</button>
                  </div>
                  </form>
               </div>
            </div>
         </div> 

          {{-- Modal edit data --}}
         <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Data Sertifikat</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <form class="user" action="{{ route('edit-sertif') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="idsertif" id="idsertif">
                                <div class="mb-3">
                                   <label class="small mb-1" for="nama_sertif">Nama Sertifikat</label>
                                   <input class="form-control" id="nama_sertif" name="nama_sertif" type="text" placeholder="Masukkan nama sertifikat" />
                                </div>
                                <div class="mb-3">
                                   <label class="small mb-1" for="no_sertif">Nomor Sertifikat</label>
                                   <input class="form-control" id="no_sertif" name="no_sertif" type="text" placeholder="Masukkan nomor sertifikat" />
                                </div>
                                <div class="mb-3">
                                   <label class="small mb-1" for="tgl_terbit">Tanggal Terbit Sertifikat</label>
                                   <input class="form-control" id="tgl_terbit" name="tgl_terbit" type="date" placeholder="Masukkan tanggal terbit sertifikat" />
                                </div>
                                <div class="mb-3">
                                   <label class="small mb-1" for="tgl_kadaluwarsa">Tanggal Kadaluwarsan Sertifikat</label>
                                   <input class="form-control" id="tgl_kadaluwarsa" name="tgl_kadaluwarsa" type="date" placeholder="Masukkan tanggal kadaluwarsa sertifikat"  />
                                </div>
                                <div class="mb-3">
                                   <label class="small mb-1" for="instansi">Instansi Yang Mengeluarkan</label>
                                   <input class="form-control" id="instansi" name="instansi" type="text" placeholder="Masukkan Instansi Yang Mengeluarkan"/>
                                </div>
                                <div class="mb-3">
                                    <label class="small mb-1">Jenis Sertifikat</label>
                                    <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                                    <option disabled {{ $sertif->jenis == null ? 'selected' : '' }}>Pilih jenis sertifikat</option>
                                    <option value="Sertifikat CSR" {{ $sertif->jenis == 'Sertifikat CSR' ? 'selected' : '' }}>Sertifikat CSR</option>
                                    <option value="Sertifikat HSE" {{ $sertif->jenis == 'Sertifikat HSE' ? 'selected' : '' }}>Sertifikat HSE</option>
                                    <option value="Penghargaan" {{ $sertif->jenis == 'Penghargaan' ? 'selected' : '' }}>Penghargaan</option>
                                    <option value="Proper" {{ $sertif->jenis == 'Proper' ? 'selected' : '' }}>Proper</option>
                                    <option value="SNI Award" {{ $sertif->jenis == 'SNI Award' ? 'selected' : '' }}>SNI Award</option>
                                    <option value="SWA" {{ $sertif->jenis == 'SWA' ? 'selected' : '' }}>SWA</option>
                                    <option value="ISO 9001 : 2015" {{ $sertif->jenis == 'ISO 9001 : 2015' ? 'selected' : '' }}>ISO 9001 : 2015</option>
                                    <option value="ISO 14001 : 2015" {{ $sertif->jenis == 'ISO 14001 : 2015' ? 'selected' : '' }}>ISO 14001 : 2015</option>
                                    <option value="ISO 27001 : 2015" {{ $sertif->jenis == 'ISO 27001 : 2015' ? 'selected' : '' }}>ISO 27001 : 2015</option>
                                    <option value="ISO 37001 : 2016" {{ $sertif->jenis == 'ISO 37001 : 2016' ? 'selected' : '' }}>ISO 37001 : 2016</option>
                                    <option value="ISO 17025 : 2017" {{ $sertif->jenis == 'ISO 17025 : 2017' ? 'selected' : '' }}>ISO 17025 : 2017</option>
                                    <option value="ISO 45001 : 2018" {{ $sertif->jenis == 'ISO 45001 : 2018' ? 'selected' : '' }}>ISO 45001 : 2018</option>
                                    </select>
                                 </div>
                                <div class="mb-3">
                                    <label for="formFile" class="small mb-1">Masukan file</label>
                                    <input class="form-control" name="dokumen" type="file" id="dokumen" value="{{$sertif->dokumen}}" >
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
            $('#idsertif').val(id);
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
