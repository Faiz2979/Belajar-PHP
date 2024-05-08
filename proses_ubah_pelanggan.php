<?php
if($_POST){
    include "koneksi.php";
    $id_pelanggan=$_POST['id_pelanggan'];
    $nama_pelanggan=$_POST['nama_pelanggan'];
    $alamat=$_POST['alamat'];
    $notelp=$_POST['telp']; // Update form input name
    
    // Periksa apakah nama pelanggan tidak kosong
    if(empty($nama_pelanggan)){
        echo "<script>alert('Nama pelanggan tidak boleh kosong');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
    } else {
        // Lakukan query update
        $update=mysqli_query($toko_online,"UPDATE toko_pelanggan SET nama_pelanggan='".$nama_pelanggan."', telp='".$notelp."', alamat='".$alamat."' WHERE id_pelanggan = '".$id_pelanggan."' ") or die(mysqli_error($toko_online));
        
        // Periksa apakah query update berhasil atau tidak
        if($update){
            echo "<script>alert('Sukses update pelanggan');location.href='tampil_pelanggan.php';</script>";
        } else {
            echo "<script>alert('Gagal update pelanggan');location.href='ubah_pelanggan.php?id_pelanggan=".$id_pelanggan."';</script>";
        }
    } 
}
?>
