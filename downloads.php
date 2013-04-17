<?PHP
include("koneksi.php");
include("class/statistik.php");
$id_file = $_GET['id'];
if (!empty($id_file)){
$sql = mysql_query("select * from file where id='$id_file'");
$data = mysql_fetch_array($sql);
$nama_file = $data['nama'];
header("location:download-$nama_file.htm");
exit();
}
$name_file = $_GET['name'];
$sql = mysql_query("select * from file where nama='$name_file'");
$data = mysql_fetch_array($sql);
$id = $data['id'];
$nama_file = $data['nama'];
$path_file = $data['path'];
$size_file = $data['size'];
$pemilik = $data['pemilik'];
$hits = $data['hits'];
$date = $data['date'];
$komen = $data['komen'];
?>
<link rel="stylesheet" href="css/button.css" type="text/css"> <!-- style button -->
<link rel='stylesheet' href="css/box.css" type="text/css"> <!--untuk style boxnya -->
<div class="wrap" style="margin-top:8%">
<title>Download File <?PHP echo $nama_file; ?></title>
<meta name="author" content="Dewa">
<meta name="description" content="<?PHP echo "Download File $nama_file"; ?>">
<meta name="keywords" content="<?PHP echo "$komen"; ?>">
<body background="css/back.jpg">
<link rel="shortcut icon" href="images/favicon.ico"> <!--Pemanggilan gambar favicon-->
    <h1><?PHP echo $nama_file; ?></h1>   
        <p>
		<center>
		<table border='0'>
		<tr>
		<td width="100px">Filname</td>
		<td><?PHP echo $nama_file; ?></td>
		</tr>
		<tr>
		<td width="100px">Owner</td>
		<td><?PHP echo $pemilik; ?></td>
		</tr>
		<tr>
		<td width="100px">Date Upload</td>
		<td><?PHP echo $date; ?></td>
		</tr>
		<tr>
		<td width="100px">Size</td>
		<td><?PHP echo $size_file; ?></td>
		</tr>
		<tr>
		<td width="100px">Downloads</td>
		<td><?PHP echo $hits." Times"; ?></td>
		</tr>
		</table>
		<p>
		<center>
		<a style="text-decoration:none;" class="large gray button dlDark" href="get-<?PHP echo $id; ?>.htm">
  	    <span>Downloads <small>(<?PHP echo $size_file; ?>)</small></span>
        </a>
		</center>
		</p>
		</center>
        </p>
</div>
