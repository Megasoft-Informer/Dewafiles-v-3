<?PHP
SESSION_START();
$my_name = $_SESSION['my_name'];
include("koneksi.php"); #koneksi into database
include("class/statistik.php");
############################Dapatkan info dari file berdasarkan id####################################
$id_file = $_GET['id'];
$sql = mysql_query("select * from file where id='$id_file'");
$data = mysql_fetch_array($sql);
$nama_file = $data['nama'];
$path_file = $data['path'];
$size_file = $data['size'];
$pemilik = $data['pemilik'];
$hits = $data['hits'];
$date = $data['date'];
$komen = $data['komen'];
#######################################################################################################
#################################Proses Penambahan Poin################################################
if ($pemilik == $my_name){ #jika si pengupload file itu seniri yang mendownload maka batalkan penambahan poin
$stop = 1;
}
if ($stop != 1){ #jika $stop == 0 maka lanjutkan penambahan poin
#penambahan 5 poin untuk si pemilik file
$sql = mysql_query("select * from anggota where nama='$pemilik'");
$data = mysql_fetch_array($sql);
$poin = $data['poin'];
$poin = $poin + 5;
$sql_update = mysql_query("update anggota set poin='$poin' where nama='$pemilik'");
#penambahan 1 poin untuk si pendownload
$sql = mysql_query("select * from anggota where nama='$my_name'");
$data = mysql_fetch_array($sql);
$poin = $data['poin'];
$poin = $poin + 1;
$sql_update = mysql_query("update anggota set poin='$poin' where nama='$my_name'");
}
?>
<link rel='stylesheet' href="css/box.css" type="text/css"> <!--untuk style boxnya -->
<link rel="shortcut icon" href="images/favicon.ico"> <!--Pemanggilan gambar favicon-->
<title>Download File <?PHP echo $nama_file; ?></title>
<meta name="author" content="Dewa">
<meta name="description" content="<?PHP echo "Download File $nama_file"; ?>">
<meta name="keywords" content="<?PHP echo "$komen"; ?>">
<body background="css/back.jpg">
<div class="wrap" style="margin-top:13%">
    <h1><?PHP echo $nama_file; ?></h1>   
        <p>
		<?PHP
		if (empty($nama)){
		if ($harus_login == "Ya"){
		?>
		<p>
		<center>Maaf Untuk Mendownload file ini anda harus login terlebih dahulu <a  style="text-decoration:underline" href="<?PHP echo "login.php"; ?>"> Login Page</a>
		</center>
		<?PHP
		exit();
		}
		}
		echo "<meta http-equiv='refresh' content='0; url=$path_file'>"; #auto download file
		if ($stop != 1){
		$hits++;
		$sql = mysql_query("update file set hits='$hits' where id='$id_file'"); #tambah 1 angka untuk hits file
		$sql_down = mysql_query("select * from statistik where date='$today'");
		$data = mysql_fetch_array($sql_down);
		$down = $data['down'] + 1;
		$sql_down_update = mysql_query("update statistik set down='$down' where date='$today'");
		}
		?>
		<center>
        Thank's For Downloading This File
		<p>
		<center>Not Download? <a  style="text-decoration:underline" href="<?PHP echo $path_file; ?>">Try Again</a>
		</center>
        </p>
        </p>
</div>
