<table id="datatablesSimple" class="table table-striped">
    <thead>
        <tr>
           <th width="2%">No.</th>
           <th>Nama Sertifikat</th>
           <th>Nomor Sertifikat</th>
           <th>Tanggal Terbit</th>
           <th>Tanggal Kedaluwarsa</th>
           <th>Instansi Yang Mengeluarkan</th>
           <th>Jenis</th>
           <th>Dokumen</th>
           <th>Keterangan</th>
           <th>Modified</th>
           @if(Auth::user()->privilages == 'Full-access')
           <th>Aksi</th>
           @endif
        </tr>
     </thead>

     <tfoot>
        <tr>
            <th width="2%">No.</th>
            <th>Nama Sertifikat</th>
            <th>Nomor Sertifikat</th>
            <th>Tanggal Terbit</th>
            <th>Tanggal Kedaluwarsa</th>
            <th>Instansi Yang Mengeluarkan</th>
            <th>Jenis</th>
            <th>Dokumen</th>
            <th>Keterangan</th>
            <th>Modified</th>
            @if(Auth::user()->privilages == 'Full-access')
            <th>Aksi</th>
            @endif
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
           <td>{{$sertif->keterangan}}</td>
           <td>{{$sertif->user->nama}}</td>
           @if(Auth::user()->privilages == 'Full-access')
           <td>
             <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" id="edit"
                data-id='{{ $sertif->idsertif }}'
                data-nama='{{ $sertif->nama_sertif }}'
                data-no='{{ $sertif->no_sertif }}'
                data-terbit='{{ $sertif->tgl_terbit }}'
                data-kadaluwarsa='{{ $sertif->tgl_kadaluwarsa }}'
                data-instansi='{{ $sertif->instansi }}'
                data-jenis='{{ $sertif->jenis }}'
                data-user='{{ $sertif->user_id}}'
                data-dokumen='{{ $sertif->dokumen }}'
                data-keterangan='{{ $sertif->keterangan }}' data-bs-toggle="modal" data-bs-target="#editModal"><i data-feather="edit"></i></button>
                <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark" data-bs-toggle="modal" data-bs-target="#hapusModal" id="delete"
                data-id='{{ $sertif->idsertif }}'><i class="fa-solid fa-trash"></i></button>
             </td>
             @endif
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
                   <label class="small mb-1" for="nama_sertif">Nama Sertifikat <span style="color:red; font-size:18px">*</span></label>
                   <input class="form-control" id="nama_sertif" name="nama_sertif" type="text" placeholder="Masukkan nama sertifikat" value="" required />
                </div>
                <div class="mb-3">
                   <label class="small mb-1" for="no_sertif">Nomor Sertifikat</label>
                   <input class="form-control" id="no_sertif" name="no_sertif" type="text" placeholder="Masukkan nomor sertifikat" value="" />
                </div>
                <div class="mb-3">
                   <label class="small mb-1" for="tgl_terbit">Tanggal Terbit Sertifikat <span style="color:red; font-size:18px">*</span></label>
                   <input class="form-control" id="tgl_terbit" name="tgl_terbit" type="date" placeholder="Masukkan tanggal terbit sertifikat" value="" required />
                </div>
                <div class="mb-3">
                   <label class="small mb-1" for="tgl_kadaluwarsa">Tanggal Kedaluwarsa Sertifikat</label>
                   <input class="form-control" id="tgl_kadaluwarsa" name="tgl_kadaluwarsa" type="date" placeholder="Masukkan tanggal kadaluwarsa sertifikat" value="" />
                </div>
                <div class="mb-3">
                   <label class="small mb-1" for="instansi">Instansi Yang Mengeluarkan <span style="color:red; font-size:18px">*</span></label>
                   <input class="form-control" id="instansi" name="instansi" type="text" placeholder="Masukkan Instansi Yang Mengeluarkan" value="" required />
                </div>
                <div class="mb-3">
                   <label class="small mb-1">Jenis Sertifikat <span style="color:red; font-size:18px">*</span></label>
                   <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                      <option selected="" disabled="">Pilih jenis sertifikat</option>
                      @switch($title)
                        @case('CSR')
                            <option value="Sertifikat CSR" selected>Sertifikat CSR</option>
                            @break

                        @case('HSE')
                            <option value="Sertifikat HSE" selected>Sertifikat HSE</option>
                            @break

                        @case('Penghargaan')
                            <option value="Penghargaan" selected>Penghargaan</option>
                            @break

                        @case('Proper')
                            <option value="Proper" selected>Proper</option>
                            @break

                        @case('SNI Award')
                            <option value="SNI Award" selected>SNI Award</option>
                            @break

                        @case('SWA')
                            <option value="SWA" selected>SWA</option>
                            @break

                        @case('ISO 9001 : 2015')
                            <option value="ISO 9001 : 2015" selected>ISO 9001 : 2015</option>
                            @break

                        @case('ISO 14001 : 2015')
                            <option value="ISO 14001 : 2015" selected>ISO 14001 : 2015</option>
                            @break

                        @case('ISO 27001 : 2015')
                            <option value="ISO 27001 : 2015" selected>ISO 27001 : 2015</option>
                            @break

                        @case('ISO 37001 : 2016')
                            <option value="ISO 37001 : 2016" selected>ISO 37001 : 2016</option>
                            @break

                        @case('ISO 17025 : 2017')
                            <option value="ISO 17025 : 2017" selected>ISO 17025 : 2017</option>
                            @break

                        @case('ISO 45001 : 2018')
                            <option value="ISO 45001 : 2018" selected>ISO 45001 : 2018</option>
                            @break

                        @default
                            <option value="" selected>Pilih Sertifikat</option>
                    @endswitch
                </div>
                <input class="form-control" id="user" name="user_id" type="hidden" value="{{ auth()->user()->id }}" readonly />
                <div class="mb-3">
                   <label for="formFile" class="small mb-1">Masukan file <span style="color:red; font-size:18px">*</span></label>
                   <input class="form-control" name="dokumen" type="file" id="dokumen" required>
                </div>
                <div class="mb-3">
                    <label class="small mb-1" for="keterangan">Keterangan</label>
                    <input class="form-control" id="keterangan" name="keterangan" type="text" placeholder="Masukkan nama sertifikat" value=""/>
                </div>
               <!-- Submit button-->
               <div class="d-flex justify-content-between">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                <button class="btn btn-primary" type="submit">Tambah Data</button>
            </div>
             </form>
          </div>
       </div>
    </div>
 </div>

 {{-- Modal hapus data --}}
 <div class="modal fade" id="hapusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data Sertifikat</h1>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <p class="mt-3">Apakah yakin ingin menghapus data?</p>
             <form action="{{route('hapus-sertif')}}" method="post">
                @csrf
                <input type="hidden" name="idsertif" id="idsertiff" >
          </div>
          <div class="modal-footer justify-content-between">
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
                        <input type="hidden" name="idsertif" id="id">
                        <div class="mb-3">
                           <label class="small mb-1" for="nama_sertif">Nama Sertifikat <span style="color:red; font-size:18px">*</span></label>
                           <input class="form-control" id="namae" name="nama_sertif" type="text" placeholder="Masukkan nama sertifikat" required />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="no_sertif">Nomor Sertifikat</label>
                           <input class="form-control" id="no" name="no_sertif" type="text" placeholder="Masukkan nomor sertifikat" />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="tgl_terbit">Tanggal Terbit Sertifikat <span style="color:red; font-size:18px">*</span></label>
                           <input class="form-control" id="tgl_t" name="tgl_terbit" type="date" placeholder="Masukkan tanggal terbit sertifikat" required/>
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="tgl_kadaluwarsa">Tanggal Kedaluwarsa Sertifikat</label>
                           <input class="form-control" id="tgl_k" name="tgl_kadaluwarsa" type="date" placeholder="Masukkan tanggal kadaluwarsa sertifikat"  />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="instansi">Instansi Yang Mengeluarkan <span style="color:red; font-size:18px">*</span></label>
                           <input class="form-control" id="instansii" name="instansi" type="text" placeholder="Masukkan Instansi Yang Mengeluarkan" required/>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Jenis Sertifikat <span style="color:red; font-size:18px">*</span></label>
                            <select class="form-select" aria-label="Default select example" id="jenis" name="jenis">
                                <option disabled {{ isset($sertif) && $sertif->jenis == null ? 'selected' : '' }}>Pilih jenis sertifikat</option>
                                <option value="Sertifikat CSR" {{ isset($sertif) && $sertif->jenis == 'Sertifikat CSR' ? 'selected' : '' }}>Sertifikat CSR</option>
                                <option value="Sertifikat HSE" {{ isset($sertif) && $sertif->jenis == 'Sertifikat HSE' ? 'selected' : '' }}>Sertifikat HSE</option>
                                <option value="Penghargaan" {{ isset($sertif) && $sertif->jenis == 'Penghargaan' ? 'selected' : '' }}>Penghargaan</option>
                                <option value="Proper" {{ isset($sertif) && $sertif->jenis == 'Proper' ? 'selected' : '' }}>Proper</option>
                                <option value="SNI Award" {{ isset($sertif) && $sertif->jenis == 'SNI Award' ? 'selected' : '' }}>SNI Award</option>
                                <option value="SWA" {{ isset($sertif) && $sertif->jenis == 'SWA' ? 'selected' : '' }}>SWA</option>
                                <option value="ISO 9001 : 2015" {{ isset($sertif) && $sertif->jenis == 'ISO 9001 : 2015' ? 'selected' : '' }}>ISO 9001 : 2015</option>
                                <option value="ISO 14001 : 2015" {{ isset($sertif) && $sertif->jenis == 'ISO 14001 : 2015' ? 'selected' : '' }}>ISO 14001 : 2015</option>
                                <option value="ISO 27001 : 2015" {{ isset($sertif) && $sertif->jenis == 'ISO 27001 : 2015' ? 'selected' : '' }}>ISO 27001 : 2015</option>
                                <option value="ISO 37001 : 2016" {{ isset($sertif) && $sertif->jenis == 'ISO 37001 : 2016' ? 'selected' : '' }}>ISO 37001 : 2016</option>
                                <option value="ISO 17025 : 2017" {{ isset($sertif) && $sertif->jenis == 'ISO 17025 : 2017' ? 'selected' : '' }}>ISO 17025 : 2017</option>
                                <option value="ISO 45001 : 2018" {{ isset($sertif) && $sertif->jenis == 'ISO 45001 : 2018' ? 'selected' : '' }}>ISO 45001 : 2018</option>
                            </select>
                        </div>
                        <input class="form-control" id="user" name="user_id" type="hidden" value="{{ auth()->user()->id }}" readonly />
                        <div class="mb-3">
                            <label for="formFile" class="small mb-1">Masukan file <span style="color:red; font-size:18px">*</span></label>
                            <input class="form-control" name="dokumen" type="file" id="dokumenn">
                         </div>
                         <div class="mb-3">
                            <label class="small mb-1" for="keterangan">Keterangan</label>
                            <input class="form-control" id="ayam" name="keterangan" type="text" placeholder="Masukkan Keterangan" value="" />
                         </div>
                        <!-- Submit button-->
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                            <button class="btn btn-primary" type="submit">Edit Data</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
