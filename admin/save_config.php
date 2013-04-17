<?PHP
include("../koneksi.php");
include("session_admin.php");
if (empty($nama_admin)){
header("location:index.php");
}
$my_domain = $_POST['domain'];
$my_company = $_POST['company'];
$my_email = $_POST['email'];
$my_login = $_POST['down_login'];
if (!empty($my_domain)){
$sql = mysql_query("update setting set isi='$my_domain' where nama='domain'");
$sql = mysql_query("update setting set isi='$my_company' where nama='company'");
$sql = mysql_query("update setting set isi='$my_email' where nama='email'");
$sql = mysql_query("update setting set isi='$my_login' where nama='harus_login'");
if ($sql){
header("location:config.php?pesan=1");
}
else{
header("location:config.php?pesan=2");
}
}
else{
echo "You cannot Access This Page";
}
?>