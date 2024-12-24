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

@endsection
