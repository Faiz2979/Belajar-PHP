<?php 
session_start();
include "koneksi.php";

// Inisialisasi variabel id_transaksi
$id_transaksi = null;

// Pastikan Anda memiliki id_transaksi yang valid
$query_get_transaksi = "SELECT id_transaksi FROM toko_transaksi ORDER BY id_transaksi DESC LIMIT 1";
$result_get_transaksi = mysqli_query($toko_online, $query_get_transaksi);

// Periksa apakah data transaksi ditemukan
if (mysqli_num_rows($result_get_transaksi) > 0) {
    // Ambil id_transaksi dari hasil query
    $data_transaksi = mysqli_fetch_assoc($result_get_transaksi);
    $id_transaksi = $data_transaksi['id_transaksi'];
} else {
    // Tampilkan pesan kesalahan jika tidak ada transaksi yang ditemukan
    echo "Error: Tidak ada transaksi yang ditemukan.";
}

// Jika id_transaksi valid, lanjutkan dengan proses checkout
if ($id_transaksi) {
    // Periksa apakah keranjang belanja sudah diinisialisasi
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
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

        // Setelah semua barang dimasukkan ke dalam tabel toko_detail_transaksi, hapus keranjang
        unset($_SESSION['cart']);

        // Redirect ke halaman lain setelah selesai checkout
        header('Location: histori_transaksi.php');
    } else {
        // Tampilkan pesan kesalahan jika keranjang belanja kosong
        echo "Error: Keranjang belanja kosong.";
    }
} else {
    // Tampilkan pesan kesalahan jika id_transaksi tidak valid atau tidak ditemukan dalam tabel toko_transaksi
    echo "Error: id_transaksi tidak valid atau tidak ditemukan.";
}
?>
