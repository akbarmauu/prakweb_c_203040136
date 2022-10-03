<?php
require 'functions.php';
$buku2 = query("SELECT * FROM buku2");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Buku</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h3>Daftar Buku Novel 2022</h3>
 
  <button>
    <a href="tambah.php" style="text-decoration:none;color:black;">Tambah Data Buku</a>
  </button>
  <br><br>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Gambar</th>
      <th>Judul Buku</th>
      <th>Pengarang</th>
      <th>Jumlah Lembar</th>
      <th>Alamat Penerbit</th>
      <th colspan="2">Aksi</th>
    </tr>
 
    <?php $i = 1;
    foreach ($buku2 as $b) : ?>
  
      <tr>
        <td><?= $i++; ?></td>
        <td><img src="img/<?= $b['gambar_buku']; ?>" width="60"></td>
        <td><?= $b['nama_buku']; ?></td>
        <td><?= $b['nama_pengarang']; ?></td>
        <td><?= $b['jumlah_lembar']; ?></td>
        <td><?= $b['alamat_penerbit']; ?></td> 
        <td>
          <button>
            <a href="ubah.php?id=<?= $b['id']; ?>" style="text-decoration:none;color:black;">Ubah</a>
          </button>
          <button class="add mb-3 btn btn-primary rounded-pill">
            <a href="hapus.php?id=<?= $b['id']; ?>" onclick="return confirm ('Apakah anda yakin?');" style="text-decoration:none;color:black;">Hapus</a>
          </button>
        </td>
      </tr>

    <?php endforeach; ?>

  </table>

</body>

</html>