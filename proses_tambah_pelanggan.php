<?php
if($_POST){
    $nama_pelanggan=$_POST['nama_pelanggan'];
    $alamat=$_POST['alamat'];
    $notelp=$_POST['telp'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $id_pelanggan=$_POST['idpelanggan'];
    if(empty($nama_pelanggan)){
        echo "<script>alert('nama pelanggan tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_pelanggan.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($toko_online,"insert into toko_pelanggan (nama_pelanggan, alamat, telp) values ('".$nama_pelanggan."','".$alamat."','".$notelp."')") or die(mysqli_error($toko_online));
        if($insert){
            echo "<script>alert('Sukses menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan pelanggan');location.href='tambah_pelanggan.php';</script>";
        }
    }
}
?>