<?php
require 'functions.php';

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query buku berdasarkan id
$b = query("SELECT * FROM buku2 WHERE id = $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal diubah!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah data Buku</title>

</head>

<body>
  <h3>Form ubah data Buku</h3>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $b['id']; ?>">
    <ul>
      <li>
        <label>
          Nama Buku :
          <input type="text" name="nama_buku" autofocus required value="<?= $b['nama_buku']; ?>">
        </label>
      </li>

      <li>
        <label>
          Nama Pengarang :
          <input type="text" name="nama_pengarang" required value="<?= $b['nama_pengarang']; ?>">
        </label>
      </li>

      <li>
        <label>
          Jumlah lembar :
          <input type="text" name="jumlah_lembar" required value="<?= $b['jumlah_lembar']; ?>">
        </label>
      </li>

      <li>
        <label>
          alamat penerbit :
          <input type="text" name="alamat_penerbit" required value="<?= $b['alamat_penerbit']; ?>">
        </label>
      </li>

      <li>
        <label>
          Gambar Buku :
          <input type="text" name="gambar_buku" required value="<?= $b['gambar_buku']; ?>">
        </label>
      </li>

      <li>
        <button type="submit" name="ubah">Ubah Data!</button>
      </li>
    </ul>
  </form>
</body>

</html>