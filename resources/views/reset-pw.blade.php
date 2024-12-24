<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Reset Password</title>
        <link href="style/styles.css" rel="stylesheet" />
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/js/all.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary-bg-subtle">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container-xl px-4">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8 col-sm-11">
                                <!-- Social forgot password form-->
                                <div class="card shadow-lg my-5">
                                    <div class="card-body p-4 text-center"><div class="h2 fw-light mb-0">Reset Password</div></div>
                                    <hr class="my-0" />
                                    <div class="card-body p-5">
                                        <form action="{{ route ('reset')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="token" value="{{$data->token}}">
                                            <div class="mb-3">
                                                <label class="text-gray-600 small" for="emailExample">Password Baru</label>
                                                <input class="form-control form-control-solid" type="password" name="password" id="password" placeholder="" required />
                                                <div style="color:red; font-size:10px">
                                                    Kata sandi harus memiliki minimal 8 karakter.
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end">
                                                <button class="btn btn-primary" type="submit">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body px-5 py-3">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="footer-admin mt-auto footer-dark">
                    <div class="container-xl px-4">
                        <div class="text-center text-dark">
                            <div class="small text-md-center">Copyright © Ezra 2024</div>
                            {{-- <div class="col-md-6 text-md-end small">
                                <a href="panduan">Panduan Login</a>
                            </div> --}}
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

        <script src="https://assets.startbootstrap.com/js/sb-customizer.js"></script>
        <sb-customizer project="sb-admin-pro"></sb-customizer>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8f4e0ff4a8d50e72","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"version":"2024.10.5","token":"6e2c2575ac8f44ed824cef7899ba8463"}' crossorigin="anonymous"></script>
</body>
</html>
