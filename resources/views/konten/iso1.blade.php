@extends('template.main')
@section('konten')

<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
    <div class="container-fluid px-4">
        <div class="page-header-content">
            <div class="row align-items-center justify-content-between pt-3">
                <div class="col-auto mb-3">
                    <h1 class="page-header-title">
                        <div class="page-header-icon"><i data-feather="user"></i></div>
                        Users List
                    </h1>
                </div>
                <div class="col-12 col-xl-auto mb-3">
                    {{-- <a class="btn btn-sm btn-light text-primary" href="user-management-groups-list.html">
                        <i class="me-1" data-feather="users"></i>
                        Manage Groups
                    </a> --}}
                    <a class="btn btn-sm btn-light text-primary" type="button" data-bs-toggle="modal" data-bs-target="#tambahData">
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
                        {{-- <th>Dokumen</th> --}}
                        <th>Aksi</th>
                    </tr>
                </thead>
                {{-- <tfoot>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Groups</th>
                        <th>Joined Date</th>
                        <th>Actions</th>
                    </tr>
                </tfoot> --}}
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
                        {{-- <td>{{$sertif->file}}</td> --}}
                        <td>
                            <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#editData{{ $sertif->id_sertif }}" data-id='{{ $sertif->id_sertif }}' ><i data-feather="edit"></i></a>
                            {{-- <a class="btn btn-datatable btn-icon btn-transparent-dark me-2" data-bs-toggle="modal" data-bs-target="#editData" data-id_sertif='{{ $sertif->id_sertif }}' data-nama_sertif='{{ $sertif->nama_sertif }}' data-no_sertif='{{ $sertif->no_sertif }}' data-tgl_terbit='{{$sertif->tgl_terbit}}' data-tgl_kadaluwarsa="{{$sertif->tgl_kadaluwarsa}}" ><i data-feather="edit"></i></a> --}}
                            <form action="{{ route('hapus-sertif') }}" method="POST">
                                <input type="hidden" name="idsertif" value="{{$sertif->idsertif }}">
                                @csrf
                                <button type="submit" class="btn btn-datatable btn-icon btn-transparent-dark" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i data-feather="trash-2"></i></button>

                            </form>
                        </td>
                    </tr>

                    {{-- Modal edit data --}}
                    <div class="modal fade" id="editData{{$sertif->id_sertif}}" tabindex="-1" role="dialog" aria-labelledby="editDataLabel{{$sertif->id_sertif}}" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Sertifikat</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="user" action="{{ route('edit-sertif') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="idsertif" value="{{$sertif->id_sertif}}">
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
                                        <select class="form-select" aria-label="Default select example" id="jenis" name="jenis" value="{{$sertif->jenis}}">
                                            <option selected="" disabled="">Pilih jenis sertifikat</option>
                                            <option value="Sertifikat Umum">Sertifikat Umum</option>
                                            <option value="Sertifikat CSR">Sertifikat CSR</option>
                                            <option value="Penghargaan Umum">Penghargaan Umum</option>
                                            <option value="Sertifikat ISO 9001 : 2015">Sertifikat ISO 9001 : 2015</option>
                                            <option value="Sertifikat ISO 14001 : 2015">Sertifikat ISO 14001 : 2015</option>
                                        </select>
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

                </tbody>
            </table>

            {{-- Modal tambah data --}}
            <div class="modal fade" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <option value="Sertifikat Umum">Sertifikat Umum</option>
                                            <option value="Sertifikat CSR">Sertifikat CSR</option>
                                            <option value="Penghargaan Umum">Penghargaan Umum</option>
                                            <option value="Sertifikat ISO 9001 : 2015">Sertifikat ISO 9001 : 2015</option>
                                            <option value="Sertifikat ISO 14001 : 2015">Sertifikat ISO 14001 : 2015</option>
                                        </select>
                                    </div>
                                    <!-- Submit button-->
                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-primary" type="submit">Tambah Data</button>
                                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Tutup</button>
                                    </div>

                                </form>
                        </div>
                        {{-- <div class="modal-footer"><button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Save changes</button></div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
