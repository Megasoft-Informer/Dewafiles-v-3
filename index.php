<?PHP
include("koneksi.php");
if (!empty($nama)){ #jika dia sudah membuat login maka tidak boleh akses halaman ini lagi (session my_name tidak kosong)
header("Location:home"); #alihkan ke home.php
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
    echo "<div style='margin-left:200px;' class='gagal'>Your Password is Wrong!</div>";
    }
	if ($_GET['error']==2){
	echo "<div style='margin-left:200px;' class='gagal'>Username not regitered!</div>";
	}
	?></div>
</div>

<div id="loginForm">
	<div class="headLoginForm">
	Login
	</div>
	<div class="fieldLogin">
	<form method="POST" action="ceklogin.php">
	<me>Username</me><br>
	<input type="text" style="width:90%" required name="username" class="login"><br>
	<me>Password</me><br>
	<input type="password" style="width:90%"  required name="pasword" class="login"><br>
	<a href="register">Create New Account</a> <input style="position:relative;float:right;margin-right:26px" type="submit" class="large gray button" value="Login">
	</form>
	</div>
</div>
</body>
</html>