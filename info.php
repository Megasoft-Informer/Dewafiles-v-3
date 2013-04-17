<?PHP
include("koneksi.php");
include("class/statistik.php");
$nama_user = $_GET['nama'];
$sql = mysql_query("select * from anggota where nama='$nama_user'");
$hasil = mysql_num_rows($sql);
$data = mysql_fetch_array($sql);
$email = $data['email'];
$lahir = $data['lahir'];
$gender = $data['gender'];
$online =  $data['online'];
$photo = $data['photo'];
$poin = $data['poin'];
$os = $data['os'];
$browser = $data['browser'];
$ip = $data['ip'];
$page = $data['page'];
if ($online=='Y'){
$online = "Online";
}
else{
$online = "Offline";
}
if ($hasil==0){
header("location:index.php");
}
?>
<link rel='stylesheet' href="css/mos-style.css" type="text/css"> <!--untuk style boxnya -->
<link rel='stylesheet' href="css/box.css" type="text/css"> <!--untuk style boxnya -->
<div class="wrap" style="margin-top:8%">
<title>Info User <?PHP echo $nama_user; ?></title>
<body background="css/back.jpg">
<link rel="shortcut icon" href="images/favicon.ico"> <!--Pemanggilan gambar favicon-->
    <h1><?PHP echo $nama_user; ?></h1>   
        <p>
		<center>
		<img src="<?PHP echo $photo; ?>" width="50" height="50">
		<table border='0'>
		<tr>
		<td width="100px">Nama</td>
		<td><?PHP echo $nama_user; ?></td>
		</tr>
		<tr>
		<td width="100px">Email</td>
		<td><?PHP echo $email; ?></td>
		</tr>
		<tr>
		<td width="100px">Gender</td>
		<td><?PHP echo $gender; ?></td>
		</tr>
		<tr>
		<td width="100px">Lahir</td>
		<td><?PHP echo $lahir; ?></td>
		</tr>
		<tr>
		<td width="100px">Poin</td>
		<td><?PHP echo $poin; ?></td>
		</tr>
		<tr>
		<td width="100px">OS</td>
		<td><?PHP echo $os; ?></td>
		</tr>
		<tr>
		<td width="100px">Browser</td>
		<td><?PHP echo $browser; ?></td>
		</tr>
		<tr>
		<td width="100px">IP Address</td>
		<td><?PHP echo $ip; ?></td>
		</tr>
		<tr>
		<td width="100px">Last Page Visit</td>
		<td><?PHP echo $page; ?></td>
		</tr>
		<tr>
		<td width="100px">Status</td>
		<td><?PHP echo $online; ?></td>
		</tr>
		</table>
		</center>
        </p>
</div>
