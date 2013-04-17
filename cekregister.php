<?PHP
include("koneksi.php"); #untuk koneksi ke database
include("class/statistik.php");
###########################Get submit data post############################################
$username = $_POST['uname']; #mendapatkan username dari form register
$password = $_POST['pswd']; #mendapatkan Password dari form register
$email = $_POST['email']; #mendapatkan Email dari form register
$gender = $_POST['gender']; #mendapatkan Jenis Kelamin dari form register
$tanggal = $_POST['tanggal']; #mendapatkan Tanggal lahir dari form register
$bulan = $_POST['bulan']; #mendapatkan Bulan lahir dari form register
$tahun = $_POST['tahun']; #mendapatkan tahun lahir dari form register
$lahir = "$tanggal/$bulan/$tahun"; #penggabungan dari tanggal bulan dan tahun untuk lahir
###########################################################################################

######################Checking username exist or not#######################################
$sql = mysql_query("select * from anggota where nama='$username'"); #query
$hasilnya = mysql_num_rows($sql); #cek row (1==sudah ada/0==belum ada)
if ($hasilnya!=0){#jika hasilnya bukan 0 maka kita alihkan ke form register + muncul pesan
header("location:register?error=1");
$stop = 1;
}
###########################################################################################

######################Checking email address exist or not##################################
$sql = mysql_query("select * from anggota where email='$email'"); #query
$hasilnya = mysql_num_rows($sql); #cek row (1==sudah ada/0==belum ada)
if ($hasilnya!=0){#jika hasilnya bukan 0 maka kita alihkan ke form register + muncul pesan
header("location:register?error=2");
$stop = 1;
}
###########################################################################################

#########################Proses pemasukan datanya ke database##############################
if ($stop!=1){
$query = "insert into anggota values('', '$username', '$email', '$password', '$gender', '$lahir', 'user/$gender.png', 'N', '', '', '', '', '')";
if (mysql_query($query)){
header("location:register?success=1&nama=$username");
}
}
###########################################################################################
?>