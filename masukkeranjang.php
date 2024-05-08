<?php
session_start();
include "koneksi.php";

if($_POST){
    // Ambil id_produk dan qty dari $_POST
    $id_produk = $_GET['id_produk'];
    $qty = $_POST['jumlah_beli'];

    // Ambil data produk dari tabel toko_produk
    $qry_produk = mysqli_query($toko_online, "SELECT * FROM toko_produk WHERE id_produk = '$id_produk'");
    $dt_produk = mysqli_fetch_array($qry_produk);

    // Hitung subtotal
    $subtotal = $dt_produk['harga'] * $qty;

    // Simpan data ke dalam session cart
    $_SESSION['cart'][] = array(
        'id_produk' => $id_produk,
        'nama_produk' => $dt_produk['nama_produk'],
        'qty' => $qty,
        'subtotal' => $subtotal
    );

    // Redirect ke halaman keranjang.php
    header('location: keranjang.php');
}
?>
