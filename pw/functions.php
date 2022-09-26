<?php
function koneksi()
{
    return mysqli_connect('localhost', 'root', '', 'prakweb_c_203040136_pw');
}
 
function query($query)
{
    $conn = koneksi();

    $result = mysqli_query($conn, $query);

    // jika hasilnya hanya 1 data
    if( mysqli_num_rows($result) == 1) {
        return mysqli_fetch_assoc($result);
    }
    $rows = [];
while ($row = mysqli_fetch_assoc($result)) 
    {
    $rows[] = $row;
    }

    return $rows;
}
 
//tambah
function tambah($data)
{
  $conn = koneksi();
 
  $nama_buku = htmlspecialchars($data['nama_buku']);
  $nama_pengarang = htmlspecialchars($data['nama_pengarang']);
  $jumlah_lembar = htmlspecialchars($data['jumlah_lembar']);
  $alamat_penerbit = htmlspecialchars($data['alamat_penerbit']);
  $gambar_buku = htmlspecialchars($data['gambar_buku']);

  $query = "INSERT INTO 
            buku2
            VALUES
            (null, '$nama_buku', '$nama_pengarang', '$jumlah_lembar', '$alamat_penerbit', '$gambar_buku');
            ";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

//hapus
function hapus($id)
{
  $conn = Koneksi();

  // meghapus gambar di folder img
  $b = query("SELECT * FROM buku2 WHERE id = $id");
  if ($b['gambar_buku'] != 'nofoto.png') {
    unlink('img/' . $b['gambar_buku']);
  }

  mysqli_query($conn, "DELETE FROM buku2 WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// function ubah 
function ubah($data)
{
  $conn = koneksi();

  $id = $data['id'];
  $nama_buku = htmlspecialchars($data['nama_buku']);
  $nama_pengarang = htmlspecialchars($data['nama_pengarang']);
  $jumlah_lembar = htmlspecialchars($data['jumlah_lembar']);
  $alamat_penerbit = htmlspecialchars($data['alamat_penerbit']);
  $gambar_buku= htmlspecialchars($data['gambar_buku']);


  $query = "UPDATE buku2 SET
            nama_buku = '$nama_buku',
            nama_pengarang=  '$nama_pengarang',
            jumlah_lembar = '$jumlah_lembar',
            alamat_penerbit = '$alamat_penerbit',
            gambar_buku =  '$gambar_buku'
            WHERE id = $id";

  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}
// function cari 
function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM buku2
            WHERE 
            nama_buku LIKE '%$keyword%' OR 
             LIKE '%$keyword%' 
            ";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
?>
