<?php
session_start();

// Pastikan parameter id telah diteruskan dan sesuai
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id_produk = $_GET['id'];

    // Hapus item dari keranjang berdasarkan indeks
    unset($_SESSION['cart'][$id_produk]);

    // Redirect kembali ke halaman keranjang
    header('location: keranjang.php');
} else {
    // Tampilkan pesan kesalahan jika parameter id tidak sesuai
    echo "Parameter id tidak valid.";
}
?>
