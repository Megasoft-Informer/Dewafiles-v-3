<?PHP
include("../koneksi.php");
include("session_admin.php");
if (empty($nama_admin)){
header("location:index.php");
}
$id = $_GET['id'];
if (!empty($id)){
$sql = mysql_query("delete from anggota where id='$id'");
if ($sql){
header("location:users.php?pesan=1");
}
}
else{
echo "You cannot Access This Page";
}
?>