<?PHP
include("koneksi.php"); #must be including for connection database
include("class/statistik.php"); #statistik page hits today
include("class/os.php"); #detecting your os output => $my_os
include("class/browser.php"); #detecting your browser output => $my_browser
$nama = $_POST['username']; #get username from index.php (mendapatkan username yang di ketikan di form index.php)
$pass = $_POST['pasword']; #get password from index.php (mendapatkan password yang di ketikan di form index.php)
$sql = mysql_query("select * from anggota where nama='$nama'"); #query sql for select $nama
$hasil = mysql_num_rows($sql); #cek apakah username ada(1) atau tidak(0)
if ($hasil==0){ #jika hasilnya 0 maka
header("location:index.php?error=2"); #alihkan ke index.php?error=2 => munculkan pesan username belum terdaftar
$stop = 1; #hentikan sampai di sini (script hanya di excute sampai di sini,.. yang di bawah tidak di excute lagi)
}
if ($stop!=1){ #jika stop tidak 1 maka
$data = mysql_fetch_array($sql); #sql for get data 
$pswd = $data['pswd']; #get passwordnya
if ($pass == $pswd){ #jika password dari form index = password yang ada di database maka
$_SESSION['my_name']=$nama; #create session my_name
$sql = mysql_query("select * from anggota where nama='$nama'"); #query select nama=$nama
$data = mysql_fetch_array($sql); #untuk mendapatkan info si user
$poin = $data['poin']; #poin sekarang
$poin = $poin + 1; #poin lama di tambah 1
$sql = mysql_query("update anggota set online='Y', poin='$poin', browser='$my_browser', os='$my_os', ip='$my_ip' where nama='$nama'"); #untuk membuat status si user menjadi online dan menambahkan 1 poin setiap kali user login
header("location:home"); #alihkan ke home.php
}
else {
header("location:index.php?error=1"); #alihkan ke index.php?error=2 => munculkan pesan password salah
}
}
?>