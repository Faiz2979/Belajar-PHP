<?php
if($_POST){
    $nama_produk=$_POST['nama_produk'];
    $deskripsi=$_POST['deskripsi'];
    $harga=$_POST['harga'];
    $foto=$_POST['foto'];
    // Assuming these fields are meant to be included in your form
    // $id_produk=$_POST['id_produk'];
    if(empty($nama_produk)){
        echo "<script>alert('nama produk tidak boleh kosong');location.href='tambah_produk.php';</script>";
    
    } else {
        include "koneksi.php";
        $insert=mysqli_query($toko_online,"insert into toko_produk (nama_produk, deskripsi, harga, foto_produk) values ('".$nama_produk."','".$deskripsi."','".$harga."','".$foto."')") or die(mysqli_error($toko_online));
        if($insert){
            echo "<script>alert('Sukses menambahkan produk');location.href='tambah_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal menambahkan produk');location.href='tambah_produk.php';</script>";
        }
    }
}
?>