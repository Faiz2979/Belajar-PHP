<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ubah Pelanggan</title>
</head>
<body>
    <?php 
    include "koneksi.php";
    // Periksa apakah id_pelanggan diset dan valid
    if(isset($_GET['id_pelanggan'])) {
        $qry_get_pelanggan=mysqli_query($toko_online,"select * from toko_pelanggan where id_pelanggan = '".$_GET['id_pelanggan']."'");
        $dt_pelanggan=mysqli_fetch_array($qry_get_pelanggan);

        // Periksa apakah data pelanggan ditemukan
        if($dt_pelanggan) {
    ?>
    <h3>Ubah Pelanggan</h3>
    <form action="proses_ubah_pelanggan.php" method="post">
        <!-- Tambahkan input hidden untuk menyimpan id_pelanggan -->
        <input type="hidden" name="id_pelanggan" value="<?= $dt_pelanggan['id_pelanggan'] ?>">
        Nama Pelanggan :
        <!-- Isi nilai input dengan nama_pelanggan dari database -->
        <input type="text" name="nama_pelanggan" value="<?= $dt_pelanggan['nama_pelanggan'] ?>" class="form-control">
        Alamat:
        <!-- Isi nilai input dengan alamat dari database -->
        <input type="text" name="alamat" value="<?= $dt_pelanggan['alamat'] ?>" class="form-control">
        No Telp:
        <!-- Isi nilai input dengan telp dari database -->
        <input type="text" name="telp" value="<?= $dt_pelanggan['telp'] ?>" class="form-control">

        <input type="submit" name="simpan" value="Ubah Pelanggan" class="btn btn-primary">
    </form>
    <?php
        } else {
            echo "<p>Data pelanggan tidak ditemukan.</p>";
        }
    } else {
        echo "<p>ID pelanggan tidak valid.</p>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
