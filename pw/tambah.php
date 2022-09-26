<?php
require 'functions.php';

// cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambahkan');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal ditambahkan!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah data Buku</title>

</head>

<body>
  <h3>Form tambah data buku</h3>
  <form action="" method="POST">
    <ul>
      <li>
        <label>
          Nama Buku :
          <input type="text" name="nama_buku" autofocus required>
        </label>
      </li>

      <li>
        <label>
          Nama Pengarang :
          <input type="text" name="nama_pengarang" required>
        </label>
      </li>

      <li>
        <label>
          Jumlah Lembar :
          <input type="text" name="jumlah_lembar" required>
        </label>
      </li>

      <li>
        <label>
          Alamat penerbit :
          <input type="text" name="alamat_penerbit" required>
        </label>
      </li>

      <li>
      <label>
          Gambar :
          <input type="text" name="gambar_buku" class="gambar_buku" onchange="previewImage()">
      </label>
      </li>

      <li>
        <button type="submit" name="tambah">Tambah Data!</button>
      </li>
    </ul>
  </form>
</body>
 
</html>