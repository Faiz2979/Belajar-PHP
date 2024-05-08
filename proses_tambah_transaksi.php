<?php
if($_POST){
    $id_pelanggan=$_POST['id_pelanggan'];
    $id_petugas=$_POST['id_petugas'];
    $tgl=$_POST['tanggal'];
    
    // $username=$_POST['root'];
    // $password= $_POST[''];

    if(empty($id_pelanggan && $id_petugas)){
        echo "<script>alert('petugas atau pelanggan tidak boleh kosong');location.href='tambah_transaksi.php';</script>";
    }
    elseif(empty($tgl)){
        echo "<script>alert('tanggal tidak valid');location.href='tambah_transaksi.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($toko_online,"insert into toko_transaksi (id_pelanggan, id_petugas, tgl_transaksi) values ('".$id_pelanggan."','".$id_petugas."','".$tgl."')") or die(mysqli_error($toko_online));
        if($insert){
            echo "<script>alert('Sukses menambahkan transaksi');location.href='tambah_transaksi.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan transaksi');location.href='tambah_transaksi.php';</script>";
        }
    }
} 
?>