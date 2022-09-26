<?php

require 'functions.php';
$buku = query("SELECT * FROM buku");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="utf-8">
  <title>Fikri's Book</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

  <!-- navbar -->
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <div class="container" style="margin-left:30px;">
          <h1>Fikri's Library</h1>
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
              <a class="nav-link active" aria-current="page" href="index.php">Beranda</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="admin.php">Admin</a>
            </li>

          </ul>

        </div>
      </div>
    </div>
  </nav>

  <br>

  <!-- body -->
  <div class="container" style="margin-top: 80px;">
    <div class="row">
      <?php $i = 1 ?>
      <?php foreach ($buku as $bk) : ?>
        <div class="col-sm-3">
          <div class="card" style="width: 18rem; height:700px; text-align:center;">
            <img src="img/<?= $bk["gambar_buku"]; ?>" class="card-img-top" style="height:378px; width:286,5px;" alt="...">
            <div class="card-body">
              <h5 class="card-title"></h5>
              <h3 class="card-text"><?= $bk["judul_buku"]; ?></h3>
              <p class="card-text">Penerbit : <?= $bk["nama_penerbit"]; ?></p>
              <p class="card-text">Jumlah Halaman : <?= $bk["jumlah_halaman"]; ?></p>
              <a href="#" class="btn btn-dark">Detail</a>
            </div>
          </div>
          <br>
        </div>
        <?php $i++; ?>
      <?php endforeach; ?>
      <br>
      <br>
    </div>
  </div>

  <!-- footer -->
  <footer class="bg-dark" style="padding-bottom: 20px; color: white;">
    <div class="container" style="text-align: center;">
      <h5 style="padding-top: 40px;"> &copy
        <script>
          document.write(new Date().getFullYear())
        </script>
        - Fikri Ridwan Faturohman
      </h5>

    </div>
  </footer>


</body>

</html>