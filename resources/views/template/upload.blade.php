@ -0,0 +1,48 @@
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <form class="user" action="{{ route('uploadproses') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mt-5 mb-3">
        <label for="nama" class="form-label">Masukan nama sertifikat</label>
        <input type="text" name="nama_sertif" class="form-label">
        </div>
    <div class="mb-3">
        <label for="nomor" class="form-label">Masukan nomor sertifikat</label>
        <input type="text" name="no_sertif" class="form-label">
    </div>
    <div class="mb-3">
        <label for="tgl_terbit" class="form-label">Masukan tanggal terbit sertifikat</label>
        <input type="date" name="tgl_terbit" class="form-label">
    </div>
    <div class="mb-3">
        <label for="tgl_kadaluwarsa" class="form-label">Masukan tanggal kadaluwarsa sertifikat</label>
        <input type="date" name="tgl_kadaluwarsa" class="form-label">
    </div>
    <div class="mb-3">
        <label for="jenis" class="form-label">Pilih jenis sertifikat</label>
        <label><input type="radio" name="jenis" value="penghargaan umum" class="form-label"> Penghargaan umum</label>
        <label><input type="radio" name="jenis" value="sertifikat iso" class="form-label"> Sertifikat iso</label>
        <label><input type="radio" name="jenis" value="penghargaan csr" class="form-label"> Penghargaan csr</label>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Masukan file</label>
        <input class="form-control" name="file" type="file" id="formFile">
      </div>
    <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
        <button class="btn btn-primary" type="submit">Kirim</button>
    </div>
</form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
