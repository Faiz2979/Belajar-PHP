<?php
    if(isset($_GET['id_produk'])){
        include "koneksi.php";
        $id_produk = mysqli_real_escape_string($toko_online, $_GET['id_produk']);
        $qry_hapus_produk = mysqli_query($toko_online, "DELETE FROM toko_produk WHERE id_produk='$id_produk'");
        
        if($qry_hapus_produk){
            echo "<script>alert('Sukses hapus produk');location.href='tampil_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus produk');location.href='tampil_produk.php';</script>";
        }
    }
?>