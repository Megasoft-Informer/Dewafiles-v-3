<?PHP
include("../koneksi.php"); #untuk menginclude file koneksi.php
if (empty($nama_admin)){ #jika user belum login maka di alihkan ke halaman index.php
header("location:index.php"); #mengalihkan ke index.php
}
##############untuk mendapatkan info si usernya#########################
$sql = mysql_query("select * from anggota where nama='$nama'");
$data = mysql_fetch_array($sql);
$id = $data['id']; #mendapatkan id si user
$pswd = $data['pswd']; #mendapatkan passwordnya
$gender = $data['gender']; #mendapatkan info jenis kelaminnya
$lahir = $data['lahir']; #mendapatkan tanggal lahir
$online = $data['online']; #mendapatkan statusnya online(Y) atau tidak(N)
$photo = $data['photo']; #mendapatkan url photo
$email = $data['email'];#mendapatkan info email
#########################################################################

################for image user online or offline#########################
if ($online=="Y"){ #jika online dari si user Y maka (Y=online / N=offline)
$image_status = "user/online.png";
}
else{ #jika hasil online = N
$image_status = "user/offline.png";
}
#########################################################################
?>
<html>
<head>
<title>Upload File Gratis | Admin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="http://dewafiles.p.ht">
<meta name="Author" content="Dewa">
<meta name="Keywords" content="Download file gratis">
<meta name="description" content="Upload file gratis">
<meta name="language" content="English">
<link rel="shortcut icon" href="../images/favicon.ico"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"> <!--pemanggilan file css-->
<link rel="stylesheet" type="text/css" href="../css/mos-style.css"> <!--pemanggilan file css-->
</head>
<body>
<div id="header">
	<div class="inHeader">
		<div class="mosAdmin">
		<a href="admin.php">
		<img src="../user/male.png" height="50" width="50"/>
		</a>
		Welcome, <?PHP echo $nama_admin; ?><br>
		<a href="myfiles">View My Files</a> | <a href="allfiles">All Files</a> | <a href="logout.php">Logout</a>
		</div>
	<div class="clear"></div>
	</div>
</div>