<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Panduan Login</title>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
      <link href="style/styles.css" rel="stylesheet" />
      <link rel="icon" type="image/x-icon" href="favicon.ico" />
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
                <a class="text-success" href="/">
                   Kembali ke Login <i class="fas fa-angle-right ms-2 me-4"></i>
                </a>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sidenav shadow-right sidenav-light">
                <div class="sidenav-menu">
                    <div class="nav accordion" id="accordionSidenav">
                        <a class="nav-link mt-5" href="#login">
                            <div class="nav-link-icon"><i class="fa-solid fa-1"></i></div>
                            Cara Login
                        </a>
                        <a class="nav-link" href="#lupapwd">
                            <div class="nav-link-icon"><i class="fa-solid fa-2"></i></div>
                            Lupa Password
                        </a>
                        {{-- <a class="nav-link" href="#hapusdata">
                            <div class="nav-link-icon"><i class="fa-solid fa-3"></i></div>
                            Kontak Bantuan
                        </a>
                        <a class="nav-link" href="#tambahuser">
                            <div class="nav-link-icon"><i class="fa-solid fa-4"></i></div>
                            Menambahkan Data User
                        </a>
                        <a class="nav-link" href="#edituser">
                            <div class="nav-link-icon"><i class="fa-solid fa-5"></i></div>
                            Mengedit Data User
                        </a>
                        <a class="nav-link" href="#hapususer">
                            <div class="nav-link-icon"><i class="fa-solid fa-6"></i></div>
                            Menghapus Data User
                        </a>
                        <a class="nav-link" href="#reminder">
                            <div class="nav-link-icon"><i class="fa-solid fa-7"></i></div>
                            Reminder Melalui Email
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
                                    <h2 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="bookmark"></i></div>
                                        Panduan Login
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->
                <div class="container-xl px-4">
                    <div class="card" id="login">
                        <div class="card-header text-dark">Cara Login</div>
                        <div class="card-body">
                            <table class="table">
                                    <tr>
                                        <td>
                                            1. Akses halaman login melalui URL pada web browser dan anda akan melihat tampilan formulir login seperti pada gambar.
                                        </td>
                                        <td><img src="img/login1.png" alt="" width="700rem"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2. Pada kolom bertuliskan "Masukkan username", ketikkan username anda sesuai dengan akun yang terdaftar. Pada kolom bertuliskan "Masukkan password", ketikkan kata sandi anda dengan hati-hati. Pastikan password yang dimasukkan benar.
                                        </td>
                                        <td><img src="img/login2.png" alt="" width="450rem"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3. Tekan tombol "Login" yang berwarna biru di bagian bawah formulir untuk melanjutkan proses login.
                                        </td>
                                        <td><img src="img/login3.png" alt="" width="100rem"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4. Jika informasi yang dimasukkan benar, Anda akan diarahkan ke dashboard akun Anda. Jika gagal, periksa kembali username dan password Anda.
                                        </td>
                                        <td><img src="img/reminder1.png" alt="" width="700rem"></td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-5" id="lupapwd">
                        <div class="card-header text-dark">Cara Mengatasi Lupa Password</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>1. Pada halaman login, klik tombol atau tulisan "Lupa Password".</td>
                                    <td><img src="img/login1.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>2. Setelah itu, Anda akan diarahkan ke formulir untuk mengirimkan token reset. Masukkan email yang terdaftar di akun Anda, lalu klik.</td>
                                    <td><img src="img/resetpw1.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>3. Sistem akan mengirimkan email berisi link untuk mereset password. Link tersebut sudah dilengkapi dengan token reset.</td>
                                    <td><img src="img/resetpw2.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>4. Buka email Anda, lalu klik link reset password yang sudah diterima.</td>
                                    <td><img src="img/resetpw3.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>5. Jika token pada link sesuai dan valid, Anda akan diarahkan ke formulir untuk mengganti password. Masukkan password baru Anda dan password harus memiliki minimal 8 karakter.</td>
                                    <td><img src="img/resetpw4.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>6. Setelah password berhasil diganti, token akan dihapus otomatis dari sistem. Dan Anda dapat login menggunakan password baru Anda.</td>
                                    <td><img src="img/resetpw5.png" alt="" width="700rem"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card mt-5" id="hapusdata">
                        <div class="card-header text-dark">Kontak Bantuan</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>1. Gunakan fitur pencarian atau filter untuk menemukan data sertifikat yang ingin dihapus.</td>
                                    <td><img src="img/hapus1.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>2. Klik tombol hapus atau ikon tempat sampah yang terkait dengan data sertifikat yang ingin dihapus.</td>
                                    <td><img src="img/hapus2.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>3. Akan muncul peringatan untuk konfirmasi sebelum menghapus data secara permanen. Pastikan Anda memilih data yang benar sebelum melanjutkan.</td>
                                    <td><img src="img/hapus3.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>4. Klik tombol "Hapus Data". Lalu data akan terhapus secara permanen.</td>
                                    <td><img src="img/hapus4.png" alt="" width="700rem"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-5" id="tambahuser">
                        <div class="card-header text-dark">Menambah Data User</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>
                                        1. Tampilan awal web adalah dashboard. Klik "User" yang ada di menu sidenav sebelah kiri.
                                    </td>
                                    <td><img src="img/tambah1.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>2. Akan muncul tabel berisi data-data user.</td>
                                    <td><img src="img/tuser1.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>
                                        3. Cari dan klik tombol "Tambah Data" di kanan atas.
                                    </td>
                                    <td><img src="img/tambah3.png" alt="" width="150rem"></td>
                                </tr>
                                <tr>
                                    <td>
                                        4. Akan muncul formulir untuk tambah data.
                                    </td>
                                    <td><img src="img/tuser2.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>
                                        5. Isi formulir yang disediakan dengan data user yang akurat, seperti: <br>
                                    Nama User <br>
                                    Email User <br>
                                    Username <br>
                                    Password<br>
                                    Hak Akses
                                    </td>
                                    <td><img src="img/tuser3.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>
                                        6. Setelah semua data terisi dengan benar, klik tombol "Tambah Data". Data user baru akan tersimpan dalam database.
                                    </td>
                                    <td><img src="img/tuser4.png" alt="" width="700rem"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-5" id="edituser">
                        <div class="card-header text-dark">Mengedit Data Sertifikat</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>1. Gunakan fitur pencarian atau filter untuk menemukan data user yang ingin diedit.</td>
                                    <td><img src="img/euser1.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>2. Klik tombol edit atau ikon pensil berwarna kuning yang terkait dengan data user yang ingin diubah.</td>
                                    <td><img src="img/euser2.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>3. Akan muncul formulir untuk mengedit data. Ubah data yang ingin diperbarui pada formulir edit. Jika tidak ingin mengubah kata sandi/password, kosongkan kolom inputnya.</td>
                                    <td><img src="img/euser3.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>5. Setelah selesai melakukan perubahan, klik tombol "Edit Data". Perubahan data user akan tersimpan di database.</td>
                                    <td><img src="img/euser4.png" alt="" width="700rem"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-5" id="hapususer">
                        <div class="card-header text-dark">Menghapus Data User</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>1. Gunakan fitur pencarian atau filter untuk menemukan data user yang ingin dihapus.</td>
                                    <td><img src="img/huser1.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>2. Klik tombol hapus atau ikon tempat sampah yang terkait dengan data user yang ingin dihapus.</td>
                                    <td><img src="img/huser2.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>3. Akan muncul peringatan untuk konfirmasi sebelum menghapus data secara permanen. Pastikan Anda memilih data yang benar sebelum melanjutkan.</td>
                                    <td><img src="img/huser3.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>4. Klik tombol "Hapus Data". Lalu data akan terhapus secara permanen.</td>
                                    <td><img src="img/huser4.png" alt="" width="700rem"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card mt-5" id="reminder">
                        <div class="card-header text-dark">Reminder Melalui Email</div>
                        <div class="card-body">
                            <table class="table">
                                <tr>
                                    <td>1. Pada tampilan dashboard, terdapat data yang menunjukkan apakah terdapat sertifikat iso yang akan kedaluwarsa dalam 30 hari ke depan atau tidak. Berikut adalah contoh tampilan jika terdapat sertifikat yang akan kedaluwarsa.</td>
                                    <td><img src="img/reminder1.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>2. Berikut adalah tampilan jika tidak terdapat sertifikat yang akan kedaluwarsa.</td>
                                    <td><img src="img/reminder2.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>3. Setiap hari Senin pukul 08.00, akan ada pengingat melalui email untuk memberitahukan sertifikat yang akan kedaluwarsa. Berikut adalah contoh email jika ada sertifikat yang kedaluwarsa.</td>
                                    <td><img src="img/reminder3.png" alt="" width="700rem"></td>
                                </tr>
                                <tr>
                                    <td>4. Berikut adalah contoh email jika tidak ada sertifikat yang kedaluwarsa.</td>
                                    <td><img src="img/reminder4.png" alt="" width="700rem"></td>
                                </tr>
                            </table>
                        </div>
                    </div> --}}
                </div>
            </main>
            <footer class="footer-admin mt-auto footer-light">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small text-dark">Copyright © Ezra 2024</div>
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

