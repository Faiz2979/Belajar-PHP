<?php
if($_POST){
    include "koneksi.php";
    $id_produk=$_POST['id_produk'];
    $nama_produk=$_POST['nama_produk'];
    $deskripsi=$_POST['deskripsi'];
    $harga=$_POST['harga']; // Update form input name
    $foto=$_POST['foto']; // Update form input name
    
    // Periksa apakah nama pelanggan tidak kosong
    if(empty($nama_produk)){
        echo "<script>alert('Nama produk tidak boleh kosong');location.href='ubah_produk.php?id_produk=".$id_produk."';</script>";
    } else {
        // Lakukan query update
        $update=mysqli_query($toko_online,"UPDATE toko_produk SET nama_produk='".$nama_produk."', deskripsi='".$deskripsi."', harga='".$harga."', foto_produk='".$foto."' WHERE id_produk = '".$id_produk."' ") or die(mysqli_error($toko_online));
        
        // Periksa apakah query update berhasil atau tidak
        if($update){
            echo "<script>alert('Sukses update produk');location.href='tampil_produk.php';</script>";
        } else {
            echo "<script>alert('Gagal update produk');location.href='ubah_produk.php?id_produk=".$id_produk."';</script>";
        }
    } 
}
?>
