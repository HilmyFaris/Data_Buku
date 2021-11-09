<?php 

include "koneksi.php";

if( isset($_POST["submit"])){
    $judul_buku = $_POST["judul_buku"];
    $penulis = $_POST["penulis"];
    $jenis_buku = $_POST["jenis_buku"];

    $filename = $_FILES['gambar_buku']['name'];

    $xx =$filename;

    move_uploaded_file($_FILES['gambar_buku']['tmp_name'], 'img/'.$filename);

    mysqli_query($koneksi, "INSERT INTO buku VALUES('','$judul_buku','$penulis','$jenis_buku','$xx')");

    if( mysqli_affected_rows($koneksi) > 0){
        echo "<script>alert('Data berhasil di DITAMBAHKAN');
        document.location.href = 'index.php';</script>";
    } else{
        echo "<script>alert('Data gagal di DITAMBAHKAN')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Buku</title>
</head>
<body>
    <h1 align="center">Tambah Data Buku</h1>

    <form action="" method="post" enctype="multipart/form-data">
    <table align="center">
    <tr>
         <td><label for="judul_buku" class="form-label mt-4">Judul Buku</label></td>
         <td><input type="text" size="60" class="form-control mt-2 ms-3" id="judul_buku" name="judul_buku" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="penulis" class="form-label mt-4">Penulis</label></td>
         <td><input type="text" size="60" class="form-control mt-2 ms-3" id="penulis" name="penulis" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="jenis_buku" class="form-label mt-4">Jenis Buku</label></td>
         <td><input type="text" size="60" class="form-control mt-2 ms-3" id="jenis_buku" name="jenis_buku" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="gambar_buku" class="form-label mt-4">Gambar Buku</label></td>
         <td><input type="file" size="60" class="form-control mt-2 ms-3" id="gambar_buku" name="gambar_buku" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
        <td></td>
         <td><button type="submit" style="margin-top: 10px;" name="submit">Simpan</button></td>
    </tr>
</table>
</form>
</body>
</html>


