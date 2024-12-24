<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Profile</title>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
      <link href="/style/styles.css" rel="stylesheet" />
      <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
      <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
   </head>
   <body class="nav-fixed">
      <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
         <!-- Navbar Items-->
         <ul class="navbar-nav align-items-center ms-auto">
            <!-- Documentation Dropdown-->
            <li>
               <a class="text-success" href="{{route('dashboard')}}">
               Kembali ke Dashboard <i class="fas fa-angle-right ms-2 me-4"></i>
               </a>
            </li>
         </ul>
      </nav>
      <main class="mt-5">
         <header class="page-header page-header-light bg-light pb-2">
            <div class="container-xl px-4">
               <div class="page-header-content pt-4">
                  <div class="row align-items-center justify-content-between">
                     <div class="col-auto mt-4">
                        <h3 class="page-header-title">
                           <div class="page-header-icon"><i data-feather="user"></i></div>
                           Profile
                        </h3>
                     </div>
                  </div>
               </div>
            </div>
         </header>
         <!-- Main page content-->
         <div class="container-xl px-4">
            <div class="card mb-4">
               <div class="card-header">Account Details</div>
               <div class="card-body">
                  <form method="POST" action="{{route('update-profile', $user['id'])}}">
                     @csrf
                     <!-- Form Group (nama)-->
                     <input type="hidden" id="id" name="id" value="{{ $user->id ?? '' }}">
                     <div class="mb-3">
                        <label class="small mb-1" for="inputNama">Nama</label>
                        <input class="form-control" id="nama" name="nama" type="text" placeholder="Masukkan nama anda" value="{{ $user->nama ?? '' }}" />
                     </div>
                     <!-- Form Group (email)-->
                     <div class="mb-3">
                        <label class="small mb-1" for="inputEmail">Email</label>
                        <input class="form-control" id="email" name="email" type="email" placeholder="Masukkan email anda" value="{{ $user->email ?? '' }}" />
                     </div>
                     <!-- Form Group (username)-->
                     <div class="mb-3">
                        <label class="small mb-1" for="inputUsername">Username</label>
                        <input class="form-control" id="username" name="username" type="text" placeholder="Masukkan username anda" value="{{ $user->username ?? '' }}" />
                     </div>
                     <!-- Form Group (password))-->
                     <div class="mb-3">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Masukkan password" />
                        <div style="color:red; font-size:12px">
                            *tidak perlu diisi jika tidak diganti
                        </div>
                     </div>
                     <!-- Form Group (privilages)-->
                     @if(Auth::user()->privilages == 'Full-access')
                     {{-- <div class="mb-3">
                        <label class="small mb-1">Hak Akses</label>
                        <select class="form-select" aria-label="Default select example" id="privilages" name="privilages" required>
                           <option disabled >Pilih jenis hak akses</option>
                           <option @if ($user['privilages']=='Full-accsess') selected @endif value="Full-access" >Full-access</option>
                           <option @if ($user['privilages']=='Half-accsess') selected @endif  value="Half-access">Half-access</option>
                           <option @if ($user['privilages']=='No-accsess') selected @endif  value="No-access">No-access</option>
                        </select>
                     </div> --}}
                     @endif
                     <!-- Save changes button-->
                     <button class="btn btn-primary" type="submit">Edit Data</button>
                  </form>
               </div>
            </div>
         </div>
      </main>
      <footer class="footer-admin mt-auto footer-light">
         <div class="container-xl px-4">
            <div class="row">
               <div class="col-md-6 small text-dark">Copyright © Ezra 2024</div>
            </div>
         </div>
      </footer>
      @include('sweetalert::alert')
      <script>
         <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js">
      </script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="/js/scripts.js"></script>
      <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
      <sb-customizer project="sb-admin-pro"></sb-customizer>
      <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8db0054b8b0f0484","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2024.10.4","token":"6e2c2575ac8f44ed824cef7899ba8463"}' crossorigin="anonymous"></script>
   </body>
</html>
