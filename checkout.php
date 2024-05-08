<?php
session_start();
include "koneksi.php";

// Mengambil id_transaksi dari tabel toko_transaksi
$query_get_id_transaksi = "SELECT id_transaksi FROM toko_transaksi ORDER BY id_transaksi DESC LIMIT 1";
$result_get_id_transaksi = mysqli_query($toko_online, $query_get_id_transaksi);

if ($result_get_id_transaksi && mysqli_num_rows($result_get_id_transaksi) > 0) {
    $row = mysqli_fetch_assoc($result_get_id_transaksi);
    $id_transaksi = $row['id_transaksi'] + 1; // Tambah 1 dari id_transaksi terakhir
} else {
    // Jika tidak ada id_transaksi sebelumnya, gunakan id_transaksi awal (misalnya, 1)
    $id_transaksi = 1;
}

// Ambil id_petugas dan id_pelanggan dari data yang sudah ada
$id_petugas = $_GET('id_petugas'); // Misalnya, ambil dari sesi atau data yang sudah ada
$id_pelanggan = $_GET('id_pelanggan'); // Misalnya, ambil dari sesi atau data yang sudah ada

// Jika ada barang dalam keranjang, lanjutkan proses checkout
if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $produk) {
        // Ambil data produk dari tabel toko_produk
        $qry_produk = mysqli_query($toko_online, "SELECT * FROM toko_produk WHERE id_produk = '".$produk['id_produk']."'");
        $dt_produk = mysqli_fetch_array($qry_produk);
        
        // Hitung subtotal untuk produk saat ini
        $subtotal = $produk['qty'] * $dt_produk['harga'];
        
        // Masukkan data pembelian barang ke dalam tabel toko_detail_transaksi
        $insert_detail_transaksi = mysqli_query($toko_online, "INSERT INTO toko_detail_transaksi (id_transaksi, id_produk, qty, subtotal) VALUES ('$id_transaksi', '".$produk['id_produk']."', '".$produk['qty']."', '$subtotal')");

        if (!$insert_detail_transaksi) {
            // Tangani kesalahan jika gagal memasukkan data
            echo "Error: " . mysqli_error($toko_online);
        }
    }
} else {
    // Jika keranjang kosong, tampilkan pesan kesalahan
    echo "Error: Keranjang belanja kosong.";
}

// Setelah semua barang dimasukkan ke dalam tabel toko_detail_transaksi, hapus keranjang
unset($_SESSION['cart']);

// Masukkan data transaksi ke dalam tabel toko_transaksi
$query_insert_transaksi = "INSERT INTO toko_transaksi ( id_petugas, id_pelanggan, tgl_transaksi) VALUES ('$id_petugas', '$id_pelanggan', NOW())";
$result_insert_transaksi = mysqli_query($toko_online, $query_insert_transaksi);

if (!$result_insert_transaksi) {
    // Tangani kesalahan jika gagal memasukkan data transaksi
    echo "Error: " . mysqli_error($toko_online);
}

// Redirect ke halaman lain setelah selesai checkout
header('Location: home.php');
?>
