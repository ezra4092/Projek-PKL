<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Documentation</title>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
      <link href="style/styles.css" rel="stylesheet" />
      <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
      <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
   </head>
    <body class="nav-fixed">
        <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
            <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
            <!-- Navbar Items-->
            <ul class="navbar-nav align-items-center ms-auto">
                <!-- Documentation Dropdown-->
                <li>
                    <a class="text-success" href="dashboard">
                       Kembali ke Dashboard <i class="fas fa-angle-right ms-2 me-4"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <a class="nav-link mt-5" href="#tambahdata">
                                <div class="nav-link-icon"><i class="fa-solid fa-1"></i></div>
                                Menambahkan Data Sertifikat
                            </a>
                            <a class="nav-link" href="#editdata">
                                <div class="nav-link-icon"><i class="fa-solid fa-2"></i></div>
                                Mengedit Data Sertifikat
                            </a>
                            <a class="nav-link" href="#hapusdata">
                                <div class="nav-link-icon"><i class="fa-solid fa-3"></i></div>
                                Menghapus Data Sertifikat
                            </a>
                            {{-- <a class="nav-link" href="tables.html">
                                <div class="nav-link-icon"><i class="fa-solid fa-4"></i></div>
                                Tables
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="nav-link-icon"><i class="fa-solid fa-5"></i></div>
                                Tables
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="nav-link-icon"><i class="fa-solid fa-6"></i></div>
                                Tables
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="nav-link-icon"><i class="fa-solid fa-7"></i></div>
                                Tables
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="nav-link-icon"><i class="fa-solid fa-8"></i></div>
                                Tables
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="nav-link-icon"><i class="fa-solid fa-9"></i></div>
                                Tables
                            </a> --}}
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-light bg-light pb-2">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="bookmark"></i></div>
                                            Panduan Pengguna
                                        </h1>
                                        <div class="page-header-subtitle">
                                            Selamat datang di panduan ini! Panduan ini akan memandu Anda secara langkah demi langkah untuk mencari, melihat, dan mengunduh secara online. Dengan mengikuti petunjuk di bawah ini, Anda dapat dengan mudah mengakses dan mengelola sertifikat Anda.
                                        </div>
                                        <br>
                                        <form class="form-inline me-auto d-none d-lg-block me-3">
                                            <div class="input-group input-group-joined input-group-solid" id="tambahdata">
                                                <input class="form-control pe-0" type="search" placeholder="Search" aria-label="Search" />
                                                <div class="input-group-text"><i data-feather="search"></i></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4">
                        <div class="card">
                            <div class="card-header text-dark">Menambahkan Data Sertifikat</div>
                            <div class="card-body">
                                <ol>
                                    <li>Tentukan jenis sertifikat apa yang akan ditambah datanya dengan cara mencari dan memilih pada pilihan yang ada di menu sidenav sebelah kiri.</li>
                                    <li>Lalu akan muncul tabel berisi data data sertifikat.</li>
                                    <li>Cari dan klik tombol "Tambah Data" di kanan atas.</li>
                                    <li>Akan muncul formulir untuk tambah data. </li>
                                    <li>Isi formulir yang disediakan dengan data sertifikat yang akurat, seperti:
                                        <ul>Nama Sertifikat</ul>
                                        <ul>Nomor Sertifikat</ul>
                                        <ul>Tanggal Terbit</ul>
                                        <ul>Tanggal Kedaluwarsa</ul>
                                        <ul>Instansi yang Mengeluarkan Sertifikat</ul>
                                        <ul>Jenis Sertifikat</ul>
                                        <ul>File Sertifikat</ul>
                                    </li>
                                    <li>Saat mengunggah file sertifikat, pastikan ukuran file tidak lebih dari 2mb.</li>
                                    <li>Setelah semua data terisi dengan benar, klik tombol "Tambah Data". Data sertifikat baru akan tersimpan dalam database.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="card mt-5" id="editdata">
                            <div class="card-header text-dark">Mengedit Data Sertifikat</div>
                            <div class="card-body">
                                <ol>
                                    <li>Gunakan fitur pencarian atau filter untuk menemukan data sertifikat yang ingin diedit.</li>
                                    <li>Klik pada tombol edit atau ikon pensil yang terkait dengan data sertifikat yang ingin diubah.</li>
                                    <li>Akan muncul formulir untuk edit data. </li>
                                    <li>Ubah data yang ingin diperbarui pada formulir edit. Pastikan semua kolom input sudah terisi semua.</li>
                                    <li>Saat mengunggah file sertifikat, pastikan ukuran file tidak lebih dari 2mb.</li>
                                    <li>Setelah selesai melakukan perubahan, klik tombol "Edit Data". Perubahan data akan tersimpan.</li>
                                </ol>
                            </div>
                        </div>
                        <div class="card mt-5" id="hapusdata">
                            <div class="card-header text-dark">Menghapus Data Sertifikat</div>
                            <div class="card-body">
                                <ol>
                                    <li>Gunakan fitur pencarian atau filter untuk menemukan data sertifikat yang ingin dihapus.</li>
                                    <li>Klik pada tombol hapus atau ikon tempat sampah yang terkait dengan data sertifikat yang ingin dihapus.</li>
                                    <li>Akan muncul peringatan untuk konfirmasi sebelum menghapus data secara permanen. </li>
                                    <li>Pastikan Anda memilih data yang benar sebelum melanjutkan.</li>
                                    <li>Klik tombol "Hapus Data". Lalu data akan terhapus secara permanen.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="footer-admin mt-auto footer-light">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright © Ezra 2024</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
        <sb-customizer project="sb-admin-pro"></sb-customizer>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8db0054b8b0f0484","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2024.10.4","token":"6e2c2575ac8f44ed824cef7899ba8463"}' crossorigin="anonymous"></script>
</body>
</html>
