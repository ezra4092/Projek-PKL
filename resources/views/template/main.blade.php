<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Sysdur - {{ $title }}</title>
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
            @include('template.footer')
         </div>
      </div>
      <script>
        window.addEventListener('DOMContentLoaded', event => {
            // Simple-DataTables
            // https://github.com/fiduswriter/Simple-DataTables/wiki


            new simpleDatatables.DataTable('#datatablesSimple', {
                searchable: true,
                paging: true,
            });

            // const datatablesSimple = document.getElementById('datatablesSimple');
            // if (datatablesSimple) {
            //     new simpleDatatables.DataTable(datatablesSimple);
            // }
        });
    </script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

    <!-- Bootstrap Bundle (termasuk Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <!-- Simple Datatables -->
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom Scripts -->
    <script src="js/datatables/datatables-simple-demo.js"></script>
    <script src="js/scripts.js"></script>

    <!-- SB Customizer -->
    <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
    <sb-customizer project="sb-admin-pro"></sb-customizer>

    <!-- Cloudflare Insights -->
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8c5e4dc4fc620499","version":"2024.8.0","serverTiming":{"name":{"cfExtPri":true,"cfL4":true}},"token":"6e2c2575ac8f44ed824cef7899ba8463","b":1}' crossorigin="anonymous"></script>

      @include('sweetalert::alert')
   </body>
</html>
