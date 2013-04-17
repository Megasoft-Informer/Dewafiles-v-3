<?PHP
include("koneksi.php");
unset($_SESSION['my_name']); #kosongkan session my_name
session_destroy(); #session di hancurkan
$sql = mysql_query("update anggota set online='N' where nama='$nama'"); #membuat status usernya menjadi offline kembali
header("location:index.php"); #alihkan ke index.php
?>