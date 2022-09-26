<?php

require 'functions.php';


if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
                    alert('Data Berhasil ditambahkan!');
                    document.location.href = 'admin.php';
                </script>";
  } else {
    echo "<script>
                    alert('Data Gagal ditambahkan!');
                    document.location.href = 'admin.php';
                </script>";
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fikri's Library</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>

  <!-- navbar -->
  <!-- navbar -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <div class="container" style="margin-left:30px">
          <h1>Fikri's Book</h1>
        </div>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h4 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Fikri's Library</h4>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="index.php">Beranda</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
            </li>

          </ul>

        </div>
      </div>
    </div>
  </nav>

  <br>
  <br>
  <br>
  <br>

  <!-- body -->
  <div class="container">

    <h2>Form Tambah Data Baju</h2>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="judul_buku" class="form-label">Judul Buku</label>
        <input type="text" class="form-control" id="judul_buku" name="judul_buku">
      </div>

      <div class="mb-3">
        <label for="nama_penerbit" class="form-label">Nama Penerbit</label>
        <input type="text" class="form-control" id="nama_penerbit" name="nama_penerbit">
      </div>

      <div class="mb-3">
        <label for="jumlah_halaman" class="form-label">Jumlah Halaman</label>
        <input type="text" class="form-control" id="jumlah_halaman" name="jumlah_halaman">
      </div>

      <div class="mb-3">
        <label for="gambar_buku" class="form-label">Gambar</label>
        <input class="form-control" type="file" id="gambar_buku" name="gambar_buku">
      </div>

      <button type="submit" class="btn btn-dark" name="tambah">Tambah</button>
    </form>

  </div>













  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>