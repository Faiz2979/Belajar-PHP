<?php
if($_POST){
    include "koneksi.php";
    $nama_petugas=$_POST['nama_petugas'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $level=$_POST['level'];
    $username=$_POST['username'];
    $password= $_POST['password'];
    $id_petugas=$_POST['id_petugas'];
    // Periksa apakah nama pelanggan tidak kosong
    if(empty($password)){
        $update=mysqli_query($toko_online,"UPDATE toko_petugas SET nama_petugas='".$nama_petugas."', username='".$username."' WHERE id_petugas = '".$id_petugas."' ") or die(mysqli_error($toko_online));
        // Lakukan query update
    } else{

        $update=mysqli_query($toko_online,"UPDATE toko_petugas SET nama_petugas='".$nama_petugas."', username='".$username."', password='".md5(md5($password))."' WHERE id_petugas = '".$id_petugas."' ") or die(mysqli_error($toko_online));
    }
        // Periksa apakah query update berhasil atau tidak
        if($update){
            echo "<script>alert('Sukses update petugas');location.href='tampil_petugas.php';</script>";
        } else {
            echo "<script>alert('Gagal update petugas');location.href='ubah_petugas.php?id_pelanggan=".$id_pelanggan."';</script>";
        }
    
}
?>
