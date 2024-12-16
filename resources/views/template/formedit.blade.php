@extends('template.main')
@section('konten')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
   <div class="container-fluid px-4">
      <div class="page-header-content">
         <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
               <h1 class="page-header-title">
                  <div class="page-header-icon"><i data-feather="pencil"></i></div>
                    Formulir Edit Data
               </h1>
            </div>
      </div>
   </div>
</header>
<!-- Main page content-->
<div class="container-fluid px-4">
    <div class="d-flex justify-content-center">
       <div class="col-xl-8">
          <div class="card">
             <div class="card-body">
                <form class="user" action="{{ route('edit-sertif') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type="hidden" name="idsertif" id="id">
                   <input class="form-control" id="user" name="user_id" type="hidden" value="{{ auth()->user()->id }}" readonly />
                   <div class="row gx-3 mb-3">
                      <div class="col-md-6">
                         <label class="small mb-1" for="nama_sertif">Nama Sertifikat </label>
                         <input class="form-control" id="nama_sertif" type="text" placeholder="Masukkan nama sertifikat" value="{{ $sertif->nama_sertif}}" required/>
                      </div>
                      <div class="col-md-6">
                         <label class="small mb-1" for="no_sertif">Nomor Sertifikat</label>
                         <input class="form-control" id="no" name="no_sertif" type="text" placeholder="Masukkan nomor sertifikat" value="{{ $sertif->no_sertif}}" />
                      </div>
                   </div>
                   <div class="row gx-3 mb-3">
                      <div class="col-md-6">
                         <label class="small mb-1" for="tgl_terbit">Tanggal Terbit Sertifikat</label>
                         <input class="form-control" id="tgl_t" name="tgl_terbit" type="date" placeholder="Masukkan tanggal terbit sertifikat" value="{{ $sertif->tgl_terbit}}" required/>
                      </div>
                      <div class="col-md-6">
                         <label class="small mb-1" for="tgl_kadaluwarsa">Tanggal Kedaluwarsa Sertifikat</label>
                         <input class="form-control" id="tgl_k" name="tgl_kadaluwarsa" type="date" placeholder="Masukkan tanggal kadaluwarsa sertifikat" value="{{ $sertif->tgl_kadaluwaersa}}"  />
                      </div>
                   </div>
                   <div class="mb-3">
                      <label class="small mb-1" for="instansi">Instansi Yang Mengeluarkan</label>
                      <input class="form-control" id="instansii" name="instansi" type="text" placeholder="Masukkan Instansi Yang Mengeluarkan" value="{{ $sertif->instansi }}" required/>
                   </div>
                   <div class="mb-3">
                      <label class="small mb-1">Jenis Sertifikat</label>
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
                   <div class="mb-3">
                      <label for="formFile" class="small mb-1">Masukan file</label>
                      <input class="form-control" name="dokumen" type="file" id="dokumenn" required>
                      <small>File saat ini: <a href="{{ asset('path/to/documents/' . $sertif->dokumen) }}" target="_blank">{{ $sertif->dokumen }}</a></small>
                   </div>
                   <div class="mb-3">
                      <label class="small mb-1" for="keterangan">Keterangan</label>
                      <input class="form-control" id="ayam" name="keterangan" type="text" placeholder="Masukkan Keterangan" value="{{$sertif->keterangan}}" />
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
 </div>

<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
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

@if (session('tambah') || session('delete') || session('edit'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: '{{ session('message') }}'
    })
</script>
@endif

@endsection
