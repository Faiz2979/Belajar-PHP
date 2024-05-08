<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title></title>
</head>
<body>
    <h3>Tampil Petugas</h3>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
    <th>NO</th>
    <th>ID PETUGAS</th>
    <th>NAMA PETUGAS</th>
    <th>USERNAME</th>
    <th>LEVEL</th>
    <th>AKSI</th>
    
            </tr>
        </thead>
        <tbody>
            <?php 
            include "koneksi.php";
            $qry_toko=mysqli_query($toko_online,"SELECT * from toko_petugas
");
            $no=0;
            while($data_toko=mysqli_fetch_array($qry_toko)){
            $no++;?>
        <tr>
    <td><?=$no?></td>
    <td><?=$data_toko['id_petugas']?></td>
    <td><?=$data_toko['nama_petugas']?></td>
    <td><?=$data_toko['username']?></td>
    <td><?=$data_toko['level']?></td>
  
    <td><a href="ubah_petugas.php?id_petugas=<?= $data_toko['id_petugas'] ?>" class="btn btn-success">Ubah</a>

<a href="hapus_petugas.php?id_petugas=<?= $data_toko['id_petugas'] ?>"
    onclick="return confirm('Apakah anda yakin menghapus data ini?')" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php
            }
            ?>
                
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
