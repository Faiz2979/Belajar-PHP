<?php
    if(isset($_GET['id_petugas'])){
        include "koneksi.php";
        $id_petugas = mysqli_real_escape_string($toko_online, $_GET['id_petugas']);
        $qry_hapus_petugas = mysqli_query($toko_online, "DELETE FROM toko_petugas WHERE id_petugas='$id_petugas'");
        
        if($qry_hapus_petugas){
            echo "<script>alert('Sukses hapus petugas');location.href='tampil_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus petugas');location.href='tampil_petugas.php';</script>";
        }
    }
?>