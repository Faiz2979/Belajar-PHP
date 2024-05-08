<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Ubah Produk</title>
</head>
<body>
    <?php 
    include "koneksi.php";
    // Periksa apakah id_pelanggan diset dan valid
    if(isset($_GET['id_produk'])) {
        $qry_get_produk=mysqli_query($toko_online,"select * from toko_produk where id_produk = '".$_GET['id_produk']."'");
        $dt_produk=mysqli_fetch_array($qry_get_produk);

        // Periksa apakah data pelanggan ditemukan
        if($dt_produk) {
    ?>
    <h3>Ubah Produk</h3>
    <form action="proses_ubah_produk.php" method="post">
        <!-- Tambahkan input hidden untuk menyimpan id_pelanggan -->
        <input type="hidden" name="id_produk" value="<?= $dt_produk['id_produk'] ?>">
        Nama Produk :
        <!-- Isi nilai input dengan nama_pelanggan dari database -->
        <input type="text" name="nama_produk" value="<?= $dt_produk['nama_produk'] ?>" class="form-control">
        Deskripsi:
        <!-- Isi nilai input dengan alamat dari database -->
        <input type="text" name="deskripsi" value="<?= $dt_produk['deskripsi'] ?>" class="form-control">
        Harga:
        <!-- Isi nilai input dengan telp dari database -->
        <input type="text" name="harga" value="<?= $dt_produk['harga'] ?>" class="form-control">
        Foto: masukan link gambar jika ingin mengubah gambar
        <!-- Isi nilai input dengan telp dari database -->
        <input type="text" name="foto" value="" class="form-control">

        <input type="submit" name="simpan" value="Ubah Produk" class="btn btn-primary">
    </form>
    <?php
        } else {
            echo "<p>Data Produk tidak ditemukan.</p>";
        }
    } else {
        echo "<p>ID Produk tidak valid.</p>";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
