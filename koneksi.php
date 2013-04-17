<?PHP
SESSION_START();
$nama=$_SESSION['my_name']; #get the name if members login
$host="localhost"; #your host
$user="root"; #username
$pswd=""; #your password
$db="my_sites"; #database name
mysql_connect($host, $user, $pswd);
mysql_select_db($db); #memilih database mysqlnya
date_default_timezone_set("Asia/Jakarta");#settingan waktu default => jakarta, indonesia
###Jangan Rubah Script di bawah ini###
#############################getting setting data##############################
$sql = mysql_query("select * from setting where nama='domain'");
$data = mysql_fetch_array($sql);
$domain = $data['isi']; #domain default admin
$sql = mysql_query("select * from setting where nama='email'");
$data = mysql_fetch_array($sql);
$email_admin = $data['isi']; #email default admin
$sql = mysql_query("select * from setting where nama='company'");
$data = mysql_fetch_array($sql);
$company = $data['isi'];#company default admin
$sql = mysql_query("select * from setting where nama='harus_login'");
$data = mysql_fetch_array($sql);
$harus_login = $data['isi'];#untuk user download,.. jika "Ya" maka harus login baru bisa download jika "Tidak" maka tidak login bisa download
###############################################################################
?>