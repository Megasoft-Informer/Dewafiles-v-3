<?PHP
SESSION_START();
$nama=$_SESSION['my_name'];
$page = $_GET['page'];
$today = date('Y')."-".date('m')."-".date('d');
$my_ip = $_SERVER['REMOTE_ADDR']; #get your ip address
#checking date----------------------------------------------------
$sql = mysql_query("select * from statistik where date='$today'");
$result = mysql_num_rows($sql);
#pemasukan data baru jika tanggal sekarang tidak ada di database--
if ($result==0){
$q = "insert into statistik values('0', '1','$today')";
mysql_query($q) or die(mysql_error());
}
#------------------------------------------------------------------
#all history page--------------------------------------------------
$sql = mysql_query("select * from statistik"); #query ke database
while ($data = (mysql_fetch_array($sql))){ #query untuk mengambil data yang ada di tabel statistik
$all_hits +=$data['hits']; #total semua page hits
}
#------------------------------------------------------------------
#today-------------------------------------------------------------
$sql = mysql_query("select * from statistik where date='$today'");
$data = mysql_fetch_array($sql);
$hits_today = $data['hits']; #page hits today
$down_today = $data['down']; #total file download today
$hits_today = $hits_today + 1;
#-------------------------------------------------------------------
#yesterday----------------------------------------------------------
$yesterday = date("Y-m-d", strtotime("-1 day"));
$sql= mysql_query("select * from statistik where date='$yesterday'");
$data = mysql_fetch_array($sql);
$hits_yesterday = $data['hits']; #page hits yesterday
$unduh_yesterday = $data['down']; #total file di download kemarin
#--------------------------------------------------------------------
$sql = mysql_query("update statistik set hits='$hits_today' where date='$today'"); #query penambahan page hits today
#######################for adding info last_page his visited#################
#######################adding for keterangan#################################
$sql=mysql_query("select * from file");
$jumlahsemuafile=mysql_num_rows($sql);
while ($data = (mysql_fetch_array($sql))){
$all_unduh +=$data['hits']; #jumlah semua file i unduh
}
$sql=mysql_query("select * from anggota");
$jumlahsemuaanggota=mysql_num_rows($sql); #jumlah semua anggota
#############################################################################
if (!empty($nama)){ //hanya untuk user yang sudah login unduh mengetahui laman apa yang terakhir di kunjungi
function selfURL() {
$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
$protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s; 
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]); 
return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI']; 
}
function strleft($s1, $s2) { return substr($s1, 0, strpos($s1, $s2)); 
}
$mypath = selfURL();
$sql = mysql_query("update anggota set page='$mypath' where nama='$nama'");
}
#############################################################################
##############Untuk Keterangan Saya Bagi yang sudah login saja###############
if (!empty($nama)){
#Ranking
$q = mysql_query("select * from anggota ORDER BY anggota.poin DESC");
$rank = 0;
while ($data = mysql_fetch_array($q)){
$namasaya = $data['nama'];
$rank++;
if ($namasaya==$nama){
$ranking=$rank;}
}
}
#my poin
$sql = mysql_query("select * from anggota where nama='$nama'");
$data = mysql_fetch_array($sql);
$my_poin = $data['poin'];
#all information in database
$sql = mysql_query("select * from anggota");
$jumlah_user = mysql_num_rows($sql);
$sql = mysql_query("select * from anggota where online='Y'");
$jumlah_user_online = mysql_num_rows($sql);
$sql = mysql_query("select * from file");
$jumlah_all_file = mysql_num_rows($sql);
$sql = mysql_query("select * from file where pemilik='$nama'");
$jumlah_my_file = mysql_num_rows($sql);
while ($data = (mysql_fetch_array($sql))){
$jumlah_file_download +=$data['hits'];
}
#############################################################################
?>