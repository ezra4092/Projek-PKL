@extends('template.main')
@section('konten')
<header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
   <div class="container-fluid px-4">
      <div class="page-header-content">
         <div class="row align-items-center justify-content-between pt-3">
            <div class="col-auto mb-3">
               <h1 class="page-header-title">
                  <div class="page-header-icon"><i data-feather="user"></i></div>
                    Daftar User
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
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Privilages</th>
                  <th>Aksi</th>
               </tr>
            </thead>
            <tfoot>
               <tr>
                  <th width="2%">No.</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Privilages</th>
                  <th>Aksi</th>
               </tr>
            </tfoot>
            <tbody>
               @php $no = 1; @endphp
               @foreach ($data as $user)
               <tr>
                  <td width="2%">{{$no++}}</td>
                  <td>{{$user->nama}}</td>
                  <td>{{$user->username}}</td>
                  <td>{{ str_repeat('*', 8) }}</td>
                  <td>{{$user->privilages}}</td>
                  <td>
                     <button class="btn btn-datatable btn-icon btn-transparent-dark me-2" id="update"
                        data-id='{{ $user->id}}'
                        data-nama='{{ $user->nama }}'
                        data-username='{{ $user->username }}'
                        data-password='{{ $user->password }}'
                        data-privilages='{{ $user->privilages}}'
                        data-bs-toggle="modal" data-bs-target="#editModal"><i data-feather="edit"></i></button>
                     <button type="button" class="btn btn-datatable btn-icon btn-transparent-dark"
                        data-bs-toggle="modal" data-bs-target="#hapusModal" id="delete"
                        data-id='{{ $user->id }}'><i class="fa-solid fa-trash"></i></button>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>

         {{-- Modal tambah data --}}
         <div class="modal fade" id="tambahData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form class="user" action="{{ route('tambah-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                           <label class="small mb-1" for="nama">Nama <span style="color:red; font-size:18px">*</span></label>
                           <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan nama" required />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="username">Username <span style="color:red; font-size:18px">*</span></label>
                           <input class="form-control" id="username" name="username" type="text" placeholder="Masukkan username" required />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="password">Password <span style="color:red; font-size:18px">*</span></label>
                           <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password" required />
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Hak Akses <span style="color:red; font-size:18px">*</span></label>
                            <select class="form-select" aria-label="Default select example" id="privilages" name="privilages" required>
                               <option selected="" disabled="">Pilih jenis hak akses</option>
                               <option value="Full-access">Full-access</option>
                               <option value="Half-access">Half-access</option>
                               <option value="No-access">No-access</option>
                            </select>
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
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Delete Data User</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <p>Apakah yakin ingin menghapus data?</p>
                     <form action="{{ route('hapus-user') }}" method="post">
                        @csrf
                        <input type="hidden" name="id" id="id">
                  </div>
                  <div class="modal-footer"><button class="btn btn-secondary" type="button"
                     data-bs-dismiss="modal">Close</button>
                  <button class="btn btn-danger" type="submit">Delete</button>
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
                     <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
                     <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                     <form class="user" action="{{ url('edit-user') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="ide">
                        <div class="mb-3">
                           <label class="small mb-1" for="nama">Nama <span style="color:red; font-size:18px">*</span></label>
                           <input class="form-control" id="namae" name="nama" type="text" placeholder="Masukkan nama"  />
                        </div>
                        <div class="mb-3">
                           <label class="small mb-1" for="username">Username <span style="color:red; font-size:18px">*</span></label>
                           <input class="form-control" id="usne" name="username" type="text" placeholder="Masukkan username" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="small mc-1">Password <span style="color:red; font-size:18px">*</span></label>
                            <input class="form-control" type="password" name="pwe">
                            <div style="color:red; font-size:10px">
                                *tidak perlu diisi jika tidak diganti
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1">Hak Akses <span style="color:red; font-size:18px">*</span></label>
                            <select class="form-select" aria-label="Default select example" id="akses" name="privilages" required>
                                <option disabled {{ isset($user) && $user->jenis == null ? 'selected' : '' }}>Pilih jenis hak akses</option>
                                <option value="Full-access" {{ isset($user) && $user->jenis == 'Full-access' ? 'selected' : '' }}>Full-access</option>
                                <option value="Half-access" {{ isset($user) && $user->jenis == 'Half-access' ? 'selected' : '' }}>Half-access</option>
                                <option value="No-access" {{ isset($user) && $user->jenis == 'No-access' ? 'selected' : '' }}>No-access</option>
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

      </div>
   </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
   $(document).on('click', '#delete', function(e) {
       var id = $(this).attr("data-id");
       $('#id').val(id);
   });

     $(document).on('click', '#update', function(e) {
       var id = $(this).attr("data-id");
       var nama = $(this).attr("data-nama");
       var username = $(this).attr("data-username");
       var password = $(this).attr("data-password");
       var privilages = $(this).attr("data-privilages");
       $('#ide').val(id);
       $('#namae').val(nama);
       $('#usne').val(username);
       $('#akses').val(privilages);
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
