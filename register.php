<?PHP
include("koneksi.php");
if (!empty($nama)){ #jika dia sudah membuat login maka tidak boleh akses halaman ini lagi (session my_name tidak kosong)
header("Location:home.php"); #alihkan ke home.php
}
?>
<html>
<head>
<title>Uploader File Gratis</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Copyright" content="http://dewafiles.p.ht">
<meta name="Author" content="Dewa">
<meta name="Keywords" content="Download file gratis">
<meta name="description" content="Upload file gratis">
<meta name="language" content="English">
<link rel="shortcut icon" href="images/favicon.ico"> <!--Pemanggilan gambar favicon-->
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="css/mos-style.css"> <!--pemanggilan file css-->
<link rel="stylesheet" type="text/css" href="css/button.css">
</head>
<body>
<div id="header">
	<div class="inHeaderLogin"><?PHP
	if ($_GET['error']==1){
    echo "<div style='margin-left:200px;' class='gagal'>Username Has Been Use By Another Person!</div>";
    }
	if ($_GET['error']==2){
	echo "<div style='margin-left:200px;' class='gagal'>That Email has been use by another person!</div>";
	}
	if ($_GET['success']==1){
	$namanya = $_GET['nama'];
	echo "<div style='margin-left:200px;' class='sukses'>Your account success created with name => $namanya! click <a href='index.php'>here</a> to login</div>";
	}
	?></div>
</div>

<div id="RegisterForm" style="margin-top:10px;width:500px">
	<div class="headRegisterForm" style="width:480px">
	Register
	</div>
	<div class="fieldregister" >
	<form method="POST" action="cekregister.php">
	<me>Username</me><br>
	<input type="text" style="width:100%" required name="uname" class="login"><br>
	<me>Email</me><br>
	<input type="text" style="width:100%" required name="email" class="login"><br>
	<me>Password</me><br>
	<input type="password" style="width:100%" required name="pswd" class="login"><br>
	<me>Gender</me><br>
	<select name="gender" style="width:100%">
	<option>Male</option>
	<option>Female</option>
	</select><p>
	<me>Date Of Birth</me><br>
	<select name="tanggal" style="width:50px">
	<?PHP
	$tanggal = 1;
	while ($tanggal!=32){
	echo "<option>$tanggal</option>";
	$tanggal++;
	}
	?>
	</select>
	<select name="bulan" style="width:70px">
	<option>Jan</option>
	<option>Feb</option>
	<option>Mar</option>
	<option>Apr</option>
	<option>Mei</option>
	<option>Jun</option>
	<option>Jul</option>
	<option>Ags</option>
	<option>Sep</option>
	<option>Okt</option>
	<option>Nov</option>
	<option>Des</option>
	</select>
	<select name="tahun" style="width:90px">
	<?PHP
	$tahun = 1970;
	while ($tahun!=date('Y') + 1){
	echo "<option>$tahun</option>";
	$tahun++;
	}
	?>
	</select>
	<p>
	<input type="submit" class="btn-large btn-primary" value="Register">
	</form>
	</div>
</div>
</body>
</html>