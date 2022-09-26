<?php

function koneksi()
{
    $conn = mysqli_connect("localhost", "root", "");
    mysqli_select_db($conn, "prakweb_a_203040001_pw");

    return $conn;
}

function query($query)
{
    $conn = koneksi();
    $result = mysqli_query($conn, "$query");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi upload gamabr
function upload()
{
    $nama_file = $_FILES['gambar_buku']['name'];
    $tipe_file = $_FILES['gambar_buku']['type'];
    $ukuran_file = $_FILES['gambar_buku']['size'];
    $error = $_FILES['gambar_buku']['error'];
    $tmp_file = $_FILES['gambar_buku']['tmp_name'];

    // Ketika tidak ada gambar yang dipilih
    if ($error == 4) {
        // echo "<script>
        //         alert('Pilih Gambar Terlebih Dahulu!');
        //       </script>"; 
        return 'nophoto.png';
    }

    $daftar_gambar = ['jpg', 'jpeg', 'png'];
    $ekstensi_file = explode('.', $nama_file);
    $ekstensi_file = strtolower(end($ekstensi_file));
    if (!in_array($ekstensi_file, $daftar_gambar)) {
        echo "<script>
            alert('yang anda pilih bukan gambar');
           </script>";
        return false;
    }

    // cek type file
    if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png' && $tipe_file != 'image/jpg') {
        echo "<script>
            alert('yang anda pilih bukan gambar');
           </script>";
        return false;
    }
    // cek ukuran file
    // maksimal 5mb = 5000000
    if ($ukuran_file > 5000000) {
        echo "<script>
            alert('ukuran file terlalu besar');
           </script>";
        return false;
    }
    // lolos pengecekan 
    // siap upload file
    // generate nama file baru
    $nama_file_baru = uniqid();
    $nama_file_baru .= '.';
    $nama_file_baru .= $ekstensi_file;
    move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);
    return $nama_file_baru;
}



//fungsi tambah
function tambah($data)
{
    $conn = koneksi();

    $judul_buku = htmlspecialchars($data['judul_buku']);
    $nama_penerbit = htmlspecialchars($data['nama_penerbit']);
    $jumlah_halaman = htmlspecialchars($data['jumlah_halaman']);
    // $gambar_buku = htmlspecialchars($data['gambar_buku']);
    $gambar_buku = upload();
    if (!$gambar_buku) {
        return false;
    }

    $query = "INSERT INTO buku
                    VALUES
                    ('', '$judul_buku', '$nama_penerbit', '$jumlah_halaman', '$gambar_buku')";

    mysqli_query($conn, $query);
    echo mysqli_error($conn);
    return mysqli_affected_rows($conn);
}

// fungsi hapus
function hapus($id)
{
    $conn = koneksi();
    mysqli_query($conn, "DELETE FROM buku WHERE id = $id");

    return mysqli_affected_rows($conn);
}


// fungsi ubah
function ubah($data)
{
    global $conn;

    $conn = koneksi();
    $id = $data['id'];
    $judul_buku = htmlspecialchars($data['judul_buku']);
    $nama_penerbit = htmlspecialchars($data['nama_penerbit']);
    $jumlah_halaman = htmlspecialchars($data['jumlah_halaman']);
    //$gambar_lama = htmlspecialchars($data['gambar_lama']);
    $gambar_buku = upload();

    // if (!$gambar_lama) {
    //     return false;
    // }

    // if ($gambar_lama == 'nophoto.png') {
    //     $gambar_lama = $gambar_buku;
    // }

    $query = "UPDATE buku SET
            judul_buku = '$judul_buku',
            nama_penerbit = '$nama_penerbit',
            jumlah_halaman = '$jumlah_halaman',
            gambar_buku = '$gambar_buku'
            WHERE id = $id
            ";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
