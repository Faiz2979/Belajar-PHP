<?php
if($_POST){
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $id_petugas=$_POST['id_petugas'];
    if(empty($nama_petugas)){
        echo "<script>alert('nama petugas tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($username)){
        echo "<script>alert('username tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } elseif(empty($password)){
        echo "<script>alert('password tidak boleh kosong');location.href='tambah_petugas.php';</script>";
    } else {
        include "koneksi.php";
        $insert=mysqli_query($toko_online,"insert into toko_petugas (nama_petugas, username, password,level) values ('".$nama_petugas."','".$username."','".md5(md5($password))."','".$level."')") or die(mysqli_error($toko_online));
        if($insert){
            echo "<script>alert('Sukses menambahkan petugas');location.href='tambah_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan petugas');location.href='tambah_petugas.php';</script>";
        }
    }
} 
?>