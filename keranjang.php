<?php 
    include "header.php";
    include "koneksi.php";
?>
<h2>Daftar Barang</h2>
<table class="table table-hover striped">
    <thead>
        <tr>
            <th>NO</th><th>Nama Barang</th><th>Jumlah</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        if(isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key_produk => $val_produk):
                // Ambil data produk dari database berdasarkan ID
                $qry_produk = mysqli_query($toko_online, "SELECT * FROM toko_produk WHERE id_produk = '".$val_produk['id_produk']."'");
                
                // Periksa apakah data produk ditemukan
                if(mysqli_num_rows($qry_produk) > 0) {
                    $dt_produk = mysqli_fetch_array($qry_produk);
                    
        ?>
                <tr>
                    
                    <td><?=($key_produk+1)?></td><td><?=$dt_produk['nama_produk']?></td><td><?=$val_produk['qty']?></td><td><a href="hapus_cart.php?id=<?=$key_produk?>" class="btn btn-danger"><strong>X</strong></a></td>
                </tr>
        <?php
                } else {
                    echo "<tr><td colspan='4'>Data produk tidak ditemukan.</td></tr>";
                }
            endforeach;
        } else {
            echo "<tr><td colspan='4'>Keranjang belanja kosong</td></tr>";
        }
        ?>
    </tbody>
</table>
<a href="checkout.php" class="btn btn-primary">Check Out</a>
<?php 
    include "footer.php";
?>
