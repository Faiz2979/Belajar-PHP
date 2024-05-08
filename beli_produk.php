<?php 
    include "header.php";
    include "koneksi.php";
    $qry_produk=mysqli_query($toko_online,"select * from toko_produk where id_produk = '".$_GET['id_produk']."'");
    $dt_produk=mysqli_fetch_array($qry_produk);
?>
<h2>Beli Barang</h2>
<div class="row">
    <div class="col-md-4">
    <img src="<?=$dt_produk['foto_produk']?>" class="card-img-top" style="width: 300px; height: auto; object-fit:cover">
    </div>
    <div class="col-md-8">
        <form action="masukkeranjang.php?id_produk=<?=$dt_produk['id_produk']?>" method="post">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <td>Nama Barang</td><td><?=$dt_produk['nama_produk']?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td><td><?=$dt_produk['deskripsi']?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Barang</td><td><input type="number" name="jumlah_beli" value="1"></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input class="btn btn-success" type="submit" value="BELI"></td>
                    </tr>
                </thead>
            </table>
        </form>
    </div>
</div>
<?php 
    include "footer.php";
?>

