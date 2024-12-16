@extends('template.main')
@section('konten')
{{--
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
   <div class="container-fluid px-4">
      <div class="page-header-content">
         <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
               <h1 class="page-header-title">
                  <div class="page-header-icon"><i data-feather="folder"></i></div>
                  Daftar Sertifikat
               </h1>
            </div>
            <div class="col-12 col-xl-auto mb-3">
               <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
               <i class="me-1" data-feather="users"></i>
               Manage Groups
               </a>
               <a class="btn btn-sm btn-light text-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahModal">
               <i class="me-1" data-feather="folder-plus"></i>
               Tambah Data
               </a>
            </div>
         </div>
      </div>
   </div>
</header>
--}}
<!-- Main page content-->
{{-- <div class="container-xl px-4 mt-5">
   <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
      <div class="me-4 mb-3 mb-sm-0">
         <h1 class="mb-1">Dashboard</h1>
         <p>
            <span style="font-weight: bold;">
            {{ \Carbon\Carbon::now()->isoFormat('dddd') }}
            </span> &middot;
            {{ \Carbon\Carbon::now()->isoFormat('DD MMMM YYYY') }}
         </p>
      </div>
   </div>
</div>
<div class="container-fluid px-5">
    <div class="card mb-4">
        <div class="card-header text-danger">Sertifikat ISO Yang Akan Kedaluwarsa.</div>
        <div class="card-body">
           @if($data->isEmpty())
           <p class="text-muted">Tidak ada sertifikat yang mendekati tanggal kedaluwarsa dalam 30 hari ke depan.</p>
           @else
           <div class="container">
              <div class="row align-items-start">
                 @foreach($data as $sertifikat)
                 <div class="col">
                    <div class="card mb-3" style="width: 22rem;">
                       <div class="card-body">
                          <table class="table table-sm table-borderless fs-6">
                            <thead>
                                <th>{{$sertifikat->nama_sertif}}</th>
                            </thead>
                             <tbody>
                                <tr>
                                   <td>Nomor Sertifikat</td>
                                   <td>{{ $sertifikat->no_sertif }}</td>
                                </tr>
                                <tr>
                                   <td>Jenis Sertifikat</td>
                                   <td>{{ $sertifikat->jenis}}</td>
                                </tr>
                                <tr>
                                   <td>Tanggal Kedaluwarsa</td>
                                   <td>{{ \Carbon\Carbon::parse($sertifikat->tgl_kadaluwarsa)->format('d M Y') }}</td>
                                </tr>
                             </tbody>
                          </table>
                       </div>
                    </div>
                 </div>
                 @endforeach
              </div>
           </div>
           @endif
        </div>
     </div>

</div> --}}

<div class="container-xl px-4 mt-5">
    <div class="d-flex justify-content-between align-items-sm-center flex-column flex-sm-row mb-4">
       <div class="me-4 mb-3 mb-sm-0">
          <h1 class="mb-1">Dashboard</h1>
          <p>
             <span style="font-weight: bold;">
             {{ \Carbon\Carbon::now()->isoFormat('dddd') }}
             </span> &middot;
             {{ \Carbon\Carbon::now()->isoFormat('DD MMMM YYYY') }}
          </p>
       </div>
    </div>
 </div>
 <div class="container-fluid px-5">
    <div class="card mb-4 shadow-sm border-0 rounded-3">
       <div class="card-header text-dark fw-bold">Sertifikat ISO Yang Akan Kedaluwarsa</div>
       <div class="card-body">
          @if($data->isEmpty())
          <p class="text-muted">Tidak ada sertifikat yang mendekati tanggal kedaluwarsa dalam 30 hari ke depan.</p>
          @else
          <div class="container">
             <div class="row">
                @foreach($data as $sertifikat)
                <div class="col-md-4 col-sm-6 mb-4">
                   <div class="card h-100 shadow rounded-3 border-primary">
                      <div class="card-body bg-light rounded-3">
                         <h5 class="card-title text-secondary">{{ $sertifikat->nama_sertif }}
                         </h5>
                         <table class="table table-sm table-borderless">
                            <tbody>
                                <tr>
                                    <td class="fw-bold">Nomor Sertifikat</td>
                                  <td>{{ $sertifikat->no_sertif }}</td>
                               </tr>
                               <tr>
                                  <td class="fw-bold">Jenis Sertifikat</td>
                                  <td>{{ $sertifikat->jenis}}</td>
                               </tr>
                               <tr>
                                   <td class="fw-bold">Tanggal Terbit Sertifikat</td>
                                   <td>{{ \Carbon\Carbon::parse($sertifikat->tgl_terbit)->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Tanggal Kedaluwarsa</td>
                                    <td class="text-danger">{{ \Carbon\Carbon::parse($sertifikat->tgl_kadaluwarsa)->format('d M Y') }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold">Modified by </td>
                                    <td>{{ $sertifikat->user->nama}}</td>
                                </tr>
                                {{-- <tr>
                                    <td><button type="button" class="btn btn-sm btn-secondary d-inline-flex d-flex justify-content-end mt-2" data-bs-toggle="modal" data-bs-target="#reminderModal" id="reminder"
                                        data-id='{{ $sertifikat->idsertif }}' data-nama='{{ $sertifikat->nama_sertif }}'
                                        data-no='{{ $sertifikat->no_sertif }}' data-kadaluwarsa='{{ $sertifikat->tgl_kadaluwarsa }}' data-jenis='{{ $sertifikat->jenis }}'>
                                        Kirim Reminder</button></td>
                                </tr> --}}
                            </tbody>
                         </table>
                      </div>
                   </div>
                </div>
                @endforeach
             </div>
          </div>
          @endif
       </div>
    </div>
 </div>

 <!-- Modal -->
 <div class="modal fade" id="reminderModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
             <h1 class="modal-title fs-5" id="staticBackdropLabel">Remind Me</h1>
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
             <form class="user" action="{{ route('reminder') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="idsertiff" id="id">
                <div class="mb-3">
                    <label class="small mb-1" for="no_sertif">Nomor Sertifikat</label>
                    <input class="form-control" id="nama" name="nama_sertif" type="text" placeholder="Masukkan nomor sertifikat" readonly />
                </div>
                <div class="mb-3">
                    <label class="small mb-1" for="no_sertif">Nomor Sertifikat</label>
                    <input class="form-control" id="no" name="no_sertif" type="text" placeholder="Masukkan nomor sertifikat" readonly />
                </div>
                <div class="mb-3">
                   <label class="small mb-1" for="tgl_kadaluwarsa">Tanggal Kedaluwarsa Sertifikat</label>
                   <input class="form-control" id="tgl_k" name="tgl_kadaluwarsa" type="date" placeholder="Masukkan tanggal kadaluwarsa sertifikat" readonly/>
                </div>
                <div class="mb-3">
                    <label class="small mb-1">Jenis Sertifikat</label>
                    <select class="form-select" aria-label="Default select example" id="jenis" name="jenis"  readonly >
                        <option value="ISO 9001 : 2015" {{ isset($sertif) && $sertif->jenis == 'ISO 9001 : 2015' ? 'selected' : '' }}>ISO 9001 : 2015</option>
                        <option value="ISO 14001 : 2015" {{ isset($sertif) && $sertif->jenis == 'ISO 14001 : 2015' ? 'selected' : '' }}>ISO 14001 : 2015</option>
                        <option value="ISO 27001 : 2015" {{ isset($sertif) && $sertif->jenis == 'ISO 27001 : 2015' ? 'selected' : '' }}>ISO 27001 : 2015</option>
                        <option value="ISO 37001 : 2016" {{ isset($sertif) && $sertif->jenis == 'ISO 37001 : 2016' ? 'selected' : '' }}>ISO 37001 : 2016</option>
                        <option value="ISO 17025 : 2017" {{ isset($sertif) && $sertif->jenis == 'ISO 17025 : 2017' ? 'selected' : '' }}>ISO 17025 : 2017</option>
                        <option value="ISO 45001 : 2018" {{ isset($sertif) && $sertif->jenis == 'ISO 45001 : 2018' ? 'selected' : '' }}>ISO 45001 : 2018</option>
                    </select>
                </div>
                <p>Apakah anda yakin akan mengirim remider?</p>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Kirim Reminder</button>
          </div>
          </form>
       </div>
    </div>
 </div>
 <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
 <script>
    $(document).on('click', '#reminder', function(e) {
        var id = $(this).attr("data-id");
        var nama = $(this).attr("data-nama");
        var no = $(this).attr("data-no");
        var kadaluwarsa = $(this).attr('data-kadaluwarsa');
        var jenis = $(this).attr('data-jenis');
        $('#id').val(id);
        $('#nama').val(nama);
        $('#no').val(no);
        $('#tgl_k').val(kadaluwarsa);
        $('#jenis').val(jenis);
    });
 </script>
@endsection
