<?php
    if(isset($_GET['id_pelanggan'])){
        include "koneksi.php";
        $id_pelanggan = mysqli_real_escape_string($toko_online, $_GET['id_pelanggan']);
        $qry_hapus_pelanggan = mysqli_query($toko_online, "DELETE FROM toko_pelanggan WHERE id_pelanggan='$id_pelanggan'");
        
        if($qry_hapus_pelanggan){
            echo "<script>alert('Sukses hapus pelanggan');location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus pelanggan');location.href='tampil_pelanggan.php';</script>";
        }
    }
?>