<?php

require 'functions.php';
$buku = query("SELECT * FROM buku");

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Fikri's Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <h1>Hello, world!</h1>

  <!-- navbar -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <div class="container" style="margin-left:30px;">
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

  <!-- body -->
  <div class="container">

    <button class="btn btn-dark" type="button">
      <a href="tambah.php" style="color: white; text-decoration:none;">Tambah Data</a>
    </button>

    <br>
    <br>

    <table class="table">
      <thead class="table-dark">
        <tr class="text-center">
          <th>No</th>
          <th>Judul Buku</th>
          <th>Nama Penerbit</th>
          <th>Jumlah Halaman</th>
          <th>Gambar</th>
          <th>Aksi</th>
        </tr>

        <div class="position-absolute top-50 start-50 translate-middle"></div>

        <?php $i = 1 ?>
        <?php foreach ($buku as $bk) : ?>
          <tr class="text-center">
            <td style="padding-bottom: 70px;"><?= $bk["id"]; ?></td>
            <td style="padding-bottom: 70px;"><?= $bk["judul_buku"]; ?></td>
            <td style="padding-bottom: 70px;"><?= $bk["nama_penerbit"]; ?></td>
            <td style="padding-bottom: 70px;"><?= $bk["jumlah_halaman"]; ?></td>
            <td>
              <img src="img/<?= $bk["gambar_buku"]; ?>" style="height: 150px; width:100px;" alt="">
            </td>
            <td style="padding-bottom:30px;">
              <a href="ubah.php?id=<?= $bk["id"]; ?>" style="color: white; text-decoration:none;">
                <button type="button" class="btn btn-light">Ubah</button>
              </a>

              <br>
              <br>

              <a href="hapus.php?id=<?= $bk["id"]; ?>" onclick="return confirm('hapus data?')">
                <button type="button" class="btn btn-light">Hapus</button>
              </a>

            </td>
          </tr>
          <?php $i++; ?>
        <?php endforeach; ?>

      </thead>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>






</html>