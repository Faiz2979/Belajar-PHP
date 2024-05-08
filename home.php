<?php 
    include "header.php";
?>
<h2 style="text-align: center;">Produk Unggulan</h2>
<div class="row">
    <?php 
    include "koneksi.php";
    $qry_produk=mysqli_query($toko_online,"select * from toko_produk");
    while($dt_produk=mysqli_fetch_array($qry_produk)){
        ?>
        <div class="col-md-3">
            <div class="card">
              <img src="<?=$dt_produk['foto_produk']?>" class="card-img-top" style="width: 300px; height: 300px; object-fit:cover">
              <div class="card-body">
                <h5 class="card-title"><?=$dt_produk['nama_produk']?></h5>
                <p class="card-text"><?=substr($dt_produk['deskripsi'], 0,20)?></p>
                <a href="beli_produk.php?id_produk=<?=$dt_produk['id_produk']?>" class="btn btn-primary">Beli</a>
              </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<?php 
    include "footer.php";
?>
