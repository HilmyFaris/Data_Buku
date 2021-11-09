<?php 

include "koneksi.php";

$id = $_GET['id_buku'];

if( isset($_POST["submit"])){
    $judul_buku = $_POST["judul_buku"];
    $penulis = $_POST["penulis"];
    $jenis_buku = $_POST["jenis_buku"];

    mysqli_query($koneksi, "update buku set judul_buku='$judul_buku', penulis='$penulis', jenis_buku='$jenis_buku' where id_buku='$id'");

    if( mysqli_affected_rows($koneksi) > 0){
        echo "<script>alert('Data berhasil di UPDATE');
        document.location.href = 'index.php';</script>";
    } else{
        echo "<script>alert('Data gagal di UPDATE')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Buku</title>
</head>
<body>
    <h1 align="center">Update Data Buku</h1>
<form action="" method="post">
    <table align="center">
    <?php 
    $id = $_GET['id_buku'];
    $result = mysqli_query($koneksi, "select * from buku where id_buku='$id'");
    while($row = mysqli_fetch_assoc($result)):?>
    <tr>
         <td><label for="judul_buku" class="form-label mt-4">Judul Buku</label></td>
         <td><input type="text" size="60" class="form-control mt-2 ms-3" id="judul_buku" name="judul_buku" value=" <?php echo $row['judul_buku'];?>" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="penulis" class="form-label mt-4">Penulis</label></td>
         <td><input type="text" size="60" class="form-control mt-2 ms-3" id="penulis" name="penulis" value=" <?php echo $row['penulis'];?>" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="jenis_buku" class="form-label mt-4">Jenis Buku</label></td>
         <td><input type="text" size="60" class="form-control mt-2 ms-3" id="jenis_buku" name="jenis_buku" value=" <?php echo $row['jenis_buku'];?>" aria-describedby="emailHelp" required></td>
    </tr>
    <tr>
         <td><label for="gambar_buku" class="form-label mt-4">Gambar Buku</label></td>
         <td><input type="text" size="60" class="form-control mt-2 ms-3" id="gambar_buku" name="gambar_buku" value=" <?php echo $row['gambar_buku'];?>" aria-describedby="emailHelp" required disabled></td>
    </tr>
    <tr>
        <td></td>
         <td><button type="submit" style="margin-top: 10px;" name="submit">Simpan</button></td>
    </tr>
</table>
<?php endwhile; ?>
</form>
</body>
</html>


