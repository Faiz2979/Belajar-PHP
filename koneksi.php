<?php
$laravel=mysqli_connect('localhost','root','','belajar_laravel');
$toko_online=mysqli_connect('localhost','root','','toko_online');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>
