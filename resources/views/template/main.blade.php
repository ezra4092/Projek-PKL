<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Users List - SB Admin Pro</title>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
      <link href="style/styles.css" rel="stylesheet" />
      <link rel="icon" type="image/x-icon" href="assets/img/favicon.png" />
      <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
   </head>
   <body class="nav-fixed fs-6">
      <nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
         @include('template.navbar')
      </nav>
      <div id="layoutSidenav">
         <div id="layoutSidenav_nav">
            @include('template.sidebar')
         </div>
         <div id="layoutSidenav_content">
            <main>
               @yield('konten')
            </main>
            <footer class="footer-admin mt-auto footer-light">
               <div class="container-xl px-4">
                  <div class="row">
                     <div class="col-md-6 small">Copyright © Your Website 2021</div>
                     <div class="col-md-6 text-md-end small">
                        <a href="#!">Privacy Policy</a>
                        ·
                        <a href="#!">Terms &amp; Conditions</a>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
      </div>
      @include('template.footer')
      @include('sweetalert::alert')
   </body>
</html>
