<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h3>Tambah Transaksi</h3>
    <form action="proses_tambah_transaksi.php" method="post">
            Pelanggan :
            <select name="id_pelanggan" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_toko=mysqli_query($toko_online,"select * from toko_pelanggan");
            while($data_toko=mysqli_fetch_array($qry_toko)){
                echo '<option value="'.$data_toko['id_pelanggan'].'">'.$data_toko['nama_pelanggan'].'</option>';
            }
            ?>
        </select>
            Petugas : 
            <select name="id_petugas" class="form-control">
            <option></option>
            <?php 
            include "koneksi.php";
            $qry_toko=mysqli_query($toko_online,"select * from toko_petugas");
            while($data_toko=mysqli_fetch_array($qry_toko)){
                echo '<option value="'.$data_toko['id_petugas'].'">'.$data_toko['nama_petugas'].'</option>';
            }
            ?>
        </select>
            Tanggal Transaksi :
            <input type="date" name="tanggal" value="" class="form-control">
            

        <input type="submit" name="simpan" value="Tambah Transaksi" class="btn btn-primary">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
